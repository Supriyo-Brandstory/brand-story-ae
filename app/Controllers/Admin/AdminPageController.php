<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminBaseController;
use App\Models\Page;

class AdminPageController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->requireAdminAuth();
    }

    public function index()
    {
        $pageModel = new Page();
        $search = $_GET['search'] ?? '';
        
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($page < 1) $page = 1;
        $perPage = 10;
        
        $where = [];
        if (!empty($search)) {
            // BaseModel paginate supports basic WHERE col LIKE ? if it contains %
            $where = ['title' => "%$search%"];
            // Note: Current BaseModel::paginate only supports AND between multiple conditions.
            // If we want OR (title OR slug), we'd need to extend paginate or use query().
            // For now, searching by title is a good start.
        }
        
        $paginatedData = $pageModel->paginate($perPage, $page, $where);

        $this->adminView('pages/index', [
            'title' => 'Pages Management',
            'pages' => $paginatedData['data'],
            'currentPage' => $paginatedData['current_page'],
            'totalPages' => $paginatedData['last_page'],
            'perPage' => $perPage,
            'search' => $search
        ]);
    }

    public function create()
    {
        $templates = $this->getTemplates();

        $this->adminView('pages/create', [
            'title' => 'Create New Page',
            'templates' => $templates
        ]);
    }

    public function store()
    {
        $data = [
            'title' => $_POST['title'] ?? '',
            'slug' => $_POST['slug'] ?? '',
            'template' => $_POST['template'] ?? '',
            'content' => $_POST['content'] ?? '',
            'custom_class' => $_POST['custom_class'] ?? ''
        ];

        // Debug Log
        file_put_contents('/tmp/admin_save_debug.log', "STORE Time: " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);
        file_put_contents('/tmp/admin_save_debug.log', "POST Data: " . json_encode($_POST) . "\n\n", FILE_APPEND);

        // Basic Validation
        if (empty($data['title']) || empty($data['slug']) || empty($data['template'])) {
            $_SESSION['error'] = "Title, Slug, and Template are required fields.";
            header('Location: ' . route('admin.pages.create'));
            exit;
        }

        $pageModel = new Page();

        // Ensure slug is unique
        $data['slug'] = $this->generateUniqueSlug($data['slug']);

        try {
            if ($pageModel->save($data)) {
                $insertedId = \App\Core\Database::connect()->lastInsertId();
                $_SESSION['success'] = "Page created successfully.";
                
                if (isset($_POST['redirect_edit']) && $insertedId) {
                    header('Location: ' . route('admin.pages.edit', ['id' => $insertedId]));
                } else {
                    header('Location: ' . route('admin.pages.index'));
                }
            } else {
                $_SESSION['error'] = "Failed to save the page.";
                header('Location: ' . route('admin.pages.create'));
            }
        } catch (\Exception $e) {
            $_SESSION['error'] = "Database error: " . $e->getMessage();
            header('Location: ' . route('admin.pages.create'));
        }
    }

    public function edit($id)
    {
        $pageModel = new Page();
        $page = $pageModel->find($id);

        if (!$page) {
            header('Location: ' . route('admin.pages.index'));
            exit;
        }

        $templates = $this->getTemplates();

        $this->adminView('pages/edit', [
            'title' => 'Edit Page',
            'page' => $page,
            'templates' => $templates
        ]);
    }

    public function update($id)
    {
        $id = (int)$id; 
        $data = [
            'id' => $id,
            'title' => $_POST['title'] ?? '',
            'slug' => $_POST['slug'] ?? '',
            'template' => $_POST['template'] ?? '',
            'content' => $_POST['content'] ?? '',
            'custom_class' => $_POST['custom_class'] ?? ''
        ];

        // Debug Log
        file_put_contents('/tmp/admin_save_debug.log', "Update ID: $id Time: " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);
        if (empty($data['title'])) file_put_contents('/tmp/admin_save_debug.log', "ERROR: Empty title\n", FILE_APPEND);
        file_put_contents('/tmp/admin_save_debug.log', "Content Length: " . strlen($data['content']) . "\n", FILE_APPEND);
        file_put_contents('/tmp/admin_save_debug.log', "POST Data: " . json_encode($_POST) . "\n\n", FILE_APPEND);

        $data['content'] = preg_replace_callback('/style=["\'][^"\']*url\("([^"]+)"\)[^"\']*["\']/', function($matches) {
            return str_replace(['url("', '")'], ["url('", "')"], $matches[0]);
        }, $data['content']);

        if (empty($data['title']) || empty($data['slug']) || empty($data['template'])) {
            $_SESSION['error'] = "Title, Slug, and Template cannot be empty.";
            header('Location: ' . route('admin.pages.edit', ['id' => $id]));
            exit;
        }

        $pageModel = new Page();
        // Ensure slug is unique (excluding currently edited page)
        $data['slug'] = $this->generateUniqueSlug($data['slug'], $id);

        try {
            if ($pageModel->save($data)) {
                $_SESSION['success'] = "Page updated successfully.";
                
                if (isset($_POST['redirect_edit'])) {
                    header('Location: ' . route('admin.pages.edit', ['id' => $id]));
                } else {
                    header('Location: ' . route('admin.pages.index'));
                }
            } else {
                $_SESSION['error'] = "Failed to update the page.";
                header('Location: ' . route('admin.pages.edit', ['id' => $id]));
            }
        } catch (\Exception $e) {
            $_SESSION['error'] = "Database error: " . $e->getMessage();
            header('Location: ' . route('admin.pages.edit', ['id' => $id]));
        }
    }

    public function destroy($id)
    {
        $pageModel = new Page();
        $pageModel->delete($id);
        $_SESSION['success'] = "Page deleted.";
        header('Location: ' . route('admin.pages.index'));
    }

    public function preview()
    {
        $content = $_POST['content'] ?? '';
        $template = $_POST['template'] ?? 'blank.php';
        $custom_class = $_POST['custom_class'] ?? '';
        $custom_css = $_POST['custom_css'] ?? '';
        $title = $_POST['title'] ?? 'Preview Page';

        $page = [
            'content' => $content,
            'template' => $template,
            'custom_class' => $custom_class,
            'title' => $title,
            'slug' => 'preview'
        ];

        $classname = 'dm-agency-dubai';
        $templatePath = __DIR__ . '/../../Views/customlayout/' . $template;
        if (file_exists($templatePath)) {
            $templateFileContent = file_get_contents($templatePath);
            if (preg_match('/\$classname\s*=\s*\'([^\']+)\';/', $templateFileContent, $matches)) {
                $classname = $matches[1];
            }
        }
        if (!empty($custom_class)) {
            $classname = $custom_class;
        }

        $meta = [
            'classname' => $classname,
            'title' => $title
        ];

        // We need to bypass the standard view rendering if it doesn't support direct include
        // But the layout expect $content.
        
        // Capture dynamic_renderer output
        ob_start();
        extract(['page' => $page]);
        include __DIR__ . '/../../Views/customlayout/dynamic_renderer.php';
        $content = ob_get_clean();

        // Render layout
        extract(['meta' => $meta, 'content' => $content]);
        
        // Set preview mode true for components
        define('IS_PREVIEW', true);

        $this->singleView('admin/pages/preview', [
            'meta' => $meta,
            'title' => $title,
            'content' => $content,
            'custom_class' => $custom_class,
            'custom_css' => $custom_css,
            'template' => $template,
            'is_live_editor' => isset($_POST['is_live_editor'])
        ]);
        exit;
    }

    private function generateUniqueSlug($slug, $excludeId = null)
    {
        $pageModel = new Page();
        $originalSlug = $slug;
        $counter = 1;

        while (true) {
            $sql = "SELECT id FROM pages WHERE slug = ? ";
            $params = [$slug];
            if ($excludeId) {
                $sql .= " AND id != ?";
                $params[] = $excludeId;
            }

            $exists = $pageModel->query($sql, $params);

            if (empty($exists)) {
                return $slug;
            }

            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }
    }

    public function getTemplateContent()
    {
        header('Content-Type: application/json');
        $template = $_GET['template'] ?? '';
        if (empty($template)) {
            echo json_encode(['status' => 'error', 'message' => 'Template not specified.']);
            return;
        }

        $filePath = __DIR__ . '/../../Views/customlayout/' . $template;

        if (file_exists($filePath)) {
            $content = file_get_contents($filePath);
            echo json_encode(['status' => 'success', 'content' => $content]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Template not found.']);
        }
    }

    /**
     * Get templates from customlayout folder
     */
    private function getTemplates()
    {
        $dir = __DIR__ . '/../../Views/customlayout/';
        $templates = [];
        if (is_dir($dir)) {
            $files = scandir($dir);
            foreach ($files as $file) {
                if (pathinfo($file, PATHINFO_EXTENSION) === 'php' && $file !== 'dynamic_renderer.php') {
                    $templates[] = $file;
                }
            }
        }
        return $templates;
    }
}
