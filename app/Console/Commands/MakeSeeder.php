<?php

namespace App\Console\Commands;

class MakeSeeder
{
    public function handle($name = null, $args = [])
    {
        if (!$name) {
            echo "Seeder name required. Example: php command make:seeder UsersTableSeeder\n";
            return;
        }

        $seeder = ucfirst($name);
        $dir = __DIR__ . '/../../seeders'; // Assuming a 'seeders' directory at app/seeders
        if (!is_dir($dir)) mkdir($dir, 0777, true);

        $file = $dir . '/' . $seeder . '.php';

        if (file_exists($file)) {
            echo "Seeder {$seeder} already exists.\n";
            return;
        }

        $template = <<<PHP
<?php
namespace App\Seeders;

use App\Core\Database; // Assuming Database is needed for seeding

class {$seeder}
{
    public function run()
    {
        \$db = Database::connect();
        // Example:
        // \$db->exec("INSERT INTO users (name, email, password) VALUES ('John Doe', 'john@example.com', 'password')");
    }
}
PHP;
        file_put_contents($file, $template);
        echo "Seeder created: app/seeders/{$seeder}.php\n";
    }
}
