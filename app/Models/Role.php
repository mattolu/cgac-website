<?php

declare(strict_types=1);

namespace App\Models;

use PDO;

final class Role
{
    public static function create(PDO $pdo, string $name, string $description = ''): bool
    {
        $statement = $pdo->prepare(
            'INSERT INTO roles (name, description) VALUES (:name, :description) ON DUPLICATE KEY UPDATE description = VALUES(description)'
        );

        return $statement->execute([
            ':name' => trim($name),
            ':description' => trim($description),
        ]);
    }
}
