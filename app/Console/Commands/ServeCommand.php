<?php

namespace App\Console\Commands;

class ServeCommand
{
    public function handle($port = null, $args = [])
    {
        // Load config to get default port
        $config = require __DIR__ . '/../../../config/config.php';
        $defaultPort = $config['port'] ?? 8000;

        // Use provided port or default
        $serverPort = $port ?? $defaultPort;

        echo "Starting development server on http://localhost:{$serverPort}\n";
        echo "Press Ctrl+C to stop the server\n\n";

        // Get the public directory path
        $publicDir = __DIR__ . '/../../../public';

        // Start PHP built-in server
        $command = sprintf(
            'php -S localhost:%d -t %s',
            $serverPort,
            escapeshellarg($publicDir)
        );

        // Execute the command
        passthru($command);
    }
}
