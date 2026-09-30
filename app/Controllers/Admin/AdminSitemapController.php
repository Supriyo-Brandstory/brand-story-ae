<?php

namespace App\Controllers\Admin;

use App\Models\Sitemap;
use App\Services\SitemapService;

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

        $activeTab = $_GET['tab'] ?? 'pages';
        if (!in_array($activeTab, ['pages', 'blogs', 'index'])) {
            $activeTab = 'pages';
        }

        $pagesContent = SitemapService::getSitemapContent('pages');
        $blogsContent = SitemapService::getSitemapContent('blogs');
        $indexContent = SitemapService::generateIndexXml();

        // Get count of URLs
        preg_match_all('/<loc>(.*?)<\/loc>/i', $pagesContent, $pagesMatches);
        $pagesCount = count($pagesMatches[1] ?? []);

        preg_match_all('/<loc>(.*?)<\/loc>/i', $blogsContent, $blogsMatches);
        $blogsCount = count($blogsMatches[1] ?? []);

        return $this->adminView('sitemap/index', [
            'activeTab' => $activeTab,
            'pagesContent' => $pagesContent,
            'blogsContent' => $blogsContent,
            'indexContent' => $indexContent,
            'pagesCount' => $pagesCount,
            'blogsCount' => $blogsCount
        ]);
    }

    public function update()
    {
        $this->requireAdminAuth();
        csrf_verify();

        $type = $_POST['type'] ?? 'pages';
        if (!in_array($type, ['pages', 'blogs'])) {
            $type = 'pages';
        }

        $content = $_POST['content'] ?? '';
        SitemapService::saveSitemapContent($type, $content);

        $label = ($type === 'blogs') ? 'Post Sitemap' : 'Pages Sitemap';
        $_SESSION['success'] = "{$label} updated successfully.";
        header('Location: ' . route('admin.sitemap.index') . '?tab=' . $type);
        exit;
    }

    public function sync()
    {
        $this->requireAdminAuth();
        csrf_verify();

        $count = SitemapService::syncAllPages();

        $_SESSION['success'] = "Successfully synced {$count} URLs across Pages and Post Sitemaps.";
        header('Location: ' . route('admin.sitemap.index'));
        exit;
    }

    public function syncPages()
    {
        $this->requireAdminAuth();
        csrf_verify();

        $count = SitemapService::syncPagesSitemap();

        $_SESSION['success'] = "Successfully synced {$count} Page URLs to the Pages Sitemap.";
        header('Location: ' . route('admin.sitemap.index') . '?tab=pages');
        exit;
    }

    public function syncBlogs()
    {
        $this->requireAdminAuth();
        csrf_verify();

        $count = SitemapService::syncBlogsSitemap();

        $_SESSION['success'] = "Successfully synced {$count} Post URLs to the Post Sitemap.";
        header('Location: ' . route('admin.sitemap.index') . '?tab=blogs');
        exit;
    }
}

