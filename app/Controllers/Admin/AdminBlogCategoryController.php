<?php
namespace App\Controllers\Admin;

use App\Models\BlogCategory;
use App\Models\Blog; // Add Blog model

class AdminBlogCategoryController extends AdminBaseController // Extend AdminBaseController
{
    private BlogCategory $blogCategoryModel;
    private Blog $blogModel; // Declare Blog model

    public function __construct()
    {
        parent::__construct(); // Call parent constructor
        $this->blogCategoryModel = new BlogCategory();
        $this->blogModel = new Blog(); // Instantiate Blog model
        require_once __DIR__ . '/../../Core/helpers.php'; // For generateUniqueSlug
    }

    public function index() {
        $this->requireAdminAuth(); // Ensure admin is authenticated
        $blogCategories = $this->blogCategoryModel->findAll();
        return $this->adminView('blog-categories/index', [
            'blogCategories' => $blogCategories
        ]);
    }

    public function create() {
        $this->requireAdminAuth(); // Ensure admin is authenticated
        return $this->adminView('blog-categories/create');
    }

    public function store() {
        $this->requireAdminAuth(); // Ensure admin is authenticated
        csrf_verify();

        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');

        if (empty($name)) {
            $_SESSION['error'] = 'Category name is required.';
            header('Location: ' . route('admin.blogCategories.create'));
            exit;
        }

        // Generate unique slug
        $slug = generateUniqueSlug($name, $this->blogCategoryModel);

        $data = [
            'name' => $name,
            'slug' => $slug,
            'description' => $description
        ];

        $this->blogCategoryModel->save($data);

        $_SESSION['success'] = 'Blog category created successfully.';
        header('Location: ' . route('admin.blogCategories.index'));
        exit;
    }

    public function show($id) {
        // Not typically used for admin resource management, redirect to edit or handle specifically if needed
        header('Location: ' . route('admin.blogCategories.edit', ['id' => $id]));
        exit;
    }

    public function edit($id) {
        $this->requireAdminAuth(); // Ensure admin is authenticated
        // var_dump("Editing category with ID:", $id); // Debug line
        $category = $this->blogCategoryModel->find($id);
        // var_dump("Fetched category:", $category); // Debug line

        if (!$category) {
            $_SESSION['error'] = 'Blog category not found.';
            header('Location: ' . route('admin.blogCategories.index'));
            exit;
        }

        return $this->adminView('blog-categories/edit', [
            'category' => $category
        ]);
    }

    public function update($id) {
        $this->requireAdminAuth(); // Ensure admin is authenticated
        csrf_verify();

        $category = $this->blogCategoryModel->find($id);

        if (!$category) {
            $_SESSION['error'] = 'Blog category not found.';
            header('Location: ' . route('admin.blogCategories.index'));
            exit;
        }

        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');

        if (empty($name)) {
            $_SESSION['error'] = 'Category name is required.';
            header('Location: ' . route('admin.blogCategories.edit', ['id' => $id]));
            exit;
        }

        // Slug generation on update: only if name changes
        $slug = $category['slug']; // Keep existing slug by default
        if ($name !== $category['name']) {
            $slug = generateUniqueSlug($name, $this->blogCategoryModel);
        }

        $data = [
            'id' => $id,
            'name' => $name,
            'slug' => $slug,
            'description' => $description
        ];

        $this->blogCategoryModel->save($data);

        $_SESSION['success'] = 'Blog category updated successfully.';
        header('Location: ' . route('admin.blogCategories.index'));
        exit;
    }

    public function destroy($id) {
        $this->requireAdminAuth(); // Ensure admin is authenticated
        csrf_verify();
        // Remove debug lines
        // var_dump("Deleting category with ID:", $id); 
        $category = $this->blogCategoryModel->find($id);
        // var_dump("Fetched category for deletion:", $category); 

        if (!$category) {
            $_SESSION['error'] = 'Blog category not found.';
            header('Location: ' . route('admin.blogCategories.index'));
            exit;
        }

        // Check if there are any blogs associated with this category
        $stmt = $this->blogModel->query(
            "SELECT COUNT(*) as count FROM {$this->blogModel->getTableName()} WHERE blog_category_id = ?",
            [$id]
        );
        $result = $stmt[0]['count'] ?? 0;

        if ($result > 0) {
            $_SESSION['error'] = 'Cannot delete category with associated blog posts. Please reassign or delete the blog posts first.';
            header('Location: ' . route('admin.blogCategories.index'));
            exit;
        }

        $this->blogCategoryModel->delete($id);

        $_SESSION['success'] = 'Blog category deleted successfully.';
        header('Location: ' . route('admin.blogCategories.index'));
        exit;
    }
}
