<?php

declare(strict_types=1);

require_once __DIR__ . '/../../app/bootstrap.php';

use App\Core\Database;
use App\Models\User;

$pdo = Database::getConnection();

$users = [
    ['admin@cgac.local', 'Admin@123', 'CGAC Administrator'],
];

foreach ($users as [$email, $password, $name]) {
    $existing = User::findByEmail($pdo, $email);
    if ($existing) {
        continue;
    }

    User::create($pdo, [
        'email' => $email,
        'password' => $password,
        'display_name' => $name,
        'phone' => null,
    ]);
}

printf("Seeded demo admin user(s).\n");
