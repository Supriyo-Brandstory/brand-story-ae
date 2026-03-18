<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminBaseController;

class AdminMediaController extends AdminBaseController
{
    private $uploadPath = 'public/uploads/';

    public function __construct()
    {
        parent::__construct();
        $this->requireAdminAuth();
        $this->uploadPath = realpath(__DIR__ . '/../../../public/uploads/') . '/';
    }

    public function index()
    {
        $this->adminView('media/index', [
            'title' => 'Media Manager'
        ]);
    }

    public function list()
    {
        $subfolder = $_GET['folder'] ?? '';
        // Sanitize subfolder to prevent directory traversal
        $subfolder = str_replace(['..', './', '.\\'], '', $subfolder);
        $subfolder = trim($subfolder, '/ ');

        $currentPath = $this->uploadPath . ($subfolder ? $subfolder . '/' : '');

        if (!is_dir($currentPath)) {
            echo json_encode(['error' => 'Directory not found']);
            return;
        }

        $items = [];
        $files = scandir($currentPath);

        foreach ($files as $file) {
            if ($file === '.' || $file === '..' || substr($file, 0, 1) === '.') continue;

            $filePath = $currentPath . $file;
            $relativeUrl = 'uploads/' . ($subfolder ? $subfolder . '/' : '') . $file;
            $isDir = is_dir($filePath);

            $items[] = [
                'name' => $file,
                'isDir' => $isDir,
                'size' => $isDir ? '-' : $this->formatSize(filesize($filePath)),
                'url' => base_url($relativeUrl),
                'relativePath' => ($subfolder ? $subfolder . '/' : '') . $file,
                'extension' => $isDir ? '' : strtolower(pathinfo($file, PATHINFO_EXTENSION)),
                'mtime' => date('Y-m-d H:i:s', filemtime($filePath))
            ];
        }

        header('Content-Type: application/json');
        echo json_encode(['items' => $items, 'currentFolder' => $subfolder]);
    }

    public function upload()
    {
        $folder = $_POST['folder'] ?? '';
        $folder = str_replace(['..', './', '.\\'], '', $folder);
        $folder = trim($folder, '/ ');

        $targetPath = $this->uploadPath . ($folder ? $folder . '/' : '');

        if (!is_dir($targetPath)) {
            mkdir($targetPath, 0755, true);
        }

        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $fileName = $_FILES['file']['name'];
            $targetFile = $targetPath . $fileName;

            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
                echo json_encode(['status' => 'success', 'message' => 'File uploaded successfully']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to upload file']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No file uploaded or upload error']);
        }
    }

    public function delete()
    {
        // Get JSON body
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        $path = $data['path'] ?? '';
        $path = str_replace(['..', './', '.\\'], '', $path);

        $fullPath = $this->uploadPath . $path;

        if (file_exists($fullPath)) {
            if (is_dir($fullPath)) {
                if ($this->deleteDirectory($fullPath)) {
                    echo json_encode(['status' => 'success', 'message' => 'Directory deleted']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Failed to delete directory (maybe not empty)']);
                }
            } else {
                if (unlink($fullPath)) {
                    echo json_encode(['status' => 'success', 'message' => 'File deleted']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Failed to delete file']);
                }
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Item not found']);
        }
    }

    public function createFolder()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        $parent = $data['parent'] ?? '';
        $name = $data['name'] ?? '';

        $parent = str_replace(['..', './', '.\\'], '', $parent);
        $name = str_replace(['..', './', '.\\', '/'], '', $name);

        $fullPath = $this->uploadPath . ($parent ? $parent . '/' : '') . $name;

        if (!is_dir($fullPath)) {
            if (mkdir($fullPath, 0755, true)) {
                echo json_encode(['status' => 'success', 'message' => 'Folder created']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to create folder']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Folder already exists']);
        }
    }

    private function deleteDirectory($dir)
    {
        if (!file_exists($dir)) return true;
        if (!is_dir($dir)) return unlink($dir);
        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') continue;
            if (!$this->deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) return false;
        }
        return rmdir($dir);
    }

    private function formatSize($bytes)
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
}
