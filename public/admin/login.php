<?php

declare(strict_types=1);

require_once __DIR__ . '/../../app/bootstrap.php';

use App\Services\AuthService;

$csrf = AuthService::csrfToken();
$error = $_SESSION['auth_error'] ?? '';
unset($_SESSION['auth_error']);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CGAC Admin Login</title>
  <link rel="stylesheet" href="/assets/site.css">
  <style>
    body { background: linear-gradient(180deg, #f5f7fb, #eef3fa); display: grid; place-items: center; min-height: 100vh; }
    .login-card { max-width: 420px; width: min(90vw, 420px); background: #fff; border-radius: 18px; padding: 2rem; box-shadow: 0 16px 32px rgba(10,45,143,0.12); }
    label { display: block; margin-bottom: 0.5rem; font-weight: 700; }
    input { width: 100%; padding: 0.9rem 1rem; border-radius: 10px; border: 1px solid rgba(10,45,143,0.18); margin-bottom: 1rem; }
    .btn { display: inline-block; width: 100%; }
    .error { color: #b91c1c; margin-bottom: 1rem; font-weight: 600; }
  </style>
</head>
<body>
  <div class="login-card">
    <img src="/assets/logo.svg" alt="CGAC Logo" style="width: 80px; margin: 0 auto 1rem;">
    <h1 style="text-align:center; margin-bottom:1.25rem;">CGAC Admin</h1>

    <?php if ($error !== ''): ?>
      <div class="error"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <form method="post" action="/admin/login-submit.php">
      <input type="hidden" name="csrf" value="<?php echo htmlspecialchars($csrf); ?>">

      <label for="email">Email</label>
      <input id="email" type="email" name="email" required>

      <label for="password">Password</label>
      <input id="password" type="password" name="password" required>

      <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
  </div>
</body>
</html>
