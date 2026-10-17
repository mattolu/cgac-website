<?php

declare(strict_types=1);

require_once __DIR__ . '/../../app/bootstrap.php';

use App\Core\Database;
use App\Services\AuthService;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method not allowed.');
}

if (!isset($_POST['csrf']) || !AuthService::verifyCsrf((string) $_POST['csrf'])) {
    http_response_code(419);
    exit('Invalid CSRF token.');
}

$email = trim((string) ($_POST['email'] ?? ''));
$password = (string) ($_POST['password'] ?? '');

$pdo = Database::getConnection();
$user = AuthService::login($pdo, $email, $password);

if (!$user) {
    $_SESSION['auth_error'] = 'Invalid email or password.';
    header('Location: /admin/login.php');
    exit;
}

unset($_SESSION['auth_error']);
header('Location: /admin/index.php');
exit;
