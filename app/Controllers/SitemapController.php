<?php

namespace App\Controllers;

use App\Models\Sitemap;

class SitemapController
{
    public function index()
    {
        $sitemapModel = new Sitemap();
        $sitemaps = $sitemapModel->findAll();
        $sitemap = $sitemaps[0] ?? null;
        $content = $sitemap['content'] ?? '';

        if (empty($content)) {
            // Fallback default if empty
            $content = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>';
        }

        header('Content-Type: application/xml; charset=utf-8');
        echo $content;
        exit;
    }
}
