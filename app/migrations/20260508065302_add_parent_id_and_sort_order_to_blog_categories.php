<?php
// Migration file: 20260508065302_add_parent_id_and_sort_order_to_blog_categories.php
return new class {
    public function up($db)
    {
        $db->exec("ALTER TABLE `blog_categories` 
                   ADD COLUMN `parent_id` INT UNSIGNED NULL DEFAULT NULL AFTER `id`,
                   ADD COLUMN `sort_order` INT DEFAULT 0 AFTER `description`,
                   ADD INDEX (`parent_id`);");
    }

    public function down($db)
    {
        $db->exec("ALTER TABLE `blog_categories` 
                   DROP COLUMN `parent_id`,
                   DROP COLUMN `sort_order`;");
    }
};