<?php

declare(strict_types=1);

use App\Core\Database;
use App\Models\User;

require_once __DIR__ . '/../app/bootstrap.php';

if ($argc < 3) {
    fwrite(STDERR, "Usage: php create-admin.php <email> <password> [display-name]\n");
    exit(1);
}

$email = $argv[1];
$password = $argv[2];
$displayName = $argv[3] ?? 'CGAC Administrator';

$pdo = Database::getConnection();
$user = User::findByEmail($pdo, $email);

if ($user) {
    $statement = $pdo->prepare('UPDATE users SET password_hash = :password_hash, display_name = :display_name, is_active = 1 WHERE email = :email');
    $statement->execute([
        ':password_hash' => password_hash($password, PASSWORD_ARGON2ID),
        ':display_name' => $displayName,
        ':email' => strtolower($email),
    ]);
    echo 'Updated existing admin user: ' . $email . PHP_EOL;
    exit(0);
}

User::create($pdo, [
    'email' => $email,
    'password' => $password,
    'display_name' => $displayName,
    'phone' => null,
]);

echo 'Created admin user: ' . $email . PHP_EOL;
