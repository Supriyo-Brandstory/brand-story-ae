<?php

namespace App\Services;

use App\Models\Sitemap;

class SitemapService
{
    /**
     * Add or update page URLs in the sitemap XML.
     *
     * @param array $slugs Array of page slugs or full URLs
     * @return bool
     */
    public static function addPages(array $slugs): bool
    {
        if (empty($slugs)) {
            return true;
        }

        try {
            $sitemapModel = new Sitemap();
            $sitemaps = $sitemapModel->findAll();
            $sitemapRecord = $sitemaps[0] ?? null;
            $xmlContent = trim($sitemapRecord['content'] ?? '');

            if (empty($xmlContent)) {
                $xmlContent = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n</urlset>";
            }

            $dom = new \DOMDocument('1.0', 'UTF-8');
            $dom->preserveWhiteSpace = false;
            $dom->formatOutput = true;

            // Suppress warnings for custom XML tags if any
            libxml_use_internal_errors(true);
            $loaded = $dom->loadXML($xmlContent);
            libxml_clear_errors();

            if (!$loaded) {
                // If malformed, reset to standard template
                $dom->loadXML("<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n</urlset>");
            }

            $xpath = new \DOMXPath($dom);
            $xpath->registerNamespace('s', 'http://www.sitemaps.org/schemas/sitemap/0.9');

            $root = $dom->getElementsByTagName('urlset')->item(0);
            if (!$root) {
                $root = $dom->createElementNS('http://www.sitemaps.org/schemas/sitemap/0.9', 'urlset');
                $dom->appendChild($root);
            }

            $today = date('Y-m-d');

            foreach ($slugs as $slug) {
                if (empty(trim($slug))) continue;

                // Format URL
                if (str_starts_with($slug, 'http://') || str_starts_with($slug, 'https://')) {
                    $url = $slug;
                } else {
                    $cleanSlug = ltrim($slug, '/');
                    $url = function_exists('base_url') ? base_url($cleanSlug) : '/' . $cleanSlug;
                }

                // Check if URL node already exists (with or without namespace)
                $urlQuery = "//s:url[s:loc=" . self::xpathEscape($url) . "] | //url[loc=" . self::xpathEscape($url) . "]";
                $existingNodes = $xpath->query($urlQuery);

                if ($existingNodes && $existingNodes->length > 0) {
                    // Update lastmod
                    $urlNode = $existingNodes->item(0);
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
                    
                    $locElem = $dom->createElement('loc', htmlspecialchars($url, ENT_XML1, 'UTF-8'));
                    $urlNode->appendChild($locElem);

                    $lastmodElem = $dom->createElement('lastmod', $today);
                    $urlNode->appendChild($lastmodElem);

                    $changefreqElem = $dom->createElement('changefreq', 'weekly');
                    $urlNode->appendChild($changefreqElem);

                    $priorityElem = $dom->createElement('priority', '0.8');
                    $urlNode->appendChild($priorityElem);

                    $root->appendChild($urlNode);
                }
            }

            $newXml = $dom->saveXML();

            if ($sitemapRecord && !empty($sitemapRecord['id'])) {
                $sitemapModel->save([
                    'id' => $sitemapRecord['id'],
                    'content' => $newXml
                ]);
            } else {
                $sitemapModel->save([
                    'content' => $newXml
                ]);
            }

            return true;
        } catch (\Throwable $e) {
            error_log('SitemapService::addPages error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Remove page URLs from the sitemap XML.
     *
     * @param array $slugs Array of page slugs or full URLs
     * @return bool
     */
    public static function removePages(array $slugs): bool
    {
        if (empty($slugs)) {
            return true;
        }

        try {
            $sitemapModel = new Sitemap();
            $sitemaps = $sitemapModel->findAll();
            $sitemapRecord = $sitemaps[0] ?? null;
            if (!$sitemapRecord || empty($sitemapRecord['content'])) {
                return true;
            }

            $xmlContent = trim($sitemapRecord['content']);
            $dom = new \DOMDocument('1.0', 'UTF-8');
            $dom->preserveWhiteSpace = false;
            $dom->formatOutput = true;

            libxml_use_internal_errors(true);
            $loaded = $dom->loadXML($xmlContent);
            libxml_clear_errors();

            if (!$loaded) {
                return false;
            }

            $xpath = new \DOMXPath($dom);
            $xpath->registerNamespace('s', 'http://www.sitemaps.org/schemas/sitemap/0.9');

            foreach ($slugs as $slug) {
                if (empty(trim($slug))) continue;

                if (str_starts_with($slug, 'http://') || str_starts_with($slug, 'https://')) {
                    $url = $slug;
                } else {
                    $cleanSlug = ltrim($slug, '/');
                    $url = function_exists('base_url') ? base_url($cleanSlug) : '/' . $cleanSlug;
                }

                $urlQuery = "//s:url[s:loc=" . self::xpathEscape($url) . "] | //url[loc=" . self::xpathEscape($url) . "]";
                $nodes = $xpath->query($urlQuery);

                if ($nodes) {
                    foreach ($nodes as $node) {
                        $node->parentNode->removeChild($node);
                    }
                }
            }

            $newXml = $dom->saveXML();

            $sitemapModel->save([
                'id' => $sitemapRecord['id'],
                'content' => $newXml
            ]);

            return true;
        } catch (\Throwable $e) {
            error_log('SitemapService::removePages error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Sync all pages and blogs into the sitemap XML.
     *
     * @return int Number of URLs synced
     */
    public static function syncAllPages(): int
    {
        try {
            $pageModel = new \App\Models\Page();
            $pages = $pageModel->findAll();
            $slugs = [];

            foreach ($pages as $p) {
                if (!empty($p['slug'])) {
                    $slugs[] = $p['slug'];
                }
            }

            // Also include blogs if table exists
            try {
                $blogModel = new \App\Models\Blog();
                $blogs = $blogModel->findAll();
                foreach ($blogs as $b) {
                    if (!empty($b['slug'])) {
                        $slugs[] = 'blog/' . ltrim($b['slug'], '/');
                    }
                }
            } catch (\Throwable $e) {}

            self::addPages($slugs);
            return count($slugs);
        } catch (\Throwable $e) {
            error_log('SitemapService::syncAllPages error: ' . $e->getMessage());
            return 0;
        }
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
