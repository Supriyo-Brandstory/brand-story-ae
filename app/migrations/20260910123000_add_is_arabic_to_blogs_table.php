<?php
// Migration file: 20260910123000_add_is_arabic_to_blogs_table.php
return new class {
    public function up($db)
    {
        $cols = $db->query("DESCRIBE `blogs`")->fetchAll(PDO::FETCH_COLUMN);
        if (!in_array('is_arabic', $cols)) {
            $db->exec("ALTER TABLE `blogs` ADD COLUMN `is_arabic` TINYINT(1) NOT NULL DEFAULT 0 AFTER `blog_sub_category_id`;");
        }
    }

    public function down($db)
    {
        $cols = $db->query("DESCRIBE `blogs`")->fetchAll(PDO::FETCH_COLUMN);
        if (in_array('is_arabic', $cols)) {
            $db->exec("ALTER TABLE `blogs` DROP COLUMN `is_arabic`;");
        }
    }
};
