<?php
// Migration file: 20251213105046_create_seo_table.php
return new class {
    public function up($db)
    {
        $db->exec("CREATE TABLE IF NOT EXISTS `seo` (
            `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            `page_url` VARCHAR(255) NOT NULL UNIQUE,
            `meta_title` VARCHAR(255) DEFAULT NULL,
            `meta_description` TEXT DEFAULT NULL,
            `other_script_or_tag` TEXT DEFAULT NULL,
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");
    }

    public function down($db)
    {
        $db->exec("DROP TABLE IF EXISTS `seo`;");
    }
};
