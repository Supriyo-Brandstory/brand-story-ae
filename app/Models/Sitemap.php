<?php

namespace App\Models;

use App\Core\BaseModel;
use DOMDocument;
use DOMXPath;
use PDO;

class Sitemap extends BaseModel
{
    protected string $table = 'sitemaps';
    protected $fillable = ['type', 'content', 'created_at', 'updated_at'];
    private static bool $schemaChecked = false;

    /**
     * Ensure database schema and default rows exist (Self-healing / auto-migration on live).
     */
    public function ensureSchema(): void
    {
        if (self::$schemaChecked) {
            return;
        }
        self::$schemaChecked = true;

        try {
            // 1. Check if type column exists
            $cols = $this->query("SHOW COLUMNS FROM {$this->table} LIKE 'type'");
            if (empty($cols)) {
                $this->db->exec("ALTER TABLE `{$this->table}` ADD COLUMN `type` VARCHAR(50) NOT NULL DEFAULT 'pages' AFTER `id`");
                try {
                    $this->db->exec("ALTER TABLE `{$this->table}` ADD INDEX `idx_sitemaps_type` (`type`)");
                } catch (\Throwable $e) {}
            }

            // 2. Check existing rows
            $rows = $this->query("SELECT * FROM {$this->table} ORDER BY id ASC");
            if (count($rows) === 1) {
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

                        $this->query("UPDATE `{$this->table}` SET `type` = 'pages', `content` = ? WHERE `id` = ?", [$pageXml, $existing['id']]);
                        $this->query("INSERT INTO `{$this->table}` (`type`, `content`, `updated_at`) VALUES ('blogs', ?, NOW())", [$blogXml]);
                    }
                    libxml_clear_errors();
                }
            } elseif (count($rows) === 0) {
                $defaultXml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n</urlset>";
                $this->query("INSERT INTO `{$this->table}` (`type`, `content`, `updated_at`) VALUES ('pages', ?, NOW())", [$defaultXml]);
                $this->query("INSERT INTO `{$this->table}` (`type`, `content`, `updated_at`) VALUES ('blogs', ?, NOW())", [$defaultXml]);
            }
        } catch (\Throwable $e) {
            error_log('Sitemap::ensureSchema error: ' . $e->getMessage());
        }
    }

    /**
     * Get sitemap record by type.
     */
    public function getByType(string $type): ?array
    {
        $this->ensureSchema();
        $rows = $this->query("SELECT * FROM {$this->table} WHERE type = ? LIMIT 1", [$type]);
        return $rows[0] ?? null;
    }

    /**
     * Save or update sitemap content by type.
     */
    public function saveByType(string $type, string $content): bool
    {
        $this->ensureSchema();
        $existing = $this->getByType($type);
        if ($existing && !empty($existing['id'])) {
            return (bool)$this->save([
                'id' => $existing['id'],
                'type' => $type,
                'content' => $content
            ]);
        }

        return (bool)$this->save([
            'type' => $type,
            'content' => $content
        ]);
    }
}

