<?php

declare(strict_types=1);

require_once __DIR__ . '/../../app/bootstrap.php';

use App\Core\Database;
use App\Support\Env;

$root = __DIR__ . '/../..';
$dotenvPath = $root . '/.env';
App\Support\Env::loadFromFile($dotenvPath);

$connection = new PDO(
    'mysql:host=' . Env::get('DB_HOST', '127.0.0.1') . ';port=' . Env::get('DB_PORT', '3306') . ';dbname=' . Env::get('DB_DATABASE', 'cgac') . ';charset=utf8mb4',
    Env::get('DB_USERNAME', 'root'),
    Env::get('DB_PASSWORD', '')
);

$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO roles (name, description) VALUES (:name, :description) ON DUPLICATE KEY UPDATE description = VALUES(description)";
$roles = [
    ['Super Administrator', 'Full system configuration and access to all modules'],
    ['Content Administrator', 'Manage programmes, watchwords, conventions, sermons and articles'],
    ['Editor', 'Create and edit approved content'],
    ['Media Administrator', 'Manage media assets and galleries'],
    ['Finance Administrator', 'Manage financial records and giving reports'],
    ['Prayer Team', 'Review and respond to prayer requests'],
    ['Viewer', 'Read-only access to approved information'],
];

foreach ($roles as [$name, $description]) {
    $statement = $connection->prepare($sql);
    $statement->execute([':name' => $name, ':description' => $description]);
}

echo "Roles seeded.";
