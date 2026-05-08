<?php
// Migration file: 20260508065326_add_sub_category_id_to_blogs.php
return new class {
    public function up($db)
    {
        $db->exec("ALTER TABLE `blogs` 
                   ADD COLUMN `blog_sub_category_id` INT UNSIGNED NULL DEFAULT NULL AFTER `blog_category_id`,
                   ADD INDEX (`blog_sub_category_id`);");
    }

    public function down($db)
    {
        $db->exec("ALTER TABLE `blogs` 
                   DROP COLUMN `blog_sub_category_id`;");
    }
};