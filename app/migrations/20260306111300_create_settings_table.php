<?php
// Migration file: 20260306111300_create_settings_table.php
return new class {
    public function up($db)
    {
        $db->exec("CREATE TABLE IF NOT EXISTS `settings` (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            `key` VARCHAR(100) UNIQUE,
            `value` TEXT,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
    }

    public function down($db)
    {
        $db->exec("DROP TABLE IF EXISTS `settings`;");
    }
};
