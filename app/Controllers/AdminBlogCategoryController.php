<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\BlogCategory;

class AdminBlogCategoryController extends Controller
{
    private BlogCategory $blogCategoryModel;

    public function __construct()
    {
        // No parent constructor to call in App\Core\Controller
        $this->blogCategoryModel = new BlogCategory();
        require_once __DIR__ . '/../Core/helpers.php'; // For generateUniqueSlug
    }

    public function index() {
        $blogCategories = $this->blogCategoryModel->findAll();
        return $this->adminView('blog-categories/index', [
            'blogCategories' => $blogCategories
        ]);
    }

    public function create() {
        return $this->adminView('blog-categories/create');
    }

    public function store() {
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
        var_dump("Editing category with ID:", $id); // Debug line
        $category = $this->blogCategoryModel->find($id);
        var_dump("Fetched category:", $category); // Debug line

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
        csrf_verify();
        var_dump("Deleting category with ID:", $id); // Debug line
        $category = $this->blogCategoryModel->find($id);
        var_dump("Fetched category for deletion:", $category); // Debug line

        if (!$category) {
            $_SESSION['error'] = 'Blog category not found.';
            header('Location: ' . route('admin.blogCategories.index'));
            exit;
        }

        // Check if there are any blogs associated with this category before deleting
        // This requires a method on BlogCategory model or direct query
        // For simplicity, let's assume direct deletion for now, or add check if needed.
        // For production, this should prevent deletion if blogs are linked.
        // A proper hasMany in BaseModel would help here.
        // For now, given BaseModel has no inverse relation, assume direct deletion.

        $this->blogCategoryModel->delete($id);

        $_SESSION['success'] = 'Blog category deleted successfully.';
        header('Location: ' . route('admin.blogCategories.index'));
        exit;
    }
}
