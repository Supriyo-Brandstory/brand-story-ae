<?php
namespace App\Controllers\Admin;

use App\Models\BlogCategory;
use App\Models\Blog; 

class AdminBlogCategoryController extends AdminBaseController 
{
    private BlogCategory $blogCategoryModel;
    private Blog $blogModel; 

    public function __construct()
    {
        parent::__construct(); 
        $this->blogCategoryModel = new BlogCategory();
        $this->blogModel = new Blog(); 
        require_once __DIR__ . '/../../Core/helpers.php'; 
    }

    public function index() {
        $this->requireAdminAuth(); 

        $search = $_GET['search'] ?? '';
        
        // Fetch all categories to build a tree structure
        $allCategories = $this->blogCategoryModel->findAll();
        
        // Sorting logic (can be improved if BaseModel supported ORDER BY)
        usort($allCategories, function($a, $b) {
            return $a['sort_order'] <=> $b['sort_order'];
        });

        $categoriesMap = [];
        $mainCategories = [];

        foreach ($allCategories as $cat) {
            $cat['subcategories'] = [];
            $categoriesMap[$cat['id']] = $cat;
        }

        foreach ($categoriesMap as $id => &$cat) {
            if ($cat['parent_id']) {
                if (isset($categoriesMap[$cat['parent_id']])) {
                    $categoriesMap[$cat['parent_id']]['subcategories'][] = &$cat;
                }
            } else {
                $mainCategories[] = &$cat;
            }
        }
        unset($cat);

        // Filtering if search is provided
        if (!empty($search)) {
            $filteredMain = [];
            foreach ($mainCategories as $main) {
                if (stripos($main['name'], $search) !== false) {
                    $filteredMain[] = $main;
                } else {
                    $hasMatchingSub = false;
                    foreach ($main['subcategories'] as $sub) {
                        if (stripos($sub['name'], $search) !== false) {
                            $hasMatchingSub = true;
                            break;
                        }
                    }
                    if ($hasMatchingSub) {
                        $filteredMain[] = $main;
                    }
                }
            }
            $mainCategories = $filteredMain;
        }

        return $this->adminView('blog-categories/index', [
            'blogCategories' => $mainCategories,
            'search' => $search
        ]);
    }

    public function create() {
        $this->requireAdminAuth(); 
        $mainCategories = $this->blogCategoryModel->query("SELECT * FROM blog_categories WHERE parent_id IS NULL ORDER BY name ASC");
        return $this->adminView('blog-categories/create', [
            'mainCategories' => $mainCategories
        ]);
    }

    public function store() {
        $this->requireAdminAuth(); 
        csrf_verify();

        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $parent_id = !empty($_POST['parent_id']) ? (int)$_POST['parent_id'] : null;

        if (empty($name)) {
            $_SESSION['error'] = 'Category name is required.';
            header('Location: ' . route('admin.blogCategories.create'));
            exit;
        }

        $slug = generateUniqueSlug($name, $this->blogCategoryModel);

        $data = [
            'name' => $name,
            'slug' => $slug,
            'description' => $description,
            'parent_id' => $parent_id,
            'sort_order' => 0
        ];

        $this->blogCategoryModel->save($data);

        $_SESSION['success'] = 'Blog category created successfully.';
        header('Location: ' . route('admin.blogCategories.index'));
        exit;
    }

    public function edit($id) {
        $this->requireAdminAuth(); 
        $category = $this->blogCategoryModel->find($id);

        if (!$category) {
            $_SESSION['error'] = 'Blog category not found.';
            header('Location: ' . route('admin.blogCategories.index'));
            exit;
        }

        $mainCategories = $this->blogCategoryModel->query("SELECT * FROM blog_categories WHERE parent_id IS NULL AND id != ? ORDER BY name ASC", [$id]);

        return $this->adminView('blog-categories/edit', [
            'category' => $category,
            'mainCategories' => $mainCategories
        ]);
    }

    public function update($id) {
        $this->requireAdminAuth(); 
        csrf_verify();

        $category = $this->blogCategoryModel->find($id);

        if (!$category) {
            $_SESSION['error'] = 'Blog category not found.';
            header('Location: ' . route('admin.blogCategories.index'));
            exit;
        }

        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $parent_id = !empty($_POST['parent_id']) ? (int)$_POST['parent_id'] : null;

        if (empty($name)) {
            $_SESSION['error'] = 'Category name is required.';
            header('Location: ' . route('admin.blogCategories.edit', ['id' => $id]));
            exit;
        }

        $slug = $category['slug']; 
        if ($name !== $category['name']) {
            $slug = generateUniqueSlug($name, $this->blogCategoryModel, $id);
        }

        $data = [
            'id' => $id,
            'name' => $name,
            'slug' => $slug,
            'description' => $description,
            'parent_id' => $parent_id
        ];

        $this->blogCategoryModel->save($data);

        $_SESSION['success'] = 'Blog category updated successfully.';
        header('Location: ' . route('admin.blogCategories.index'));
        exit;
    }

    public function destroy($id) {
        $this->requireAdminAuth(); 
        csrf_verify();

        $category = $this->blogCategoryModel->find($id);

        if (!$category) {
            $_SESSION['error'] = 'Blog category not found.';
            header('Location: ' . route('admin.blogCategories.index'));
            exit;
        }

        // Check for subcategories
        $subCount = $this->blogCategoryModel->query("SELECT COUNT(*) as count FROM blog_categories WHERE parent_id = ?", [$id]);
        if ($subCount[0]['count'] > 0) {
            $_SESSION['error'] = 'Cannot delete category with subcategories. Please reassign or delete subcategories first.';
            header('Location: ' . route('admin.blogCategories.index'));
            exit;
        }

        // Check if there are any blogs associated with this category
        $stmt = $this->blogModel->query(
            "SELECT COUNT(*) as count FROM {$this->blogModel->getTableName()} WHERE blog_category_id = ? OR blog_sub_category_id = ?",
            [$id, $id]
        );
        $result = $stmt[0]['count'] ?? 0;

        if ($result > 0) {
            $_SESSION['error'] = 'Cannot delete category with associated blog posts.';
            header('Location: ' . route('admin.blogCategories.index'));
            exit;
        }

        $this->blogCategoryModel->delete($id);

        $_SESSION['success'] = 'Blog category deleted successfully.';
        header('Location: ' . route('admin.blogCategories.index'));
        exit;
    }

    public function updateOrder() {
        $this->requireAdminAuth();
        csrf_verify();

        $order = $_POST['order'] ?? [];

        if (!empty($order)) {
            foreach ($order as $index => $id) {
                $this->blogCategoryModel->save([
                    'id' => $id,
                    'sort_order' => $index
                ]);
            }
            return $this->json(['status' => 'success', 'message' => 'Order updated successfully.']);
        }

        return $this->json(['status' => 'error', 'message' => 'Invalid order data.'], 400);
    }

    public function getSubcategories($parentId) {
        $this->requireAdminAuth();
        $subcategories = $this->blogCategoryModel->query("SELECT id, name FROM blog_categories WHERE parent_id = ? ORDER BY sort_order ASC", [$parentId]);
        return $this->json($subcategories);
    }
}
