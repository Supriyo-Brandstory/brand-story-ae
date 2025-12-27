<?php

namespace App\Controllers\Admin;

use App\Models\Seo;

class AdminSeoController extends AdminBaseController
{
    private Seo $seoModel;

    public function __construct()
    {
        parent::__construct();
        $this->seoModel = new Seo();
        require_once __DIR__ . '/../../Core/helpers.php';
    }

    public function index()
    {
        $this->requireAdminAuth();

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $search = trim($_GET['search'] ?? '');
        $perPage = 10;

        $where = [];
        if (!empty($search)) {
            $where['page_url'] = "%$search%";
        }

        $result = $this->seoModel->paginate($perPage, $page, $where);

        // Pass to view
        return $this->adminView('seo/index', [
            'seoList' => $result['data'],
            'pagination' => $result,
            'search' => $search
        ]);
    }

    public function create()
    {
        $this->requireAdminAuth();
        return $this->adminView('seo/create');
    }

    public function store()
    {
        $this->requireAdminAuth();
        csrf_verify();

        $page_url = trim($_POST['page_url'] ?? '');
        $meta_title = trim($_POST['meta_title'] ?? '');
        $meta_description = trim($_POST['meta_description'] ?? '');
        $other_script_or_tag = trim($_POST['other_script_or_tag'] ?? '');

        if (empty($page_url)) {
            $_SESSION['error'] = 'Page URL is required.';
            header('Location: ' . route('admin.seo.create'));
            exit;
        }

        // Check if page_url already exists
        $existing = $this->seoModel->query("SELECT id FROM seo WHERE page_url = ?", [$page_url]);
        if (!empty($existing)) {
            $_SESSION['error'] = 'SEO for this Page URL already exists.';
            header('Location: ' . route('admin.seo.create'));
            exit;
        }

        $data = [
            'page_url' => $page_url,
            'meta_title' => $meta_title,
            'meta_description' => $meta_description,
            'other_script_or_tag' => $other_script_or_tag
        ];

        $this->seoModel->save($data);

        $_SESSION['success'] = 'SEO entry created successfully.';
        header('Location: ' . route('admin.seo.index'));
        exit;
    }

    public function edit($id)
    {
        $this->requireAdminAuth();
        $seo = $this->seoModel->find($id);

        if (!$seo) {
            $_SESSION['error'] = 'SEO entry not found.';
            header('Location: ' . route('admin.seo.index'));
            exit;
        }

        return $this->adminView('seo/edit', [
            'seo' => $seo
        ]);
    }

    public function update($id)
    {
        $this->requireAdminAuth();
        csrf_verify();

        $seo = $this->seoModel->find($id);

        if (!$seo) {
            $_SESSION['error'] = 'SEO entry not found.';
            header('Location: ' . route('admin.seo.index'));
            exit;
        }

        $page_url = trim($_POST['page_url'] ?? '');
        $meta_title = trim($_POST['meta_title'] ?? '');
        $meta_description = trim($_POST['meta_description'] ?? '');
        $other_script_or_tag = trim($_POST['other_script_or_tag'] ?? '');

        if (empty($page_url)) {
            $_SESSION['error'] = 'Page URL is required.';
            header('Location: ' . route('admin.seo.edit', ['id' => $id]));
            exit;
        }

        // Check uniqueness if URL changed
        if ($page_url !== $seo['page_url']) {
            $existing = $this->seoModel->query("SELECT id FROM seo WHERE page_url = ? AND id != ?", [$page_url, $id]);
            if (!empty($existing)) {
                $_SESSION['error'] = 'SEO for this Page URL already exists.';
                header('Location: ' . route('admin.seo.edit', ['id' => $id]));
                exit;
            }
        }

        $data = [
            'id' => $id,
            'page_url' => $page_url,
            'meta_title' => $meta_title,
            'meta_description' => $meta_description,
            'other_script_or_tag' => $other_script_or_tag
        ];

        $this->seoModel->save($data);

        $_SESSION['success'] = 'SEO entry updated successfully.';
        header('Location: ' . route('admin.seo.index'));
        exit;
    }

    public function destroy($id)
    {
        $this->requireAdminAuth();
        csrf_verify();

        $this->seoModel->delete($id);

        $_SESSION['success'] = 'SEO entry deleted successfully.';
        header('Location: ' . route('admin.seo.index'));
        exit;
    }
}
