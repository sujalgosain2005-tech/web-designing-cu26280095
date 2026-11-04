<?php
session_start();require_once "config.php";require_once "includes/functions.php";require_login();verify_csrf();
$id=(int)($_POST['book_id']??0);$rating=max(1,min(5,(int)($_POST['rating']??0)));$comment=trim($_POST['comment']??'');
$s=$pdo->prepare("INSERT INTO reviews(user_id,book_id,rating,comment) VALUES(?,?,?,?) ON DUPLICATE KEY UPDATE rating=VALUES(rating),comment=VALUES(comment)");
$s->execute([$_SESSION['user_id'],$id,$rating,$comment]);header("Location: book.php?id=".$id);exit;
