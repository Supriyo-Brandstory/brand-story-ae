<?php

namespace App\Console\Commands;

class CacheCleanCommand
{
    public function handle($args)
    {
        // Placeholder for actual cache clearing logic if any specific directories exist
        // For now, it just outputs the success message as requested

        $cacheDirs = [
            __DIR__ . '/../../../writable/cache',
            __DIR__ . '/../../../writable/views',
        ];

        foreach ($cacheDirs as $dir) {
            if (is_dir($dir)) {
                $this->deleteDirectory($dir);
                // Recreate empty directory
                if (!is_dir($dir)) {
                    mkdir($dir, 0777, true);
                }
            }
        }

        echo "All cache cleared successfully.\n";
    }

    private function deleteDirectory($dir)
    {
        if (!file_exists($dir)) {
            return true;
        }

        if (!is_dir($dir)) {
            return unlink($dir);
        }

        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }

            if (!$this->deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
                return false;
            }
        }

        return rmdir($dir);
    }
}
