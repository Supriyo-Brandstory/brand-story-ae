<?php
// app/Core/Migrator.php
namespace App\Core;

use App\Core\Database;
use PDO;

class Migration
{
    private PDO $db;
    private string $migrationsPath;

    public function __construct()
    {
        $this->db = Database::connect();
        $this->migrationsPath = __DIR__ . '/../commands/migrations';
        $this->migrationsPath = __DIR__ . '/../migrations';
        if (!is_dir($this->migrationsPath)) {
            mkdir($this->migrationsPath, 0777, true);
        }

        $this->ensureMigrationsTable();
    }

    private function ensureMigrationsTable()
    {
        $this->db->exec("
            CREATE TABLE IF NOT EXISTS migrations (
                id INT AUTO_INCREMENT PRIMARY KEY,
                migration VARCHAR(255) NOT NULL,
                batch INT NOT NULL,
                migrated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ");
    }

    public function getRan(): array
    {
        $stmt = $this->db->query("SELECT migration FROM migrations ORDER BY id");
        return $stmt->fetchAll(PDO::FETCH_COLUMN) ?: [];
    }

    public function getLastBatch(): int
    {
        $stmt = $this->db->query("SELECT MAX(batch) AS b FROM migrations");
        $row = $stmt->fetch();
        return (int)($row['b'] ?? 0);
    }

    public function runPending()
    {
        $ran = $this->getRan();
        $files = glob($this->migrationsPath . '/*.php');
        sort($files, SORT_STRING);

        $toRun = [];
        foreach ($files as $f) {
            $name = basename($f);
            if (!in_array($name, $ran)) $toRun[] = $f;
        }

        if (empty($toRun)) {
            echo "Nothing to migrate.\n";
            return;
        }

        $batch = $this->getLastBatch() + 1;
        foreach ($toRun as $file) {
            $name = basename($file);
            echo "[RUN] $name\n";
            $migration = require $file;
            if (!is_object($migration) || !method_exists($migration, 'up')) {
                echo "  > Migration $name did not return valid migration object with up() method. Skipping.\n";
                continue;
            }
            $migration->up($this->db);
            $stmt = $this->db->prepare("INSERT INTO migrations (migration, batch) VALUES (:m, :b)");
            $stmt->execute(['m' => $name, 'b' => $batch]);
            echo "  ✔ Done\n";
        }

        echo "Migrations finished (batch {$batch}).\n";
    }

    public function rollbackLastBatch()
    {
        $last = $this->getLastBatch();
        if ($last <= 0) {
            echo "No batches to rollback.\n";
            return;
        }

        // Get migrations in last batch in reverse order
        $stmt = $this->db->prepare("SELECT migration FROM migrations WHERE batch = :b ORDER BY id DESC");
        $stmt->execute(['b' => $last]);
        $rows = $stmt->fetchAll(PDO::FETCH_COLUMN);

        if (empty($rows)) {
            echo "Nothing to rollback for batch {$last}.\n";
            return;
        }

        foreach ($rows as $name) {
            $file = $this->migrationsPath . '/' . $name;
            if (!file_exists($file)) {
                echo "[SKIP] {$name} (file missing)\n";
                // remove record anyway
                $this->db->prepare("DELETE FROM migrations WHERE migration = :m")->execute(['m' => $name]);
                continue;
            }
            echo "[ROLLBACK] {$name}\n";
            $migration = require $file;
            if (is_object($migration) && method_exists($migration, 'down')) {
                $migration->down($this->db);
                echo "  ✔ Rolled back\n";
            } else {
                echo "  > No down() method found — skipped\n";
            }
            $this->db->prepare("DELETE FROM migrations WHERE migration = :m")->execute(['m' => $name]);
        }

        echo "Rollback of batch {$last} complete.\n";
    }

    public function status()
    {
        $ran = $this->getRan();
        $files = glob($this->migrationsPath . '/*.php');
        sort($files, SORT_STRING);

        echo str_pad("Migration", 60) . " | Status\n";
        echo str_repeat('-', 80) . "\n";

        foreach ($files as $file) {
            $name = basename($file);
            $status = in_array($name, $ran) ? 'Ran' : 'Pending';
            echo str_pad($name, 60) . " | {$status}\n";
        }
    }
}
