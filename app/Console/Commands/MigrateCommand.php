<?php

namespace App\Console\Commands;

use App\Console\Core\Migration;
use App\Core\Database; // Ensure Database is accessible

class MigrateCommand
{
    private Migration $migrator;

    public function __construct()
    {
        // Ensure the Database connection is established for the Migrator
        // As the Migrator class now expects it
        $this->migrator = new Migration();
    }

    public function handle($commandName = null, $args = [])
    {
        $subCommand = explode(':', $commandName)[1] ?? 'help'; // e.g., 'run', 'rollback', 'status'
        $name = $args[0] ?? null;

        switch ($subCommand) {
            case 'make': // For 'migrate:make <name>'
                $this->makeMigration($name, $args, false);
                break;
            case 'table': // For 'migrate:table <table_name>'
                $this->makeMigration($name, $args, true);
                break;
            case 'run':
                $this->migrator->runPending();
                break;
            case 'rollback':
                $this->migrator->rollbackLastBatch();
                break;
            case 'status':
                $this->migrator->status();
                break;
            default:
                echo "Migration CLI Commands\n";
                echo "---------------------------------------------\n";
                echo " php command migrate:make name             - Create a generic migration file.\n";
                echo " php command migrate:table table_name      - Create a table migration file.\n";
                echo " php command migrate:run                   - Run pending migrations.\n";
                echo " php command migrate:rollback              - Rollback the last batch of migrations.\n";
                echo " php command migrate:status                - Show the status of migrations.\n";
                break;
        }
    }

    private function makeMigration($name, $args, $isTableMigration = false)
    {
        if (!$name) {
            echo "Usage: php command migrate:make <name> OR php command migrate:table <table_name>\n";
            return;
        }

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

        // Path to store migration files
        $migrationsPath = __DIR__ . '/../../migrations';
        if (!is_dir($migrationsPath)) {
            mkdir($migrationsPath, 0777, true);
        }
        $path = $migrationsPath . '/' . $fileName;

        file_put_contents($path, $template);
        echo "Created migration: {$fileName}\n";
    }
}
