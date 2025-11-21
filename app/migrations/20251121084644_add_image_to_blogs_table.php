<?php
// Migration file: 20251121084644_add_image_to_blogs_table.php
return new class {
    public function up($db)
    {
        $db->exec("ALTER TABLE `blogs` ADD COLUMN `image` VARCHAR(255) NULL AFTER `description`");
    }

    public function down($db)
    {
        $db->exec("ALTER TABLE `blogs` DROP COLUMN `image`");
    }
};