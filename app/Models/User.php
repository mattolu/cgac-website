<?php

declare(strict_types=1);

namespace App\Models;

use PDO;
use PDOException;

final class User
{
    public static function findByEmail(PDO $pdo, string $email): ?array
    {
        $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
        $statement->execute([':email' => strtolower(trim($email))]);
        $user = $statement->fetch();

        return $user ?: null;
    }

    public static function create(PDO $pdo, array $payload): bool
    {
        $statement = $pdo->prepare(
            'INSERT INTO users (uuid, email, password_hash, display_name, phone, is_active, created_at, updated_at)
             VALUES (:uuid, :email, :password_hash, :display_name, :phone, :is_active, NOW(), NOW())'
        );

        return $statement->execute([
            ':uuid' => $payload['uuid'] ?? self::uuid(),
            ':email' => strtolower(trim($payload['email'])),
            ':password_hash' => password_hash($payload['password'], PASSWORD_ARGON2ID),
            ':display_name' => $payload['display_name'] ?? '',
            ':phone' => $payload['phone'] ?? null,
            ':is_active' => 1,
        ]);
    }

    public static function uuid(): string
    {
        return strtolower(trim((string) preg_replace('/[^a-f0-9-]/i', '', (string) \
            sprintf('%s-%s-%s-%s-%s',
                bin2hex(random_bytes(4)),
                bin2hex(random_bytes(2)),
                bin2hex(random_bytes(2)),
                bin2hex(random_bytes(2)),
                bin2hex(random_bytes(6))
            )
        ))));
    }
}
