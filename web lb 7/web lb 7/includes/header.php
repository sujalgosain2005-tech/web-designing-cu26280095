<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($pageTitle ?? "BookNest") ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
 <div class="container"><a class="navbar-brand" href="index.php">BookNest</a>
  <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav"><span class="navbar-toggler-icon"></span></button>
  <div class="collapse navbar-collapse" id="nav"><div class="navbar-nav ms-auto">
   <a class="nav-link" href="index.php">Books</a>
   <a class="nav-link" href="cart.php">Cart (<?= array_sum($_SESSION['cart'] ?? []) ?>)</a>
   <?php if (!empty($_SESSION['user_id'])): ?>
    <a class="nav-link" href="orders.php">My Orders</a><a class="nav-link" href="wishlist.php">Wishlist</a>
    <a class="nav-link" href="logout.php">Logout</a>
   <?php else: ?><a class="nav-link" href="login.php">Login</a><a class="nav-link" href="register.php">Register</a><?php endif; ?>
   <a class="nav-link" href="admin/index.php">Admin</a>
  </div></div>
 </div>
</nav>
<main class="container py-4">
