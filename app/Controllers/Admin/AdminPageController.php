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
        
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($page < 1) $page = 1;
        $perPage = 10;
        
        $paginatedData = $pageModel->paginate($perPage, $page);

        $this->adminView('pages/index', [
            'title' => 'Pages Management',
            'pages' => $paginatedData['data'],
            'currentPage' => $paginatedData['current_page'],
            'totalPages' => $paginatedData['last_page']
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
                $_SESSION['success'] = "Page created successfully.";
                header('Location: ' . route('admin.pages.index'));
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
        $data = [
            'id' => $id,
            'title' => $_POST['title'] ?? '',
            'slug' => $_POST['slug'] ?? '',
            'template' => $_POST['template'] ?? '',
            'content' => $_POST['content'] ?? '',
            'custom_class' => $_POST['custom_class'] ?? ''
        ];

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
                header('Location: ' . route('admin.pages.index'));
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
