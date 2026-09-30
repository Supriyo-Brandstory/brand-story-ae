<?php

namespace App\Models;

use App\Core\BaseModel;

class Sitemap extends BaseModel
{
    protected string $table = 'sitemaps';
    protected $fillable = ['type', 'content', 'created_at', 'updated_at'];

    /**
     * Get sitemap record by type.
     */
    public function getByType(string $type): ?array
    {
        $rows = $this->query("SELECT * FROM {$this->table} WHERE type = ? LIMIT 1", [$type]);
        return $rows[0] ?? null;
    }

    /**
     * Save or update sitemap content by type.
     */
    public function saveByType(string $type, string $content): bool
    {
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

