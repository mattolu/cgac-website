<?php

declare(strict_types=1);

namespace App\Support;

final class Env
{
    public static function get(string $key, string $default = ''): string
    {
        $value = $_ENV[$key] ?? getenv($key) ?: $_SERVER[$key] ?? $default;
        return is_string($value) ? $value : (string) $value;
    }
}
