<?php

namespace App\Controllers;

use App\Services\SitemapService;

class SitemapController
{
    /**
     * Main Sitemap Index (/sitemap.xml) connecting page and blog sitemaps.
     */
    public function index()
    {
        $content = SitemapService::generateIndexXml();

        header('Content-Type: application/xml; charset=utf-8');
        header('X-Robots-Tag: noindex, follow');
        echo $content;
        exit;
    }

    /**
     * Pages Sitemap (/page-sitemap.xml) containing all regular website pages.
     */
    public function pages()
    {
        $content = SitemapService::getSitemapContent('pages');

        header('Content-Type: application/xml; charset=utf-8');
        echo $content;
        exit;
    }

    /**
     * Blogs Sitemap (/blog-sitemap.xml) containing all blog post pages.
     */
    public function blogs()
    {
        $content = SitemapService::getSitemapContent('blogs');

        header('Content-Type: application/xml; charset=utf-8');
        echo $content;
        exit;
    }
}

