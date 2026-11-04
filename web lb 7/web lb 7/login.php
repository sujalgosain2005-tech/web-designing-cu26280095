<?php
session_start(); require_once "config.php"; require_once "includes/functions.php";$error='';
if($_SERVER['REQUEST_METHOD']==='POST'){verify_csrf();$s=$pdo->prepare("SELECT * FROM users WHERE email=?");$s->execute([trim($_POST['email']??'')]);$u=$s->fetch();
 if($u&&password_verify($_POST['password']??'',$u['password'])){session_regenerate_id(true);$_SESSION['user_id']=$u['id'];$_SESSION['name']=$u['name'];$_SESSION['role']=$u['role'];header("Location: index.php");exit;} $error="Invalid email or password.";
}
$pageTitle="Login";require "includes/header.php"; ?>
<h2>Login</h2><?php if($error): ?><div class="alert alert-danger"><?= e($error) ?></div><?php endif; ?>
<form method="post" class="form-narrow"><input type="hidden" name="csrf" value="<?= csrf_token() ?>"><label>Email</label><input class="form-control mb-3" type="email" name="email" required><label>Password</label><input class="form-control mb-3" type="password" name="password" required><button class="btn btn-primary">Login</button></form>
<?php require "includes/footer.php"; ?>
