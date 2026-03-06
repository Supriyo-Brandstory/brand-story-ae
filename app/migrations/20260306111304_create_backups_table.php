<?php
// Migration file: 20260306111304_create_backups_table.php
return new class {
    public function up($db)
    {
        $db->exec("CREATE TABLE IF NOT EXISTS `backups` (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            filename VARCHAR(255),
            status ENUM('success', 'failed') DEFAULT 'success',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
    }

    public function down($db)
    {
        $db->exec("DROP TABLE IF EXISTS `backups`;");
    }
};
