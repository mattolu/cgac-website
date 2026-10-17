<?php

declare(strict_types=1);

namespace App\Services;

use App\Core\Database;
use App\Models\User;
use PDO;

final class AuthService
{
    public static function ensureCsrfToken(): void
    {
        if (empty($_SESSION['_csrf_token'] ?? '')) {
            $_SESSION['_csrf_token'] = bin2hex(random_bytes(32));
        }
    }

    public static function csrfToken(): string
    {
        self::ensureCsrfToken();
        return (string) ($_SESSION['_csrf_token'] ?? '');
    }

    public static function verifyCsrf(string $token): bool
    {
        return hash_equals((string) ($_SESSION['_csrf_token'] ?? ''), (string) $token);
    }

    public static function login(PDO $pdo, string $email, string $password): ?array
    {
        $user = User::findByEmail($pdo, $email);
        if (!$user || !password_verify($password, (string) $user['password_hash'])) {
            return null;
        }

        if ((int) $user['is_active'] !== 1) {
            return null;
        }

        session_regenerate_id(true);
        $_SESSION['user'] = [
            'id' => (int) $user['id'],
            'email' => (string) $user['email'],
            'display_name' => (string) ($user['display_name'] ?? ''),
        ];

        return $_SESSION['user'];
    }

    public static function currentUser(): ?array
    {
        return $_SESSION['user'] ?? null;
    }

    public static function requireAuth(): array
    {
        $user = self::currentUser();
        if (!$user) {
            header('Location: /admin/login.php');
            exit;
        }

        return $user;
    }

    public static function logout(): void
    {
        $_SESSION = [];
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }
        session_destroy();
    }
}
