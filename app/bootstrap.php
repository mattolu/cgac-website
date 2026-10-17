<?php

declare(strict_types=1);

require_once __DIR__ . '/Support/Env.php';
require_once __DIR__ . '/Core/Database.php';
require_once __DIR__ . '/Models/User.php';
require_once __DIR__ . '/Services/AuthService.php';
require_once __DIR__ . '/Middleware/AuthMiddleware.php';

use App\Core\Database;
use App\Services\AuthService;

App\Support\Env::loadFromFile(__DIR__ . '/../.env');

session_name('cgac_session');
if (session_status() === PHP_SESSION_NONE) {
    $secure = (App\Support\Env::get('APP_ENV') === 'production');
    session_set_cookie_params([
        'lifetime' => 3600,
        'path' => '/',
        'domain' => '',
        'secure' => $secure,
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    session_start();
}

AuthService::ensureCsrfToken();
