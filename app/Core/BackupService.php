<?php

namespace App\Core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as MailerException;
use Exception;
use PDO;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use ZipArchive;

class BackupService
{
    protected $db;
    public $backupDir;

    public function __construct()
    {
        $this->db = Database::connect();
        $this->backupDir = __DIR__ . '/../../public/uploads/backups';

        if (!is_dir($this->backupDir)) {
            mkdir($this->backupDir, 0755, true);
        }
    }

    /**
     * Run the backup process.
     */
    public function run()
    {
        // Increase limits for large backups
        set_time_limit(0);
        ignore_user_abort(true);
        if (ini_get('memory_limit') !== '-1' && (int)ini_get('memory_limit') < 1024) {
             ini_set('memory_limit', '1024M');
        }

        $filename = 'backup_' . date('Y-m-d_H-i-s') . '.zip';
        $zipPath = $this->backupDir . '/' . $filename;
        $sqlFile = 'database.sql.gz';
        $sqlPath = sys_get_temp_dir() . '/' . $sqlFile;

        try {
            // 1. Dump Database
            $this->dumpDatabase($sqlPath);

            // 2. Create Zip
            $hasZipCmd = (bool)shell_exec('which zip');

            if ($hasZipCmd) {
                // Use Shell Zip (Significantly faster for large datasets)
                // Add SQL file first
                $zip = new ZipArchive();
                if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
                    if (file_exists($sqlPath)) {
                        $zip->addFile($sqlPath, $sqlFile);
                    }
                    $zip->close();
                }

                $uploadsDirAbs = realpath(__DIR__ . '/../../public/uploads');
                $parentDir = dirname($uploadsDirAbs);
                $folderName = basename($uploadsDirAbs);

                // Append uploads folder excluding the backups directory
                $zipPathEsc = escapeshellarg($zipPath);
                $folderNameEsc = escapeshellarg($folderName);
                $excludeAction = "-x \"$folderName/backups/*\" -x \"*.DS_Store\"";
                $cmd = "cd \"$parentDir\" && zip -r -9 $zipPathEsc $folderNameEsc $excludeAction";
                exec($cmd);

            } else {
                // Fallback to PHP ZipArchive (Slower)
                $zip = new ZipArchive();
                if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
                    // Add SQL file
                    if (file_exists($sqlPath)) {
                        $zip->addFile($sqlPath, $sqlFile);
                    }

                    // Add Public Uploads
                    $uploadsDir = __DIR__ . '/../../public/uploads';
                    if (is_dir($uploadsDir)) {
                        $files = new RecursiveIteratorIterator(
                            new RecursiveDirectoryIterator($uploadsDir),
                            RecursiveIteratorIterator::LEAVES_ONLY
                        );

                        foreach ($files as $name => $file) {
                            if (!$file->isDir()) {
                                $filePath = $file->getRealPath();

                                // Exclude backups folder from the archive to avoid recursive backups
                                if (strpos($filePath, realpath($this->backupDir)) === 0) {
                                    continue;
                                }

                                $relativePath = 'uploads/' . substr($filePath, strlen(realpath($uploadsDir)) + 1);
                                $zip->addFile($filePath, $relativePath);
                            }
                        }
                    }
                    $zip->close();
                }
            }

            // 3. Log to database
            $stmt = $this->db->prepare("INSERT INTO backups (filename, status) VALUES (?, 'success')");
            $stmt->execute([$filename]);

            // 4. Send Email
            $this->sendBackupEmail($zipPath, $filename);

            // Cleanup temp SQL
            if (file_exists($sqlPath)) unlink($sqlPath);

            return [
                'status' => 'success',
                'filename' => $filename
            ];
        } catch (Exception $e) {
            $stmt = $this->db->prepare("INSERT INTO backups (filename, status) VALUES (?, 'failed')");
            $stmt->execute([$filename]);

            error_log("Backup Error: " . $e->getMessage());
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }

    /**
     * Send backup file via email.
     */
    public function sendBackupEmail($filePath, $filename)
    {
        $emailsJson = $this->getSetting('backup_emails');
        if (!$emailsJson) return;

        $emails = json_decode($emailsJson, true);
        if (empty($emails)) return;

        $mail = new PHPMailer(true);

        try {
            // Server settings - use SMTP from .env
            $mail->isSMTP();
            $mail->Host       = getenv('smtp_host') ?: 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = getenv('smtp_username');
            $mail->Password   = getenv('smtp_password');
            $mail->SMTPSecure = getenv('smtp_secure') ?: 'ssl';
            $mail->Port       = getenv('smtp_port') ?: 465;

            $mail->setFrom(
                getenv('smtp_from_email') ?: 'info@brandstory.ae',
                getenv('smtp_from_name') ?: 'BrandStory AE'
            );

            foreach ($emails as $email) {
                $mail->addAddress($email);
            }

            // Attachments
            $mail->addAttachment($filePath);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Database Backup - ' . date('Y-m-d');
            $mail->Body    = 'Attached is the database backup for ' . date('Y-m-d') . '.';

            $mail->send();
        } catch (MailerException $e) {
            error_log("Mailer Error: " . $mail->ErrorInfo);
            throw new Exception("Mail failed: " . $mail->ErrorInfo);
        }
    }

    /**
     * Get setting from database.
     */
    protected function getSetting($key)
    {
        $stmt = $this->db->prepare("SELECT `value` FROM settings WHERE `key` = ? LIMIT 1");
        $stmt->execute([$key]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['value'] ?? null;
    }

    /**
     * Dump Database to SQL file.
     */
    protected function dumpDatabase($filePath)
    {
        $fp = gzopen($filePath, 'w9');

        $tables = [];
        $result = $this->db->query('SHOW TABLES');
        while ($row = $result->fetch(PDO::FETCH_NUM)) {
            $tables[] = $row[0];
        }

        gzwrite($fp, "SET FOREIGN_KEY_CHECKS=0;\n\n");

        foreach ($tables as $table) {
            $result = $this->db->query("SELECT * FROM `$table`", PDO::FETCH_NUM);
            $numFields = $result->columnCount();

            gzwrite($fp, "DROP TABLE IF EXISTS `$table`;\n");
            $row2 = $this->db->query("SHOW CREATE TABLE `$table`")->fetch(PDO::FETCH_NUM);
            gzwrite($fp, $row2[1] . ";\n\n");

            while ($row = $result->fetch(PDO::FETCH_NUM)) {
                $values = [];
                for ($j = 0; $j < $numFields; $j++) {
                    if (isset($row[$j])) {
                        $values[] = $this->db->quote($row[$j]);
                    } else {
                        $values[] = 'NULL';
                    }
                }
                gzwrite($fp, "INSERT INTO `$table` VALUES(" . implode(',', $values) . ");\n");
            }
            gzwrite($fp, "\n\n");
        }
        gzwrite($fp, "SET FOREIGN_KEY_CHECKS=1;\n");
        gzclose($fp);
    }
}
