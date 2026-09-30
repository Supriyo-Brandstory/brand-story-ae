<?php
// Migration file: 20260930102238_add_type_to_sitemaps_table.php
return new class {
    public function up($db)
    {
        // 1. Add type column if it does not exist
        $cols = $db->query("SHOW COLUMNS FROM sitemaps LIKE 'type'")->fetchAll();
        if (empty($cols)) {
            $db->exec("ALTER TABLE sitemaps ADD COLUMN `type` VARCHAR(50) NOT NULL DEFAULT 'pages' AFTER `id`");
            $db->exec("ALTER TABLE sitemaps ADD INDEX `idx_sitemaps_type` (`type`)");
        }

        // 2. Check if we need to split existing sitemap content into pages and blogs
        $stmt = $db->query("SELECT * FROM sitemaps ORDER BY id ASC");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($rows) === 1 && empty($rows[0]['type']) || (count($rows) === 1 && $rows[0]['type'] === 'pages')) {
            $existing = $rows[0];
            $content = trim($existing['content'] ?? '');

            if (!empty($content)) {
                $srcDom = new DOMDocument();
                libxml_use_internal_errors(true);
                if ($srcDom->loadXML($content)) {
                    $xpath = new DOMXPath($srcDom);
                    $xpath->registerNamespace('s', 'http://www.sitemaps.org/schemas/sitemap/0.9');

                    $pageDom = new DOMDocument('1.0', 'UTF-8');
                    $pageDom->preserveWhiteSpace = false;
                    $pageDom->formatOutput = true;
                    $pageRoot = $pageDom->createElementNS('http://www.sitemaps.org/schemas/sitemap/0.9', 'urlset');
                    $pageDom->appendChild($pageRoot);

                    $blogDom = new DOMDocument('1.0', 'UTF-8');
                    $blogDom->preserveWhiteSpace = false;
                    $blogDom->formatOutput = true;
                    $blogRoot = $blogDom->createElementNS('http://www.sitemaps.org/schemas/sitemap/0.9', 'urlset');
                    $blogDom->appendChild($blogRoot);

                    $nodes = $xpath->query('//s:url | //url');
                    foreach ($nodes as $node) {
                        $locNodes = $xpath->query('s:loc | loc', $node);
                        if ($locNodes && $locNodes->length > 0) {
                            $loc = trim($locNodes->item(0)->nodeValue);
                            if (preg_match('#/(blogs?)(/|$)#i', $loc)) {
                                $imported = $blogDom->importNode($node, true);
                                $blogRoot->appendChild($imported);
                            } else {
                                $imported = $pageDom->importNode($node, true);
                                $pageRoot->appendChild($imported);
                            }
                        }
                    }

                    $pageXml = $pageDom->saveXML();
                    $blogXml = $blogDom->saveXML();

                    // Update existing record to be pages
                    $updateStmt = $db->prepare("UPDATE sitemaps SET `type` = 'pages', `content` = ? WHERE `id` = ?");
                    $updateStmt->execute([$pageXml, $existing['id']]);

                    // Insert blogs record
                    $insertStmt = $db->prepare("INSERT INTO sitemaps (`type`, `content`, `updated_at`) VALUES ('blogs', ?, NOW())");
                    $insertStmt->execute([$blogXml]);
                }
                libxml_clear_errors();
            }
        } elseif (count($rows) === 0) {
            $defaultXml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n</urlset>";
            $insertStmt = $db->prepare("INSERT INTO sitemaps (`type`, `content`, `updated_at`) VALUES (?, ?, NOW())");
            $insertStmt->execute(['pages', $defaultXml]);
            $insertStmt->execute(['blogs', $defaultXml]);
        }
    }

    public function down($db)
    {
        $cols = $db->query("SHOW COLUMNS FROM sitemaps LIKE 'type'")->fetchAll();
        if (!empty($cols)) {
            $db->exec("ALTER TABLE sitemaps DROP INDEX `idx_sitemaps_type`");
            $db->exec("ALTER TABLE sitemaps DROP COLUMN `type`");
        }
    }
};