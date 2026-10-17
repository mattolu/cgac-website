<?php

declare(strict_types=1);

namespace App\Services;

use App\Core\Database;
use PDO;

final class MigrationRunner
{
    public static function runAll(): void
    {
        $pdo = Database::getConnection();
        $directory = __DIR__ . '/../database/migrations';
        $files = glob($directory . '/*.sql');

        if ($files === false) {
            throw new \RuntimeException('No migration files found.');
        }

        sort($files, SORT_NATURAL);

        foreach ($files as $file) {
            $sql = file_get_contents($file);
            if ($sql === false || trim($sql) === '') {
                continue;
            }

            $pdo->exec($sql);
            echo 'Applied migration: ' . basename($file) . PHP_EOL;
        }
    }
}
