<?php

namespace App\Console\Commands;

use App\Core\Database;

class SeedAdminCommand
{
    public function handle($name = null, $args = [])
    {
        $db = Database::connect();
        $hashedPassword = password_hash('12345', PASSWORD_DEFAULT);

        $sql = "SELECT * FROM admins WHERE email = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute(['admin@mail.com']);
        $admin = $stmt->fetch();

        if (!$admin) {
            $sql = "INSERT INTO admins (name, email, password) VALUES (?, ?, ?)";
            $stmt = $db->prepare($sql);
            $stmt->execute(['Admin', 'admin@mail.com', $hashedPassword]);

            echo "Admin user seeded successfully.\n";
        } else {
            echo "Admin user with email admin@mail.com already exists.\n";
        }
    }
}
