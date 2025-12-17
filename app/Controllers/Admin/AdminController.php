<?php

namespace App\Controllers\Admin;

use App\Models\Admin;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AdminController extends AdminBaseController // Extend AdminBaseController
{
    public function __construct()
    {
        parent::__construct(); // Call parent constructor
    }


    // -----------------------------------------------------
    //  LOGIN FORM
    // -----------------------------------------------------
    public function login()
    {
        if (!empty($_SESSION['admin_id'])) {
            header('Location: ' . route('admin.dashboard'));
            exit;
        }
        return $this->singleView('admin/login');
    }


    // -----------------------------------------------------
    //  PROCESS LOGIN (uses MODEL)
    // -----------------------------------------------------
    public function processLogin()
    {
        csrf_verify();
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');

        $adminModel = new Admin();
        $adminResult = $adminModel->query("SELECT * FROM admins WHERE email = ? LIMIT 1", [$email]);
        $admin = !empty($adminResult) ? $adminResult[0] : null;

        if ($admin && password_verify($password, $admin['password'])) {

            $payload = [
                'admin_id' => $admin['id'],
                'admin_name' => $admin['name'],
                'exp' => time() + 86400
            ];

            $jwt = JWT::encode($payload, $this->jwtKey, 'HS256');

            setcookie('admin_token', $jwt, time() + 86400, '/', '', false, true);

            if (isset($_SESSION['redirect_url'])) {
                $redirect = $_SESSION['redirect_url'];
                unset($_SESSION['redirect_url']);
                header('Location: ' . $redirect);
                exit;
            }

            header('Location: ' . route('admin.dashboard'));
            exit;
        }

        $_SESSION['login_error'] = 'Invalid email or password';
        header('Location: ' . route('admin.login'));
        exit;
    }


    // -----------------------------------------------------
    //  DASHBOARD
    // -----------------------------------------------------
    public function dashboard()
    {
        $this->requireAdminAuth(); // Ensure admin is authenticated

        $blogCategoryModel = new \App\Models\BlogCategory();
        $blogModel = new \App\Models\Blog();
        $seoModel = new \App\Models\Seo();

        $stats = [
            'blog_categories_count' => $blogCategoryModel->countAll(),
            'blogs_count' => $blogModel->countAll(),
            'seo_count' => $seoModel->countAll(),
        ];

        return $this->adminView('/dashboard', $stats); // admin data is auto-injected
    }


    // -----------------------------------------------------
    //  LOGOUT
    // -----------------------------------------------------
    public function logout()
    {
        setcookie('admin_token', '', time() - 3600, '/');
        header('Location: ' . route('admin.login'));
        exit;
    }


    // -----------------------------------------------------
    //  INDEX (auto redirect)
    // -----------------------------------------------------
    public function index()
    {
        if (!empty($_COOKIE['admin_token'])) {
            header('Location: ' . route('admin.dashboard'));
            exit;
        }

        header('Location: ' . route('admin.login'));
        exit;
    }


    // -----------------------------------------------------
    //  PROFILE PAGE
    // -----------------------------------------------------
    public function profile()
    {
        $this->requireAdminAuth(); // Ensure admin is authenticated
        // The admin data is available via $this->authAdmin if needed
        return $this->adminView('/profile', [
            'admin' => $this->authAdmin // Pass for direct use in profile form
        ]);
    }


    // -----------------------------------------------------
    //  UPDATE PROFILE
    // -----------------------------------------------------
    public function updateProfile()
    {
        csrf_verify();
        $this->requireAdminAuth(); // Ensure admin is authenticated

        $admin = $this->authAdmin; // Use the already fetched admin data

        $name = htmlspecialchars(trim($_POST['name'] ?? ''), ENT_QUOTES, 'UTF-8');
        $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
        $password = trim($_POST['password'] ?? '');

        $update = [
            'id' => $admin['id'],
            'name' => $name,
            'email' => $email
        ];

        if (!empty($password)) {
            $update['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $adminModel = new Admin();
        $adminModel->save($update);

        $_SESSION['profile_success'] = "Profile updated successfully";
        header("Location: " . route('admin.profile'));
        exit;
    }
    // -----------------------------------------------------
    //  BACKUP: EXPORT
    // -----------------------------------------------------
    public function exportBackup()
    {
        $this->requireAdminAuth();

        $dbConfig = require __DIR__ . '/../../../config/database.php';
        $dbName = $dbConfig['database'];

        $backupFile = 'backup_' . date('Y-m-d_H-i-s') . '.zip';
        $zipPath = sys_get_temp_dir() . '/' . $backupFile;
        $sqlFile = 'database.sql';
        $sqlPath = sys_get_temp_dir() . '/' . $sqlFile;

        // 1. Dump Database (Pure PHP)
        $this->dumpDatabase($sqlPath);

        // 2. Create Zip
        $zip = new \ZipArchive();
        if ($zip->open($zipPath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === TRUE) {

            // Add SQL file
            if (file_exists($sqlPath)) {
                $zip->addFile($sqlPath, $sqlFile); // Add as database.sql at root of zip
            }

            // Add Public Uploads
            // Change: We want 'uploads' folder in root of zip
            $uploadsDir = __DIR__ . '/../../../public/uploads';
            if (is_dir($uploadsDir)) {
                $files = new \RecursiveIteratorIterator(
                    new \RecursiveDirectoryIterator($uploadsDir),
                    \RecursiveIteratorIterator::LEAVES_ONLY
                );

                foreach ($files as $name => $file) {
                    if (!$file->isDir()) {
                        $filePath = $file->getRealPath();
                        // Get relative path: uploads/images/foo.jpg
                        $relativePath = 'uploads/' . substr($filePath, strlen(realpath($uploadsDir)) + 1);
                        $zip->addFile($filePath, $relativePath);
                    }
                }
            }

            $zip->close();
        }

        // 3. Download
        if (file_exists($zipPath)) {
            header('Content-Type: application/zip');
            header('Content-Disposition: attachment; filename="' . $backupFile . '"');
            header('Content-Length: ' . filesize($zipPath));
            readfile($zipPath);

            // Cleanup
            unlink($zipPath);
            if (file_exists($sqlPath)) unlink($sqlPath);
            exit;
        } else {
            echo "Failed to create backup.";
            exit;
        }
    }

    // -----------------------------------------------------
    //  BACKUP: IMPORT
    // -----------------------------------------------------
    public function importBackup()
    {
        // Increase time limit for large imports
        set_time_limit(300);

        // We assume this is called via AJAX now, so no redirects.
        // We will return JSON responses.

        csrf_verify();
        $this->requireAdminAuth();

        $this->logProgress("Starting import process...", 10);

        if (isset($_FILES['backup_file']) && $_FILES['backup_file']['error'] == 0) {
            $uploadedFile = $_FILES['backup_file']['tmp_name'];
            $zip = new \ZipArchive;

            $this->logProgress("Opening ZIP file...", 20);

            if ($zip->open($uploadedFile) === TRUE) {

                $extractPath = sys_get_temp_dir() . '/restore_' . uniqid();
                if (!mkdir($extractPath)) {
                    $this->logProgress("Error: Failed to create temp directory.", 100, 'error');
                    echo json_encode(['status' => 'error', 'message' => 'Failed to create temp directory.']);
                    exit;
                }

                $this->logProgress("Extracting files...", 30);
                $zip->extractTo($extractPath);
                $zip->close();

                // 1. Restore Uploads
                $this->logProgress("Restoring uploaded files...", 50);
                $sourceUploads = $extractPath . '/uploads';
                $destUploads = __DIR__ . '/../../../public/uploads';

                $filesRestored = 0;
                if (is_dir($sourceUploads)) {
                    $filesRestored = $this->recurseCopy($sourceUploads, $destUploads);
                }

                // 2. Restore Database
                $sqlFile = $extractPath . '/database.sql';
                $tablesRestored = 0;
                if (file_exists($sqlFile)) {
                    $this->logProgress("Restoring database...", 70);
                    $tablesRestored = $this->restoreDatabase($sqlFile);
                }

                // Cleanup
                $this->logProgress("Cleaning up temporary files...", 90);
                $this->delTree($extractPath);

                $successMessage = "Import completed! Restored {$filesRestored} files and processed {$tablesRestored} database queries.";
                $this->logProgress($successMessage, 100, 'success');

                echo json_encode([
                    'status' => 'success',
                    'message' => 'Backup restored successfully!',
                    'details' => [
                        'files' => $filesRestored,
                        'queries' => $tablesRestored
                    ]
                ]);
                exit;
            } else {
                $this->logProgress("Error: Failed to open ZIP file.", 100, 'error');
                echo json_encode(['status' => 'error', 'message' => 'Failed to open ZIP file.']);
                exit;
            }
        }

        $this->logProgress("Error: No file uploaded.", 100, 'error');
        echo json_encode(['status' => 'error', 'message' => 'No file uploaded or error occurred.']);
        exit;
    }

    // -----------------------------------------------------
    //  BACKUP: PROGRESS API
    // -----------------------------------------------------
    public function backupProgress()
    {
        $logFile = sys_get_temp_dir() . '/backup_progress_admin.json';
        if (file_exists($logFile)) {
            $content = file_get_contents($logFile);
            echo $content;
        } else {
            echo json_encode(['message' => 'Waiting to start...', 'percent' => 0]);
        }
        exit;
    }

    public function cleanupProgress()
    {
        $logFile = sys_get_temp_dir() . '/backup_progress_admin.json';
        if (file_exists($logFile)) {
            unlink($logFile);
        }
        exit;
    }

    private function logProgress($message, $percent, $status = 'processing')
    {
        $logFile = sys_get_temp_dir() . '/backup_progress_admin.json';
        $data = [
            'message' => $message,
            'percent' => $percent,
            'status' => $status,
            'timestamp' => time()
        ];
        file_put_contents($logFile, json_encode($data));
    }

    // Custom PHP DB Dump
    private function dumpDatabase($filePath)
    {
        $db = \App\Core\Database::connect();
        $tables = [];
        $result = $db->query('SHOW TABLES');
        while ($row = $result->fetch(\PDO::FETCH_NUM)) {
            $tables[] = $row[0];
        }

        $content = "SET FOREIGN_KEY_CHECKS=0;\n\n";

        foreach ($tables as $table) {
            $result = $db->query("SELECT * FROM `$table`");
            $numFields = $result->columnCount();

            $content .= "DROP TABLE IF EXISTS `$table`;\n";
            $row2 = $db->query("SHOW CREATE TABLE `$table`")->fetch(\PDO::FETCH_NUM);
            $content .= $row2[1] . ";\n\n";

            for ($i = 0; $i < $numFields; $i++) {
                while ($row = $result->fetch(\PDO::FETCH_NUM)) {
                    $content .= "INSERT INTO `$table` VALUES(";
                    for ($j = 0; $j < $numFields; $j++) {
                        $row[$j] = addslashes($row[$j]);
                        $row[$j] = str_replace("\n", "\\n", $row[$j]);
                        if (isset($row[$j])) {
                            $content .= '"' . $row[$j] . '"';
                        } else {
                            $content .= '""';
                        }
                        if ($j < ($numFields - 1)) {
                            $content .= ',';
                        }
                    }
                    $content .= ");\n";
                }
            }
            $content .= "\n\n";
        }
        $content .= "SET FOREIGN_KEY_CHECKS=1;\n";
        file_put_contents($filePath, $content);
    }

    // Custom PHP DB Restore
    private function restoreDatabase($filePath)
    {
        $db = \App\Core\Database::connect();

        $sql = file_get_contents($filePath);
        if (!$sql) return 0;

        $queries = explode(";\n", $sql);
        $count = 0;

        // Disable FK checks
        $db->exec("SET FOREIGN_KEY_CHECKS=0");

        foreach ($queries as $query) {
            $query = trim($query);
            if (!empty($query)) {
                try {
                    $db->exec($query);
                    $count++;
                } catch (\Exception $e) {
                    error_log("Restore Error: " . $e->getMessage());
                }
            }
        }

        $db->exec("SET FOREIGN_KEY_CHECKS=1");
        return $count;
    }

    // Helper to copy files recursively - returns count
    private function recurseCopy($src, $dst)
    {
        $dir = opendir($src);
        @mkdir($dst);
        $count = 0;
        while (false !== ($file = readdir($dir))) {
            if (($file != '.') && ($file != '..')) {
                if (is_dir($src . '/' . $file)) {
                    $count += $this->recurseCopy($src . '/' . $file, $dst . '/' . $file);
                } else {
                    copy($src . '/' . $file, $dst . '/' . $file);
                    $count++;
                }
            }
        }
        closedir($dir);
        return $count;
    }

    // Helper to delete dir recursively
    private function delTree($dir)
    {
        $files = array_diff(scandir($dir), array('.', '..'));
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? $this->delTree("$dir/$file") : unlink("$dir/$file");
        }
        return rmdir($dir);
    }
}
