<?php

namespace App\Console\Commands;

class MakeMigration
{
    public function handle($commandName = null, $args = [])
    {
        $name = $args[0] ?? null;

        if (!$name) {
            echo "Usage: php command make:migration <name> OR php command make:table <table_name>\n";
            return;
        }

        $isTableMigration = (explode(':', $commandName)[1] === 'table');

        if ($isTableMigration) {
            $table = strtolower(preg_replace('/[^a-z0-9_]+/i', '_', trim($name)));
            $fileName = date('YmdHis') . "_create_{$table}_table.php";
            $template = <<<'PHP'
<?php
// Migration file: {{FILENAME}}
return new class {
    public function up($db)
    {
        $db->exec("CREATE TABLE IF NOT EXISTS `{{TABLE}}` (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
    }

    public function down($db)
    {
        $db->exec("DROP TABLE IF EXISTS `{{TABLE}}`;");
    }
};
PHP;
            $template = str_replace('{{TABLE}}', $table, $template);
        } else {
            $slug = strtolower(preg_replace('/[^a-z0-9_]+/i', '_', trim($name)));
            $fileName = date('YmdHis') . "_{$slug}.php";
            $template = <<<'PHP'
<?php
// Migration file: {{FILENAME}}
return new class {
    public function up($db)
    {
        // Example:
        // $db->exec("CREATE TABLE example (id INT AUTO_INCREMENT PRIMARY KEY)");
    }

    public function down($db)
    {
        // Example:
        // $db->exec("DROP TABLE IF EXISTS example");
    }
};
PHP;
        }

        $template = str_replace('{{FILENAME}}', $fileName, $template);

        $migrationsPath = __DIR__ . '/../../migrations';
        if (!is_dir($migrationsPath)) {
            mkdir($migrationsPath, 0777, true);
        }
        $path = $migrationsPath . '/' . $fileName;

        file_put_contents($path, $template);
        echo "Created migration: app/migrations/{$fileName}\n";
    }
}
