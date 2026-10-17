<?php

declare(strict_types=1);

require_once __DIR__ . '/../../app/bootstrap.php';

use App\Services\AuthService;

$user = AuthService::requireAuth();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CGAC Admin Dashboard</title>
  <link rel="stylesheet" href="/assets/site.css">
  <style>
    body { background: #f3f6fb; margin: 0; font-family: Inter, sans-serif; }
    .shell { max-width: 1100px; margin: 0 auto; padding: 2rem 1rem 4rem; }
    .topbar { display: flex; justify-content: space-between; align-items: center; background: #fff; padding: 1rem 1.25rem; border-radius: 14px; box-shadow: 0 8px 18px rgba(10,45,143,0.08); margin-bottom: 1.5rem; }
    .grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; }
    .card { background: #fff; border-radius: 16px; padding: 1.25rem; box-shadow: 0 8px 18px rgba(10,45,143,0.08); }
    .label { color: #6b7280; text-transform: uppercase; letter-spacing: 0.1em; font-size: 0.72rem; }
    .value { font-size: 2rem; font-weight: 800; color: #0a2d8f; }
    .muted { color: #52607a; }
  </style>
</head>
<body>
  <div class="shell">
    <div class="topbar">
      <div>
        <strong>CGAC Admin</strong><br>
        <span class="muted">Signed in as <?php echo htmlspecialchars($user['display_name'] ?: $user['email']); ?></span>
      </div>
      <a class="btn btn-ghost" href="/admin/logout.php">Logout</a>
    </div>

    <div class="grid">
      <div class="card">
        <div class="label">Programmes</div>
        <div class="value">0</div>
      </div>
      <div class="card">
        <div class="label">Watchwords</div>
        <div class="value">0</div>
      </div>
      <div class="card">
        <div class="label">Transactions</div>
        <div class="value">0</div>
      </div>
    </div>

    <div class="card" style="margin-top:1.5rem;">
      <h2>Administrative dashboard</h2>
      <p class="muted">This is the initial protected dashboard for the CGAC platform. Additional CRUD pages and role-based modules will be added in subsequent iterations.</p>
    </div>
  </div>
</body>
</html>
