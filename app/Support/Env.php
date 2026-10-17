<?php

declare(strict_types=1);

namespace App\Support;

final class Env
{
    public static function loadFromFile(string $path): void
    {
        if (!is_file($path)) {
            return;
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($lines === false) {
            return;
        }

        foreach ($lines as $line) {
            $trimmed = trim($line);
            if ($trimmed === '' || str_starts_with($trimmed, '#')) {
                continue;
            }

            $parts = explode('=', $line, 2);
            if (count($parts) !== 2) {
                continue;
            }

            [$name, $value] = $parts;
            $key = trim($name);
            $val = trim($value);
            $_ENV[$key] = $val;
            putenv($key . '=' . $val);
        }
    }

    public static function get(string $key, string $default = ''): string
    {
        $value = $_ENV[$key] ?? getenv($key) ?: $_SERVER[$key] ?? $default;
        return is_string($value) ? $value : (string) $value;
    }
}
