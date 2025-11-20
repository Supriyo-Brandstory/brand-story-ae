<?php
// Migration file: 20251120104712_create_blogs_table.php
return new class {
    public function up($db)
    {
        $db->exec("CREATE TABLE IF NOT EXISTS `blogs` (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            blog_category_id INT UNSIGNED NOT NULL,
            title VARCHAR(255) NOT NULL,
            slug VARCHAR(255) NOT NULL UNIQUE,
            description TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            CONSTRAINT fk_blog_category
                FOREIGN KEY (blog_category_id) REFERENCES blog_categories(id)
                ON DELETE RESTRICT ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
    }

    public function down($db)
    {
        $db->exec("DROP TABLE IF EXISTS `blogs`;");
    }
};
