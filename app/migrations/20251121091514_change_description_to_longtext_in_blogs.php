<?php
// Migration file: 20251121091514_change_description_to_longtext_in_blogs.php
return new class {
    public function up($db)
    {
        $db->exec("ALTER TABLE `blogs` MODIFY COLUMN `description` LONGTEXT NOT NULL");
    }

    public function down($db)
    {
        $db->exec("ALTER TABLE `blogs` MODIFY COLUMN `description` TEXT NOT NULL");
    }
};