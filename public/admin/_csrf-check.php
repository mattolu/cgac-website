<?php

declare(strict_types=1);

require_once __DIR__ . '/../app/bootstrap.php';

use App\Services\AuthService;

if (!isset($_POST['csrf']) || !AuthService::verifyCsrf((string) $_POST['csrf'])) {
    http_response_code(419);
    exit('Invalid CSRF token.');
}
