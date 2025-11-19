<?php
// app/Core/Database.php
namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $pdo = null;

    public static function connect(): PDO
    {
        if (self::$pdo !== null) {
            return self::$pdo;
        }

        $cfg = require __DIR__ . '/../../config/database.php';

        $host = $cfg['host'] ?? '127.0.0.1';
        $port = $cfg['port'] ?? '3306';
        $db   = $cfg['database'] ?? 'test';
        $user = $cfg['username'] ?? 'root';
        $pass = $cfg['password'] ?? '';
        $charset = $cfg['charset'] ?? 'utf8mb4';

        try {
            // 1) Connect without DB to create it if missing
            $dsnNoDb = "mysql:host={$host};port={$port}";
            $pdo = new PDO($dsnNoDb, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]);
            $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$db}` CHARACTER SET {$charset} COLLATE {$cfg['collation']}");
            // 2) Connect to actual DB
            $dsn = "mysql:host={$host};port={$port};dbname={$db};charset={$charset}";
            self::$pdo = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
            return self::$pdo;
        } catch (PDOException $e) {
            // In production, log instead of die
            die("DB Connection failed: " . $e->getMessage());
        }
    }
}
