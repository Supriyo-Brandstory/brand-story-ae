<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\Page;
use App\Models\Sitemap;
use DOMDocument;
use DOMXPath;

class SitemapService
{
    /**
     * Format URL to ensure valid protocol, consistent domain, canonical /blogs/ prefix, and trailing slash.
     */
    public static function formatUrl(string $slugOrUrl): string
    {
        $slugOrUrl = trim($slugOrUrl);
        if (empty($slugOrUrl)) {
            $base = function_exists('base_url') ? base_url('') : '/';
            return rtrim($base, '/') . '/';
        }

        $path = parse_url($slugOrUrl, PHP_URL_PATH) ?? '';
        $cleanPath = trim($path, '/');

        // Standardize any singular blog/ to blogs/
        if (preg_match('#^blog/(.+)$#i', $cleanPath, $m)) {
            $cleanPath = 'blogs/' . $m[1];
        } elseif (strtolower($cleanPath) === 'blog') {
            $cleanPath = 'blogs';
        }

        $url = function_exists('base_url') ? base_url($cleanPath) : '/' . $cleanPath;

        // Only append trailing slash if it is not a file extension like .xml, .pdf, .jpg
        if (empty($cleanPath) || !preg_match('/\.[a-zA-Z0-9]{2,5}$/', $cleanPath)) {
            $url = rtrim($url, '/') . '/';
        }

        return $url;
    }

