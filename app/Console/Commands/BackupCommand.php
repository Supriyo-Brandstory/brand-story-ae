<?php

namespace App\Console\Commands;

use App\Core\BackupService;
use App\Core\Database;
use PDO;

class BackupCommand
{
    public function handle($args)
    {
        echo "Checking for database changes...\n";

        $db = Database::connect();

        // Check if last_db_change happened today
        $stmt = $db->prepare("SELECT `value` FROM settings WHERE `key` = 'last_db_change' LIMIT 1");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            echo "No database changes recorded yet. Skipping backup.\n";
            return;
        }

        $lastChange = strtotime($result['value']);
        $today = strtotime('today');

        if ($lastChange < $today) {
            echo "No database changes today (" . date('Y-m-d') . "). Skipping backup.\n";
            return;
        }

        echo "Changes detected! Starting backup...\n";

        $backupService = new BackupService();
        $response = $backupService->run();

        if ($response['status'] === 'success') {
            echo "Backup completed successfully: " . $response['filename'] . "\n";
        } else {
            echo "Backup failed: " . $response['message'] . "\n";
        }
    }
}
