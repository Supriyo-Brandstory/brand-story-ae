<?php

namespace App\Controllers\Admin;

use App\Models\Blog;
use App\Models\BlogCategory;

class AdminBlogController extends AdminBaseController 
{
    private Blog $blogModel;
    private BlogCategory $blogCategoryModel;

    public function __construct()
    {
        parent::__construct(); 
        $this->blogModel = new Blog();
        $this->blogCategoryModel = new BlogCategory();
        require_once __DIR__ . '/../../Core/helpers.php'; 
    }

    public function index()
    {
        $this->requireAdminAuth(); 

        $search = $_GET['search'] ?? '';
        $perPage = 10;
        $currentPage = (int)($_GET['page'] ?? 1);
        if ($currentPage < 1) $currentPage = 1;

        $where = [];
        if (!empty($search)) {
            $where['title'] = '%' . $search . '%';
        }

        $paginationData = $this->blogModel->paginate($perPage, $currentPage, $where);
        $blogs = $paginationData['data'];

        $blogCategories = $this->blogCategoryModel->findAll();
        $categoriesMap = [];
        foreach ($blogCategories as $category) {
            $categoriesMap[$category['id']] = $category['name'];
        }

        foreach ($blogs as &$blog) {
            $blog['category_name'] = $categoriesMap[$blog['blog_category_id']] ?? 'N/A';
            $blog['sub_category_name'] = $categoriesMap[$blog['blog_sub_category_id']] ?? 'N/A';
        }
        unset($blog); 

        return $this->adminView('blogs/index', [
            'blogs' => $blogs,
            'totalItems' => $paginationData['total'],
            'totalPages' => $paginationData['last_page'],
            'currentPage' => $paginationData['current_page'],
            'perPage' => $perPage,
            'search' => $search
        ]);
    }

    public function create()
    {
        $this->requireAdminAuth(); 
        $blogCategories = $this->blogCategoryModel->query("SELECT * FROM blog_categories WHERE parent_id IS NULL ORDER BY name ASC");
        return $this->adminView('blogs/create', [
            'blogCategories' => $blogCategories
        ]);
    }

    public function store()
    {
        $this->requireAdminAuth(); 
        csrf_verify();

        $title = trim($_POST['title'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $blog_category_id = (int)($_POST['blog_category_id'] ?? 0);
        $blog_sub_category_id = !empty($_POST['blog_sub_category_id']) ? (int)$_POST['blog_sub_category_id'] : null;

        if (empty($title) || empty($description) || empty($blog_category_id)) {
            $_SESSION['error'] = 'Title, description, and category are required.';
            header('Location: ' . route('admin.blogs_admin.create'));
            exit;
        }

        $slug = generateUniqueSlug($title, $this->blogModel);

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
            'blog_sub_category_id' => $blog_sub_category_id,
            'created_at' => $created_at,
            'image' => $imagePath
        ];

        $this->blogModel->save($data);

        $_SESSION['success'] = 'Blog post created successfully.';
        header('Location: ' . route('admin.blogs_admin.index'));
        exit;
    }

    public function edit($id)
    {
        $this->requireAdminAuth(); 
        $blog = $this->blogModel->find($id);
        $blogCategories = $this->blogCategoryModel->query("SELECT * FROM blog_categories WHERE parent_id IS NULL ORDER BY name ASC");
        
        $subCategories = [];
        if (!empty($blog['blog_category_id'])) {
            $subCategories = $this->blogCategoryModel->query("SELECT * FROM blog_categories WHERE parent_id = ? ORDER BY sort_order ASC", [$blog['blog_category_id']]);
        }

        if (!$blog) {
            $_SESSION['error'] = 'Blog post not found.';
            header('Location: ' . route('admin.blogs_admin.index'));
            exit;
        }

        return $this->adminView('blogs/edit', [
            'blog' => $blog,
            'blogCategories' => $blogCategories,
            'subCategories' => $subCategories
        ]);
    }

    public function update($id)
    {
        $this->requireAdminAuth(); 
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
        $blog_sub_category_id = !empty($_POST['blog_sub_category_id']) ? (int)$_POST['blog_sub_category_id'] : null;

        if (empty($title) || empty($description) || empty($blog_category_id)) {
            $_SESSION['error'] = 'Title, description, and category are required.';
            header('Location: ' . route('admin.blogs_admin.edit', ['id' => $id]));
            exit;
        }

        $slugInput = trim($_POST['slug'] ?? '');
        if (!empty($slugInput)) {
            $slug = generateUniqueSlug($slugInput, $this->blogModel, $id);
        } else {
            $slug = generateUniqueSlug($title, $this->blogModel, $id);
        }

        $imagePath = $blog['image'] ?? null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $newImage = handleImageUpload($_FILES['image'], 'blog');
            if ($newImage) {
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
            'blog_sub_category_id' => $blog_sub_category_id,
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
        $this->requireAdminAuth(); 
        csrf_verify();
        $blog = $this->blogModel->find($id);

        if (!$blog) {
            $_SESSION['error'] = 'Blog post not found.';
            header('Location: ' . route('admin.blogs_admin.index'));
            exit;
        }

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