    /**
     * Pretty print / structure XML with proper indentation and normalize loc trailing slashes.
     */
    public static function formatXml(string $xmlContent): string
    {
        if (empty(trim($xmlContent))) {
            return "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n</urlset>\n";
        }

        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;

        libxml_use_internal_errors(true);
        if (!@$dom->loadXML(trim($xmlContent))) {
            libxml_clear_errors();
            return $xmlContent;
        }
        libxml_clear_errors();

        // Normalize trailing slashes on all <loc> nodes (except sitemap index sub-sitemaps like .xml)
        $xpath = new DOMXPath($dom);
        $xpath->registerNamespace('s', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        $locNodes = $xpath->query('//s:loc | //loc');
        if ($locNodes) {
            foreach ($locNodes as $loc) {
                $val = trim($loc->nodeValue);
                if (!empty($val)) {
                    $loc->nodeValue = self::formatUrl($val);
                }
            }
        }

        return $dom->saveXML();
    }

    /**
     * Get sitemap XML content for a specific type ('pages' or 'blogs').
     */
    public static function getSitemapContent(string $type = 'pages'): string
    {
        try {
            $sitemapModel = new Sitemap();
            $record = $sitemapModel->getByType($type);
            $content = $record['content'] ?? '';

            if (empty(trim($content))) {
                // If not found in type-specific record, check first record for backward compatibility
                if ($type === 'pages') {
                    $all = $sitemapModel->findAll();
                    if (!empty($all[0]['content']) && empty($all[0]['type'])) {
                        $content = $all[0]['content'];
                    }
                }
            }

            if (empty(trim($content))) {
                return "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n</urlset>\n";
            }

            return self::formatXml($content);
        } catch (\Throwable $e) {
            error_log('SitemapService::getSitemapContent error: ' . $e->getMessage());
            return "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n</urlset>\n";
        }
    }

    /**
     * Save sitemap XML content for a specific type ('pages' or 'blogs').
     */
    public static function saveSitemapContent(string $type, string $xmlContent): bool
    {
        try {
            $formattedXml = self::formatXml($xmlContent);
            $sitemapModel = new Sitemap();
            return $sitemapModel->saveByType($type, $formattedXml);
        } catch (\Throwable $e) {
            error_log('SitemapService::saveSitemapContent error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Generate Main Sitemap Index XML connecting page-sitemap.xml and post-sitemap.xml.
     */
    public static function generateIndexXml(): string
    {
        try {
            $sitemapModel = new Sitemap();
            $pagesRecord = $sitemapModel->getByType('pages');
            $blogsRecord = $sitemapModel->getByType('blogs');

            $today = date('Y-m-d');
            $pagesLastMod = !empty($pagesRecord['updated_at']) ? date('Y-m-d', strtotime($pagesRecord['updated_at'])) : $today;
            $blogsLastMod = !empty($blogsRecord['updated_at']) ? date('Y-m-d', strtotime($blogsRecord['updated_at'])) : $today;

            $pagesUrl = function_exists('base_url') ? base_url('page-sitemap.xml') : '/page-sitemap.xml';
            $postsUrl = function_exists('base_url') ? base_url('post-sitemap.xml') : '/post-sitemap.xml';

            $dom = new DOMDocument('1.0', 'UTF-8');
            $dom->preserveWhiteSpace = false;
            $dom->formatOutput = true;

            $root = $dom->createElementNS('http://www.sitemaps.org/schemas/sitemap/0.9', 'sitemapindex');
            $dom->appendChild($root);

            // 1. Page Sitemap Entry
            $sitemapPage = $dom->createElement('sitemap');
            $locPage = $dom->createElement('loc', htmlspecialchars($pagesUrl, ENT_XML1, 'UTF-8'));
            $lastmodPage = $dom->createElement('lastmod', $pagesLastMod);
            $sitemapPage->appendChild($locPage);
            $sitemapPage->appendChild($lastmodPage);
            $root->appendChild($sitemapPage);

            // 2. Post Sitemap Entry (blogs)
            $sitemapPost = $dom->createElement('sitemap');
            $locPost = $dom->createElement('loc', htmlspecialchars($postsUrl, ENT_XML1, 'UTF-8'));
            $lastmodPost = $dom->createElement('lastmod', $blogsLastMod);
            $sitemapPost->appendChild($locPost);
            $sitemapPost->appendChild($lastmodPost);
            $root->appendChild($sitemapPost);

            return $dom->saveXML();
        } catch (\Throwable $e) {
            error_log('SitemapService::generateIndexXml error: ' . $e->getMessage());
            $pagesUrl = function_exists('base_url') ? base_url('page-sitemap.xml') : '/page-sitemap.xml';
            $postsUrl = function_exists('base_url') ? base_url('post-sitemap.xml') : '/post-sitemap.xml';
            $today = date('Y-m-d');
            return "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<sitemapindex xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n  <sitemap>\n    <loc>{$pagesUrl}</loc>\n    <lastmod>{$today}</lastmod>\n  </sitemap>\n  <sitemap>\n    <loc>{$postsUrl}</loc>\n    <lastmod>{$today}</lastmod>\n  </sitemap>\n</sitemapindex>\n";
        }
    }

    /**
     * Add or update page URLs in the sitemap XML.
     * Automatically separates blog slugs and page slugs if type is not specified.
     *
     * @param array $slugs Array of page/blog slugs or full URLs
     * @param string|null $type 'pages', 'blogs', or null for auto-detect
     * @return bool
     */
    public static function addPages(array $slugs, ?string $type = null): bool
    {
        if (empty($slugs)) {
            return true;
        }

        if ($type === null) {
            $blogSlugs = [];
            $pageSlugs = [];

            foreach ($slugs as $slug) {
                $trimmed = trim($slug);
                if (preg_match('#^(/?blogs?)(/|$)#i', $trimmed) || preg_match('#^https?://[^/]+/(blogs?)(/|$)#i', $trimmed)) {
                    $blogSlugs[] = $slug;
                } else {
                    $pageSlugs[] = $slug;
                }
            }

            $success = true;
            if (!empty($pageSlugs)) {
                $success = self::addPagesToType($pageSlugs, 'pages') && $success;
            }
            if (!empty($blogSlugs)) {
                $success = self::addPagesToType($blogSlugs, 'blogs') && $success;
            }
            return $success;
        }

        return self::addPagesToType($slugs, $type);
    }

    /**
     * Add or update page URLs into a specific sitemap type.
     */
    private static function addPagesToType(array $slugs, string $type): bool
    {
        if (empty($slugs)) {
            return true;
        }

        try {
            $xmlContent = self::getSitemapContent($type);

            $dom = new DOMDocument('1.0', 'UTF-8');
            $dom->preserveWhiteSpace = false;
            $dom->formatOutput = true;

            libxml_use_internal_errors(true);
            $loaded = @$dom->loadXML($xmlContent);
            libxml_clear_errors();

            if (!$loaded) {
                $dom->loadXML("<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n</urlset>");
            }

            $xpath = new DOMXPath($dom);
            $xpath->registerNamespace('s', 'http://www.sitemaps.org/schemas/sitemap/0.9');

            $root = $dom->getElementsByTagName('urlset')->item(0);
            if (!$root) {
                $root = $dom->createElementNS('http://www.sitemaps.org/schemas/sitemap/0.9', 'urlset');
                $dom->appendChild($root);
            }

            $today = date('Y-m-d');
            $priority = ($type === 'blogs') ? '0.8' : '0.8';
            $changefreq = ($type === 'blogs') ? 'weekly' : 'weekly';

            // Index and normalize existing nodes to avoid duplicates
            $existingMap = [];
            $nodes = $xpath->query('//s:url | //url');
            if ($nodes) {
                foreach ($nodes as $node) {
                    $locNodes = $xpath->query('s:loc | loc', $node);
                    if ($locNodes && $locNodes->length > 0) {
                        $rawLoc = trim($locNodes->item(0)->nodeValue ?? '');
                        if (!empty($rawLoc)) {
                            $normLoc = self::formatUrl($rawLoc);
                            $locNodes->item(0)->nodeValue = $normLoc;
                            if (isset($existingMap[$normLoc])) {
                                $node->parentNode->removeChild($node);
                            } else {
                                $existingMap[$normLoc] = $node;
                            }
                        }
                    }
                }
            }

            foreach ($slugs as $slug) {
                if (empty(trim($slug))) continue;

                $urlWithSlash = self::formatUrl($slug);

                if (isset($existingMap[$urlWithSlash])) {
                    $urlNode = $existingMap[$urlWithSlash];

                    // Update lastmod
                    $lastmodNodes = $xpath->query('s:lastmod | lastmod', $urlNode);
                    if ($lastmodNodes && $lastmodNodes->length > 0) {
                        $lastmodNodes->item(0)->nodeValue = $today;
                    } else {
                        $lastmodElem = $dom->createElement('lastmod', $today);
                        $urlNode->appendChild($lastmodElem);
                    }
                } else {
                    // Create new <url> entry
                    $urlNode = $dom->createElement('url');

                    $locElem = $dom->createElement('loc', htmlspecialchars($urlWithSlash, ENT_XML1, 'UTF-8'));
                    $urlNode->appendChild($locElem);

                    $lastmodElem = $dom->createElement('lastmod', $today);
                    $urlNode->appendChild($lastmodElem);

                    $changefreqElem = $dom->createElement('changefreq', $changefreq);
                    $urlNode->appendChild($changefreqElem);

                    $priorityElem = $dom->createElement('priority', $priority);
                    $urlNode->appendChild($priorityElem);

                    $root->appendChild($urlNode);
                    $existingMap[$urlWithSlash] = $urlNode;
                }
            }

            return self::saveSitemapContent($type, $dom->saveXML());
        } catch (\Throwable $e) {
            error_log("SitemapService::addPagesToType ({$type}) error: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Remove page URLs from the sitemap XML.
     *
     * @param array $slugs Array of page/blog slugs or full URLs
     * @param string|null $type 'pages', 'blogs', or null to remove from matching/both
     * @return bool
     */
    public static function removePages(array $slugs, ?string $type = null): bool
    {
        if (empty($slugs)) {
            return true;
        }

        $types = $type !== null ? [$type] : ['pages', 'blogs'];
        $success = true;

        foreach ($types as $t) {
            try {
                $xmlContent = self::getSitemapContent($t);
                $dom = new DOMDocument('1.0', 'UTF-8');
                $dom->preserveWhiteSpace = false;
                $dom->formatOutput = true;

                libxml_use_internal_errors(true);
                $loaded = @$dom->loadXML($xmlContent);
                libxml_clear_errors();

                if (!$loaded) {
                    continue;
                }

                $xpath = new DOMXPath($dom);
                $xpath->registerNamespace('s', 'http://www.sitemaps.org/schemas/sitemap/0.9');

                $modified = false;
                foreach ($slugs as $slug) {
                    if (empty(trim($slug))) continue;

                    $urlWithSlash = self::formatUrl($slug);
                    $urlWithoutSlash = rtrim($urlWithSlash, '/');

                    $urlQuery = "//s:url[s:loc=" . self::xpathEscape($urlWithSlash) . " or s:loc=" . self::xpathEscape($urlWithoutSlash) . "] | //url[loc=" . self::xpathEscape($urlWithSlash) . " or loc=" . self::xpathEscape($urlWithoutSlash) . "]";
                    $nodes = $xpath->query($urlQuery);

                    if ($nodes && $nodes->length > 0) {
                        foreach ($nodes as $node) {
                            $node->parentNode->removeChild($node);
                            $modified = true;
                        }
                    }
                }

                if ($modified) {
                    self::saveSitemapContent($t, $dom->saveXML());
                }
            } catch (\Throwable $e) {
                error_log("SitemapService::removePages ({$t}) error: " . $e->getMessage());
                $success = false;
            }
        }

        return $success;
    }

    /**
     * Update an existing page slug in the sitemap in-place without creating duplicates.
     *
     * @param string $oldSlug The previous slug
     * @param string $newSlug The new updated slug
     * @param string|null $type 'pages', 'blogs', or null for auto-detect
     * @return bool
     */
    public static function updatePageSlug(string $oldSlug, string $newSlug, ?string $type = null): bool
    {
        if (empty(trim($oldSlug)) || empty(trim($newSlug))) {
            return false;
        }

        if ($type === null) {
            $isOldBlog = preg_match('#^(/?blogs?)(/|$)#i', trim($oldSlug));
            $isNewBlog = preg_match('#^(/?blogs?)(/|$)#i', trim($newSlug));
            $type = ($isOldBlog || $isNewBlog) ? 'blogs' : 'pages';
        }

        if (trim($oldSlug) === trim($newSlug)) {
            return self::addPages([$newSlug], $type);
        }

        try {
            $xmlContent = self::getSitemapContent($type);
            $dom = new DOMDocument('1.0', 'UTF-8');
            $dom->preserveWhiteSpace = false;
            $dom->formatOutput = true;

            libxml_use_internal_errors(true);
            $loaded = @$dom->loadXML($xmlContent);
            libxml_clear_errors();

            if (!$loaded) {
                return self::addPages([$newSlug], $type);
            }

            $xpath = new DOMXPath($dom);
            $xpath->registerNamespace('s', 'http://www.sitemaps.org/schemas/sitemap/0.9');

            $oldUrlWithSlash = self::formatUrl($oldSlug);
            $oldUrlWithoutSlash = rtrim($oldUrlWithSlash, '/');
            $newUrlWithSlash = self::formatUrl($newSlug);
            $today = date('Y-m-d');

            // Find existing node with old slug
            $oldQuery = "//s:url[s:loc=" . self::xpathEscape($oldUrlWithSlash) . " or s:loc=" . self::xpathEscape($oldUrlWithoutSlash) . "] | //url[loc=" . self::xpathEscape($oldUrlWithSlash) . " or loc=" . self::xpathEscape($oldUrlWithoutSlash) . "]";
            $oldNodes = $xpath->query($oldQuery);

            if ($oldNodes && $oldNodes->length > 0) {
                $urlNode = $oldNodes->item(0);

                // Update <loc>
                $locNodes = $xpath->query('s:loc | loc', $urlNode);
                if ($locNodes && $locNodes->length > 0) {
                    $locNodes->item(0)->nodeValue = $newUrlWithSlash;
                } else {
                    $locElem = $dom->createElement('loc', htmlspecialchars($newUrlWithSlash, ENT_XML1, 'UTF-8'));
                    $urlNode->appendChild($locElem);
                }

                // Update <lastmod>
                $lastmodNodes = $xpath->query('s:lastmod | lastmod', $urlNode);
                if ($lastmodNodes && $lastmodNodes->length > 0) {
                    $lastmodNodes->item(0)->nodeValue = $today;
                } else {
                    $lastmodElem = $dom->createElement('lastmod', $today);
                    $urlNode->appendChild($lastmodElem);
                }

                // Remove any duplicate old nodes if they existed
                for ($i = 1; $i < $oldNodes->length; $i++) {
                    $extraNode = $oldNodes->item($i);
                    $extraNode->parentNode->removeChild($extraNode);
                }

                return self::saveSitemapContent($type, $dom->saveXML());
            } else {
                // If old node not found, add the new page URL
                return self::addPages([$newSlug], $type);
            }
        } catch (\Throwable $e) {
            error_log("SitemapService::updatePageSlug error: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Sync all dynamic & static pages into the pages sitemap XML.
     *
     * @return int Number of page URLs synced
     */
    public static function syncPagesSitemap(): int
    {
        try {
            $slugs = ['']; // Home page

            // 1. Gather all SEO URLs for pages
            try {
                $seoModel = new \App\Models\Seo();
                $seoUrls = $seoModel->query("SELECT page_url FROM seo");
                foreach ($seoUrls as $row) {
                    $u = trim($row['page_url'] ?? '');
                    if (!empty($u) && !preg_match('#^/?blogs?(/|$)#i', $u)) {
                        $slugs[] = $u;
                    }
                }
            } catch (\Throwable $e) {}

            // 2. Dynamic pages from DB
            try {
                $pageModel = new Page();
                $pages = $pageModel->findAll();
                foreach ($pages as $p) {
                    if (!empty($p['slug'])) {
                        $slugs[] = $p['slug'];
                    }
                }
            } catch (\Throwable $e) {}

            // 3. Existing URLs in the current pages sitemap
            try {
                $currentXml = self::getSitemapContent('pages');
                $dom = new DOMDocument();
                libxml_use_internal_errors(true);
                if ($dom->loadXML($currentXml)) {
                    $xpath = new DOMXPath($dom);
                    $xpath->registerNamespace('s', 'http://www.sitemaps.org/schemas/sitemap/0.9');
                    $nodes = $xpath->query('//s:loc | //loc');
                    foreach ($nodes as $node) {
                        $val = trim($node->nodeValue ?? '');
                        if (!empty($val) && !preg_match('#/(blogs?)(/|$)#i', $val)) {
                            $slugs[] = $val;
                        }
                    }
                }
                libxml_clear_errors();
            } catch (\Throwable $e) {}

            $slugs = array_values(array_unique($slugs));
            self::addPages($slugs, 'pages');
            return count($slugs);
        } catch (\Throwable $e) {
            error_log('SitemapService::syncPagesSitemap error: ' . $e->getMessage());
            return 0;
        }
    }

    /**
     * Sync all blog posts into the post sitemap XML using canonical /blogs/ URLs.
     *
     * @return int Number of blog URLs synced
     */
    public static function syncBlogsSitemap(): int
    {
        try {
            $slugs = ['blogs/']; // Canonical blog index page

            // 1. All blogs from database
            try {
                $blogModel = new Blog();
                $blogs = $blogModel->findAll();
                foreach ($blogs as $b) {
                    if (!empty($b['slug'])) {
                        $slugs[] = 'blogs/' . ltrim($b['slug'], '/');
                    }
                }
            } catch (\Throwable $e) {}

            // 2. All blog SEO records
            try {
                $seoModel = new \App\Models\Seo();
                $seoUrls = $seoModel->query("SELECT page_url FROM seo WHERE page_url LIKE '/blog%' OR page_url LIKE '/blogs%'");
                foreach ($seoUrls as $row) {
                    $u = trim($row['page_url'] ?? '');
                    $clean = trim($u, '/');
                    if (preg_match('#^blogs?/(.+)$#i', $clean, $m)) {
                        $slugs[] = 'blogs/' . $m[1];
                    }
                }
            } catch (\Throwable $e) {}

            // 3. Existing URLs in the current blogs sitemap (converted to canonical /blogs/)
            try {
                $currentXml = self::getSitemapContent('blogs');
                $dom = new DOMDocument();
                libxml_use_internal_errors(true);
                if ($dom->loadXML($currentXml)) {
                    $xpath = new DOMXPath($dom);
                    $xpath->registerNamespace('s', 'http://www.sitemaps.org/schemas/sitemap/0.9');
                    $nodes = $xpath->query('//s:loc | //loc');
                    foreach ($nodes as $node) {
                        $val = trim($node->nodeValue ?? '');
                        if (!empty($val)) {
                            $slugs[] = self::formatUrl($val);
                        }
                    }
                }
                libxml_clear_errors();
            } catch (\Throwable $e) {}

            $slugs = array_values(array_unique($slugs));
            self::addPages($slugs, 'blogs');
            return count($slugs);
        } catch (\Throwable $e) {
            error_log('SitemapService::syncBlogsSitemap error: ' . $e->getMessage());
            return 0;
        }
    }

    /**
     * Sync both pages and blogs sitemaps.
     *
     * @return int Total number of URLs synced
     */
    public static function syncAllPages(): int
    {
        $pagesCount = self::syncPagesSitemap();
        $blogsCount = self::syncBlogsSitemap();
        return $pagesCount + $blogsCount;
    }

    /**
     * Generate canonical link HTML tag for a given slug or URL.
     */
    public static function generateCanonicalTag(string $slugOrUrl): string
    {
        $url = self::formatUrl($slugOrUrl);
        return '<link rel="canonical" href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '" />';
    }

    /**
     * Ensure canonical link HTML tag exists and is up to date in custom head tags/scripts.
     */
    public static function syncCanonicalInTags(?string $existingTags, string $slugOrUrl): string
    {
        $canonicalTag = self::generateCanonicalTag($slugOrUrl);
        $tags = trim($existingTags ?? '');

        if (preg_match('/<link\s+[^>]*rel=["\']canonical["\'][^>]*>/is', $tags)) {
            // Replace existing canonical tag
            $tags = preg_replace('/<link\s+[^>]*rel=["\']canonical["\'][^>]*>/is', $canonicalTag, $tags);
        } else {
            // Prepend canonical tag
            $tags = $canonicalTag . ($tags !== '' ? "\n" . $tags : '');
        }

        return $tags;
    }

    /**
     * Helper to escape strings in XPath queries.
     */
    private static function xpathEscape(string $value): string
    {
        if (!str_contains($value, "'")) {
            return "'" . $value . "'";
        }
        if (!str_contains($value, '"')) {
            return '"' . $value . '"';
        }
        return "concat('" . str_replace("'", "', \"'\", '", $value) . "')";
    }
}

