<?php
session_start(); require_once "config.php"; require_once "includes/functions.php"; $error='';
if($_SERVER['REQUEST_METHOD']==='POST'){verify_csrf();$name=trim($_POST['name']??'');$email=filter_var($_POST['email']??'',FILTER_VALIDATE_EMAIL);$pass=$_POST['password']??'';
 if(!$name||!$email||strlen($pass)<8){$error="Enter a name, valid email and password (minimum 8 characters).";}
 else {try{$s=$pdo->prepare("INSERT INTO users(name,email,password) VALUES(?,?,?)");$s->execute([$name,$email,password_hash($pass,PASSWORD_DEFAULT)]);header("Location: login.php");exit;}catch(PDOException $e){$error="Email is already registered.";}}
}
$pageTitle="Register";require "includes/header.php"; ?>
<h2>Create account</h2><?php if($error): ?><div class="alert alert-danger"><?= e($error) ?></div><?php endif; ?>
<form method="post" class="form-narrow needs-validation" novalidate><input type="hidden" name="csrf" value="<?= csrf_token() ?>">
<label class="form-label">Name</label><input class="form-control mb-3" name="name" required>
<label class="form-label">Email</label><input class="form-control mb-3" type="email" name="email" required>
<label class="form-label">Password (minimum 8 characters)</label><input class="form-control mb-3" type="password" name="password" minlength="8" required>
<button class="btn btn-primary">Register</button></form><?php require "includes/footer.php"; ?>
