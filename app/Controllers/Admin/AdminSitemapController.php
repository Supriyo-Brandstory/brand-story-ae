<?php

namespace App\Controllers\Admin;

use App\Models\Sitemap;

class AdminSitemapController extends AdminBaseController
{
    private Sitemap $sitemapModel;

    public function __construct()
    {
        parent::__construct();
        $this->sitemapModel = new Sitemap();
    }

    public function index()
    {
        $this->requireAdminAuth();

        // Fetch existing sitemap (take the first one found)
        $sitemaps = $this->sitemapModel->findAll();
        $sitemap = $sitemaps[0] ?? null;

        $content = $sitemap['content'] ?? '';

        return $this->adminView('sitemap/index', [
            'content' => $content
        ]);
    }

    public function update()
    {
        $this->requireAdminAuth();
        csrf_verify();

        $content = $_POST['content'] ?? '';

        // Check if record exists
        $sitemaps = $this->sitemapModel->findAll();
        $sitemap = $sitemaps[0] ?? null;

        if ($sitemap) {
            $this->sitemapModel->save([
                'id' => $sitemap['id'],
                'content' => $content
            ]);
        } else {
            // Insert new (without ID, let DB assign it)
            $this->sitemapModel->save([
                'content' => $content
            ]);
        }

        $_SESSION['success'] = 'Sitemap updated successfully.';
        header('Location: ' . route('admin.sitemap.index'));
        exit;
    }
}
