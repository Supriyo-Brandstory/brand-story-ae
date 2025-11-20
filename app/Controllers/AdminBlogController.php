<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;

class AdminBlogController extends Controller
{
    private Blog $blogModel;
    private BlogCategory $blogCategoryModel;

    public function __construct()
    {
        // No parent constructor to call in App\Core\Controller
        $this->blogModel = new Blog();
        $this->blogCategoryModel = new BlogCategory();
        require_once __DIR__ . '/../Core/helpers.php'; // For generateUniqueSlug
    }

    public function index() {
        // Fetch all blogs, possibly with their category names
        // For simplicity, let's fetch all blogs and then categories separately for display
        $blogs = $this->blogModel->findAll();
        $blogCategories = $this->blogCategoryModel->findAll();
        $categoriesMap = [];
        foreach ($blogCategories as $category) {
            $categoriesMap[$category['id']] = $category['name'];
        }

        foreach ($blogs as &$blog) {
            $blog['category_name'] = $categoriesMap[$blog['blog_category_id']] ?? 'N/A';
        }
        unset($blog); // Break the reference

        return $this->adminView('blogs/index', [
            'blogs' => $blogs
        ]);
    }

    public function create() {
        $blogCategories = $this->blogCategoryModel->findAll();
        return $this->adminView('blogs/create', [
            'blogCategories' => $blogCategories
        ]);
    }

    public function store() {
        csrf_verify();

        $title = trim($_POST['title'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $blog_category_id = (int)($_POST['blog_category_id'] ?? 0);

        if (empty($title) || empty($description) || empty($blog_category_id)) {
            $_SESSION['error'] = 'Title, description, and category are required.';
            header('Location: ' . route('admin.blogs_admin.create'));
            exit;
        }

        // Generate unique slug
        $slug = generateUniqueSlug($title, $this->blogModel);

        $data = [
            'title' => $title,
            'slug' => $slug,
            'description' => $description,
            'blog_category_id' => $blog_category_id
        ];

        $this->blogModel->save($data);

        $_SESSION['success'] = 'Blog post created successfully.';
        header('Location: ' . route('admin.blogs_admin.index'));
        exit;
    }

    public function show($id) {
        // Not typically used for admin resource management, redirect to edit or handle specifically if needed
        header('Location: ' . route('admin.blogs_admin.edit', ['id' => $id]));
        exit;
    }

    public function edit($id) {
        var_dump("Editing blog with ID:", $id); // Debug line
        $blog = $this->blogModel->find($id);
        var_dump("Fetched blog:", $blog); // Debug line
        $blogCategories = $this->blogCategoryModel->findAll();

        if (!$blog) {
            $_SESSION['error'] = 'Blog post not found.';
            header('Location: ' . route('admin.blogs_admin.index'));
            exit;
        }

        return $this->adminView('blogs/edit', [
            'blog' => $blog,
            'blogCategories' => $blogCategories
        ]);
    }

    public function update($id) {
        csrf_verify();

        $blog = $this->blogModel->find($id);

        if (!$blog) {
            $_SESSION['error'] = 'Blog post not found.';
            header('Location: ' . route('admin.blogs_admin.index'));
            exit;
        }

        $title = trim($_POST['title'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $blog_category_id = (int)($_POST['blog_category_id'] ?? 0);

        if (empty($title) || empty($description) || empty($blog_category_id)) {
            $_SESSION['error'] = 'Title, description, and category are required.';
            header('Location: ' . route('admin.blogs_admin.edit', ['id' => $id]));
            exit;
        }

        // Slug generation on update: only if title changes
        $slug = $blog['slug']; // Keep existing slug by default
        if ($title !== $blog['title']) {
            $slug = generateUniqueSlug($title, $this->blogModel);
        }

        $data = [
            'id' => $id,
            'title' => $title,
            'slug' => $slug,
            'description' => $description,
            'blog_category_id' => $blog_category_id
        ];

        $this->blogModel->save($data);

        $_SESSION['success'] = 'Blog post updated successfully.';
        header('Location: ' . route('admin.blogs_admin.index'));
        exit;
    }

    public function destroy($id) {
        csrf_verify();
        var_dump("Deleting blog with ID:", $id); // Debug line
        $blog = $this->blogModel->find($id);
        var_dump("Fetched blog for deletion:", $blog); // Debug line

        if (!$blog) {
            $_SESSION['error'] = 'Blog post not found.';
            header('Location: ' . route('admin.blogs_admin.index'));
            exit;
        }

        $this->blogModel->delete($id);

        $_SESSION['success'] = 'Blog post deleted successfully.';
        header('Location: ' . route('admin.blogs_admin.index'));
        exit;
    }
}
