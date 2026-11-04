<?php
session_start();require_once "config.php";require_once "includes/functions.php";require_login();
if(isset($_GET['add'])){$id=(int)$_GET['add'];$pdo->prepare("INSERT IGNORE INTO wishlist(user_id,book_id) VALUES(?,?)")->execute([$_SESSION['user_id'],$id]);header("Location: wishlist.php");exit;}
if(isset($_GET['remove'])){$pdo->prepare("DELETE FROM wishlist WHERE user_id=? AND book_id=?")->execute([$_SESSION['user_id'],(int)$_GET['remove']]);header("Location: wishlist.php");exit;}
$s=$pdo->prepare("SELECT b.* FROM wishlist w JOIN books b ON b.id=w.book_id WHERE w.user_id=?");$s->execute([$_SESSION['user_id']]);$books=$s->fetchAll();
$pageTitle="Wishlist";require "includes/header.php";?><h2>My Wishlist</h2><div class="row g-3"><?php foreach($books as $b): ?><div class="col-md-3"><div class="card p-3"><h5><?= e($b['title']) ?></h5><p>₹<?= e($b['price']) ?></p><a href="book.php?id=<?= (int)$b['id'] ?>">View</a><a href="wishlist.php?remove=<?= (int)$b['id'] ?>">Remove</a></div></div><?php endforeach; ?></div><?php require "includes/footer.php"; ?>
