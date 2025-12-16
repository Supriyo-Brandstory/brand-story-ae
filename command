#!/usr/bin/env php
<?php

// Autoload Composer dependencies
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require __DIR__ . '/vendor/autoload.php';
} else {
    echo "Error: Composer autoload file not found. Please run 'composer install'.\n";
    exit(1);
}

// Basic Autoloader for App namespace
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/app/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

// Load .env file
if (file_exists(__DIR__ . '/.env')) {
    $lines = file(__DIR__ . '/.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '' || strpos($line, '#') === 0) continue;

        if (strpos($line, '=') !== false) {
            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);

            // basic quote removal
            if (preg_match('/^"(.*)"$/', $value, $m)) $value = $m[1];
            elseif (preg_match("/^'(.*)'$/", $value, $m)) $value = $m[1];

            if (!getenv($name)) {
                putenv("{$name}={$value}");
                $_ENV[$name] = $value;
                $_SERVER[$name] = $value;
            }
        }
    }
}

// Load config and database if needed by commands (or specific commands can load them)
// require_once __DIR__ . '/config/config.php';
// require_once __DIR__ . '/app/Core/Database.php';


$args = $_SERVER['argv'];
$commandName = $args[1] ?? 'help';
$commandArgs = array_slice($args, 2);

// Map command names to class names
$commands = [
    'make:controller' => 'MakeController',
    'make:middleware' => 'MakeMiddleware',
    'make:migration' => 'MakeMigration',
    'make:model' => 'MakeModel',
    'make:request' => 'MakeRequest',
    'make:seeder' => 'MakeSeeder',
    'migrate:run' => 'MigrateCommand',
    'migrate:rollback' => 'MigrateCommand',
    'migrate:status' => 'MigrateCommand',
    'migrate:make' => 'MakeMigration', // Alias for make:migration, handled by MigrateCommand
    'migrate:table' => 'MakeMigration', // Alias for make:table, handled by MigrateCommand
    'admin:seed' => 'SeedAdminCommand',
    // Add other commands here
];

// Check if the command exists
if (!array_key_exists($commandName, $commands)) {
    echo "Unknown command: {$commandName}\n";
    echo "Available commands:\n";
    foreach (array_keys($commands) as $cmd) {
        echo "  - {$cmd}\n";
    }
    exit(1);
}

$commandClass = "App\\Console\\Commands\\" . $commands[$commandName];

if (!class_exists($commandClass)) {
    echo "Command class '{$commandClass}' not found.\n";
    exit(1);
}

$commandInstance = new $commandClass();

// Special handling for MigrateCommand to pass sub-command
if ($commands[$commandName] === 'MigrateCommand') {
    $commandInstance->handle($commandName, $commandArgs);
} elseif ($commands[$commandName] === 'MakeMigration') {
    // For MakeMigration, distinguish between 'make:migration' and 'make:table'
    $commandInstance->handle($commandName, $commandArgs);
} else {
    // Generic handling for other commands
    $commandInstance->handle($commandArgs[0] ?? null, array_slice($commandArgs, 1));
}
