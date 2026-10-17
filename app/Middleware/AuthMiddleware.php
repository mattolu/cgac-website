<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Services\AuthService;

final class AuthMiddleware
{
    public static function requireAuthenticatedUser(): array
    {
        return AuthService::requireAuth();
    }
}
