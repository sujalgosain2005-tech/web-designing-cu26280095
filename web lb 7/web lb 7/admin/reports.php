<?php
session_start();require_once "../config.php";require_once "../includes/functions.php";require_admin();
$summary=$pdo->query("SELECT COUNT(*) orders_count, COALESCE(SUM(total),0) revenue FROM orders")->fetch();
$byMonth=$pdo->query("SELECT DATE_FORMAT(created_at,'%Y-%m') month,COUNT(*) orders_count,SUM(total) revenue FROM orders GROUP BY DATE_FORMAT(created_at,'%Y-%m') ORDER BY month DESC")->fetchAll();
$pageTitle="Sales Reports";require "../includes/header.php";?><h2>Sales Summary</h2><div class="row"><div class="col-md-6"><div class="card p-4"><h5>Total Orders</h5><p class="h2"><?= (int)$summary['orders_count'] ?></p></div></div><div class="col-md-6"><div class="card p-4"><h5>Total Revenue</h5><p class="h2">₹<?= number_format($summary['revenue'],2) ?></p></div></div></div>
<h3 class="mt-4">Monthly Report</h3><table class="table"><tr><th>Month</th><th>Orders</th><th>Revenue</th></tr><?php foreach($byMonth as $m): ?><tr><td><?= e($m['month']) ?></td><td><?= (int)$m['orders_count'] ?></td><td>₹<?= number_format($m['revenue'],2) ?></td></tr><?php endforeach; ?></table><?php require "../includes/footer.php"; ?>
