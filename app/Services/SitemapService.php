<?php

namespace App\Services;

use App\Models\Sitemap;
use DOMDocument;
use DOMXPath;

class SitemapService
{
    /**
     * Format URL to ensure valid protocol and trailing slash.
     */
    public static function formatUrl(string $slugOrUrl): string
    {
        $slugOrUrl = trim($slugOrUrl);
        if (empty($slugOrUrl)) {
            $base = function_exists('base_url') ? base_url('') : '/';
            return rtrim($base, '/') . '/';
        }

        if (str_starts_with($slugOrUrl, 'http://') || str_starts_with($slugOrUrl, 'https://')) {
            $url = $slugOrUrl;
        } else {
            $cleanSlug = trim($slugOrUrl, '/');
            $url = function_exists('base_url') ? base_url($cleanSlug) : '/' . $cleanSlug;
        }

        $path = parse_url($url, PHP_URL_PATH);
        // Only append trailing slash if it is not a file extension like .xml, .pdf, .jpg
        if (empty($path) || !preg_match('/\.[a-zA-Z0-9]{2,5}$/', $path)) {
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

        // Normalize trailing slashes on all <loc> nodes
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
     * Add or update page URLs in the sitemap XML with trailing slashes and formatted structure.
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

            foreach ($slugs as $slug) {
                if (empty(trim($slug))) continue;

                $urlWithSlash = self::formatUrl($slug);
                $urlWithoutSlash = rtrim($urlWithSlash, '/');

                // Check if URL node already exists (with or without trailing slash)
                $urlQuery = "//s:url[s:loc=" . self::xpathEscape($urlWithSlash) . " or s:loc=" . self::xpathEscape($urlWithoutSlash) . "] | //url[loc=" . self::xpathEscape($urlWithSlash) . " or loc=" . self::xpathEscape($urlWithoutSlash) . "]";
                $existingNodes = $xpath->query($urlQuery);

                if ($existingNodes && $existingNodes->length > 0) {
                    $urlNode = $existingNodes->item(0);
                    
                    // Ensure loc has trailing slash
                    $locNodes = $xpath->query('s:loc | loc', $urlNode);
                    if ($locNodes && $locNodes->length > 0) {
                        $locNodes->item(0)->nodeValue = $urlWithSlash;
                    }

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

                    $changefreqElem = $dom->createElement('changefreq', 'weekly');
                    $urlNode->appendChild($changefreqElem);

                    $priorityElem = $dom->createElement('priority', '0.8');
                    $urlNode->appendChild($priorityElem);

                    $root->appendChild($urlNode);
                }
            }

            // Normalize all other loc nodes and format XML cleanly
            $newXml = self::formatXml($dom->saveXML());

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
            $dom = new DOMDocument('1.0', 'UTF-8');
            $dom->preserveWhiteSpace = false;
            $dom->formatOutput = true;

            libxml_use_internal_errors(true);
            $loaded = @$dom->loadXML($xmlContent);
            libxml_clear_errors();

            if (!$loaded) {
                return false;
            }

            $xpath = new DOMXPath($dom);
            $xpath->registerNamespace('s', 'http://www.sitemaps.org/schemas/sitemap/0.9');

            foreach ($slugs as $slug) {
                if (empty(trim($slug))) continue;

                $urlWithSlash = self::formatUrl($slug);
                $urlWithoutSlash = rtrim($urlWithSlash, '/');

                $urlQuery = "//s:url[s:loc=" . self::xpathEscape($urlWithSlash) . " or s:loc=" . self::xpathEscape($urlWithoutSlash) . "] | //url[loc=" . self::xpathEscape($urlWithSlash) . " or loc=" . self::xpathEscape($urlWithoutSlash) . "]";
                $nodes = $xpath->query($urlQuery);

                if ($nodes) {
                    foreach ($nodes as $node) {
                        $node->parentNode->removeChild($node);
                    }
                }
            }

            $newXml = self::formatXml($dom->saveXML());

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
     * Sync all pages and blogs into the sitemap XML with trailing slashes and formatted indentation.
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
