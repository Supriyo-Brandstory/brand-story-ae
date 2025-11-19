<?php

namespace App\Core;

use App\Core\Database;

class AdminSeeder
{
    public static function seed()
    {
        $db = Database::connect();
        $hashedPassword = password_hash('12345', PASSWORD_DEFAULT);

        $sql = "SELECT * FROM admins WHERE email = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute(['admin@example.com']);
        $admin = $stmt->fetch();

        if (!$admin) {
            $sql = "INSERT INTO admins (name, email, password) VALUES (?, ?, ?)";
            $stmt = $db->prepare($sql);
            $stmt->execute(['Admin', 'admin@example.com', $hashedPassword]);

            echo "Admin user seeded successfully.\n";
        } else {
            echo "Admin user with email admin@example.com already exists.\n";
        }
    }
}
