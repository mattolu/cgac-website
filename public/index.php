<?php
// public/index.php - Minimal front controller placeholder

declare(strict_types=1);

// Basic router for placeholder pages. Replace with framework or custom router.
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

http_response_code(200);
header('Content-Type: text/html; charset=utf-8');

?><!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>CGAC — Ministry Archive (Coming Soon)</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/resources/css/design_system.css">
</head>
<body class="bg-light text-dark">
  <main class="container py-5">
    <h1>Christ Gospel Apostolic Church — CGAC</h1>
    <p class="lead">The CGAC digital ministry platform and Ministry Archive will be available here. This is an initial scaffold. See the <a href="/docs/ARCHITECTURE.md">docs</a> folder for architecture and the implementation plan.</p>
    <hr>
    <p>To continue development: set up environment variables, install Composer dependencies, and run database migrations.</p>
  </main>
</body>
</html>
