<?php

namespace App\Controllers\Admin;

use App\Models\Blog;
use App\Models\BlogCategory;

class AdminBlogController extends AdminBaseController // Extend AdminBaseController
{
    private Blog $blogModel;
    private BlogCategory $blogCategoryModel;

    public function __construct()
    {
        parent::__construct(); // Call parent constructor
        $this->blogModel = new Blog();
        $this->blogCategoryModel = new BlogCategory();
        require_once __DIR__ . '/../../Core/helpers.php'; // For generateUniqueSlug
    }



    public function index()
    {
        $this->requireAdminAuth(); // Ensure admin is authenticated
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

    public function create()
    {
        $this->requireAdminAuth(); // Ensure admin is authenticated
        $blogCategories = $this->blogCategoryModel->findAll();
        return $this->adminView('blogs/create', [
            'blogCategories' => $blogCategories
        ]);
    }

    public function store()
    {
        $this->requireAdminAuth(); // Ensure admin is authenticated
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

        // Handle Image Upload
        $imagePath = null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imagePath = handleImageUpload($_FILES['image'], 'blog');
        }

        $created_at = !empty($_POST['created_at']) ? date('Y-m-d H:i:s', strtotime($_POST['created_at'])) : date('Y-m-d H:i:s');

        $data = [
            'title' => $title,
            'slug' => $slug,
            'description' => $description,
            'blog_category_id' => $blog_category_id,
            'created_at' => $created_at,
            'image' => $imagePath
        ];

        $this->blogModel->save($data);

        $_SESSION['success'] = 'Blog post created successfully.';
        header('Location: ' . route('admin.blogs_admin.index'));
        exit;
    }

    public function show($id)
    {
        // Not typically used for admin resource management, redirect to edit or handle specifically if needed
        header('Location: ' . route('admin.blogs_admin.edit', ['id' => $id]));
        exit;
    }

    public function edit($id)
    {
        $this->requireAdminAuth(); // Ensure admin is authenticated
        $blog = $this->blogModel->find($id);
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

    public function update($id)
    {
        $this->requireAdminAuth(); // Ensure admin is authenticated
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

        // Slug handling
        $slugInput = trim($_POST['slug'] ?? '');
        if (!empty($slugInput)) {
            $slug = generateUniqueSlug($slugInput, $this->blogModel, $id);
        } else {
            // If slug is empty (cleared by user), regenerate from title
            $slug = generateUniqueSlug($title, $this->blogModel, $id);
        }

        // Handle Image Upload
        $imagePath = $blog['image'] ?? null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $newImage = handleImageUpload($_FILES['image'], 'blog');
            if ($newImage) {
                // Delete old image if exists
                if (!empty($blog['image'])) {
                    $oldImagePath = __DIR__ . '/../../../public/' . $blog['image'];
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
                $imagePath = $newImage;
            }
        }

        $created_at = !empty($_POST['created_at']) ? date('Y-m-d H:i:s', strtotime($_POST['created_at'])) : $blog['created_at'];

        $data = [
            'id' => $id,
            'title' => $title,
            'slug' => $slug,
            'description' => $description,
            'blog_category_id' => $blog_category_id,
            'created_at' => $created_at,
            'image' => $imagePath
        ];

        $this->blogModel->save($data);

        $_SESSION['success'] = 'Blog post updated successfully.';
        header('Location: ' . route('admin.blogs_admin.index'));
        exit;
    }

    public function destroy($id)
    {
        $this->requireAdminAuth(); // Ensure admin is authenticated
        csrf_verify();
        // Remove debug lines
        // var_dump("Deleting blog with ID:", $id); 
        $blog = $this->blogModel->find($id);
        // var_dump("Fetched blog for deletion:", $blog); 

        if (!$blog) {
            $_SESSION['error'] = 'Blog post not found.';
            header('Location: ' . route('admin.blogs_admin.index'));
            exit;
        }

        // Delete image file if exists
        if (!empty($blog['image'])) {
            $imagePath = __DIR__ . '/../../../public/' . $blog['image'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $this->blogModel->delete($id);

        $_SESSION['success'] = 'Blog post deleted successfully.';
        header('Location: ' . route('admin.blogs_admin.index'));
        exit;
    }
}
