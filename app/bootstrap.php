<?php

declare(strict_types=1);

require_once __DIR__ . '/../app/Support/Env.php';
require_once __DIR__ . '/../app/Core/Database.php';
require_once __DIR__ . '/../app/Models/User.php';
require_once __DIR__ . '/../app/Services/AuthService.php';
require_once __DIR__ . '/../app/Middleware/AuthMiddleware.php';

use App\Core\Database;
use App\Services\AuthService;

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
