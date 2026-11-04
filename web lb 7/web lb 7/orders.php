<?php
session_start();require_once "config.php";require_once "includes/functions.php";require_login();
$s=$pdo->prepare("SELECT * FROM orders WHERE user_id=? ORDER BY created_at DESC");$s->execute([$_SESSION['user_id']]);$orders=$s->fetchAll();
$pageTitle="My Orders";require "includes/header.php";?><h2>My Order History</h2><table class="table"><tr><th>Order</th><th>Date</th><th>Total</th><th>Status</th><th>Invoice</th></tr>
<?php foreach($orders as $o): ?><tr><td>#<?= (int)$o['id'] ?></td><td><?= e($o['created_at']) ?></td><td>₹<?= e($o['total']) ?></td><td><?= e($o['status']) ?></td><td><a href="invoice.php?id=<?= (int)$o['id'] ?>">View</a></td></tr><?php endforeach; ?></table><?php require "includes/footer.php"; ?>
