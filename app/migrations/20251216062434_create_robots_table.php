<?php
// Migration file: 20251216062434_create_robots_table.php
return new class {
    public function up($db)
    {
        $db->exec("CREATE TABLE IF NOT EXISTS robots (
            id INT AUTO_INCREMENT PRIMARY KEY,
            content LONGTEXT,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");
    }

    public function down($db)
    {
        $db->exec("DROP TABLE IF EXISTS robots");
    }
};
