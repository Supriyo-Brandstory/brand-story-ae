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
                'exp' => time() + 3600
            ];

            $jwt = JWT::encode($payload, $this->jwtKey, 'HS256');

            setcookie('admin_token', $jwt, time() + 3600, '/', '', false, true);

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

        csrf_verify();
        $this->requireAdminAuth();

        if (isset($_FILES['backup_file']) && $_FILES['backup_file']['error'] == 0) {
            $uploadedFile = $_FILES['backup_file']['tmp_name'];
            $zip = new \ZipArchive;

            if ($zip->open($uploadedFile) === TRUE) {

                $extractPath = sys_get_temp_dir() . '/restore_' . uniqid();
                if (!mkdir($extractPath)) {
                    $_SESSION['profile_success'] = "Failed to create temp directory.";
                    header("Location: " . route('admin.dashboard'));
                    exit;
                }

                $zip->extractTo($extractPath);
                $zip->close();

                // 1. Restore Uploads
                $sourceUploads = $extractPath . '/uploads';
                $destUploads = __DIR__ . '/../../../public/uploads';

                if (is_dir($sourceUploads)) {
                    $this->recurseCopy($sourceUploads, $destUploads);
                }

                // 2. Restore Database
                $sqlFile = $extractPath . '/database.sql';
                if (file_exists($sqlFile)) {
                    $this->restoreDatabase($sqlFile);
                }

                // Cleanup
                $this->delTree($extractPath);

                $_SESSION['profile_success'] = "Backup restored successfully!";
                header("Location: " . route('admin.dashboard'));
                exit;
            } else {
                $_SESSION['profile_success'] = "Failed to open ZIP file.";
                header("Location: " . route('admin.dashboard'));
                exit;
            }
        }

        $_SESSION['profile_success'] = "No file uploaded or error occurred.";
        header("Location: " . route('admin.dashboard'));
        exit;
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

        // Read entire file (careful with memory, but for now ok for small sites)
        // Better: read line by line or statement by statement.
        // Assuming the detailed line-by-line simple dump format created above.

        $sql = file_get_contents($filePath);
        if (!$sql) return;

        // Split by semicolon, but this is fragile if content contains semicolons.
        // The above dump creates one INSERT per line, ending with ;\n

        $queries = explode(";\n", $sql);

        // Disable FK checks
        $db->exec("SET FOREIGN_KEY_CHECKS=0");

        foreach ($queries as $query) {
            $query = trim($query);
            if (!empty($query)) {
                try {
                    $db->exec($query);
                } catch (\Exception $e) {
                    // Continue on error? or log it?
                    error_log("Restore Error: " . $e->getMessage());
                }
            }
        }

        $db->exec("SET FOREIGN_KEY_CHECKS=1");
    }

    // Helper to copy files recursively
    private function recurseCopy($src, $dst)
    {
        $dir = opendir($src);
        @mkdir($dst);
        while (false !== ($file = readdir($dir))) {
            if (($file != '.') && ($file != '..')) {
                if (is_dir($src . '/' . $file)) {
                    $this->recurseCopy($src . '/' . $file, $dst . '/' . $file);
                } else {
                    copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }
        closedir($dir);
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
