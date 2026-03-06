<?php

namespace App\Models;

use App\Core\BaseModel;

class Setting extends BaseModel
{
    protected string $table = 'settings';

    public static function get(string $key, $default = null)
    {
        $instance = new self();
        $stmt = $instance->db->prepare("SELECT `value` FROM {$instance->table} WHERE `key` = ? LIMIT 1");
        $stmt->execute([$key]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $row ? $row['value'] : $default;
    }

    public static function set(string $key, $value): bool
    {
        $instance = new self();
        $stmt = $instance->db->prepare("INSERT INTO {$instance->table} (`key`, `value`) VALUES (?, ?) ON DUPLICATE KEY UPDATE `value` = ?");
        return $stmt->execute([$key, $value, $value]);
    }
}
