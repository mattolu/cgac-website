<?php

declare(strict_types=1);

require_once __DIR__ . '/../app/Support/Env.php';
require_once __DIR__ . '/../app/Core/Database.php';
require_once __DIR__ . '/../app/Services/MigrationRunner.php';

use App\Core\Database;
use App\Services\MigrationRunner;

try {
    Database::getConnection();
    MigrationRunner::runAll();
    echo "Migrations completed successfully." . PHP_EOL;
} catch (Throwable $throwable) {
    fwrite(STDERR, 'Migration failed: ' . $throwable->getMessage() . PHP_EOL);
    exit(1);
}
