<?php
// Migration file: 20260318072810_create_pages_table.php
return new class {
    public function up($db)
    {
        $db->exec("CREATE TABLE IF NOT EXISTS `pages` (
            `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            `title` VARCHAR(255) NOT NULL,
            `slug` VARCHAR(255) NOT NULL UNIQUE,
            `template` VARCHAR(255) NOT NULL,
            `content` LONGTEXT DEFAULT NULL,
            `custom_class` VARCHAR(255) DEFAULT NULL,
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");
    }

    public function down($db)
    {
        $db->exec("DROP TABLE IF EXISTS `pages`;");
    }
};
