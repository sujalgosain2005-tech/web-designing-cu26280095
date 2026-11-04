<?php
session_start(); require_once "config.php"; require_once "includes/functions.php"; verify_csrf();
$_SESSION['cart']=$_SESSION['cart']??[];
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['book_id'])){
 $id=(int)$_POST['book_id'];$s=$pdo->prepare("SELECT stock FROM books WHERE id=?");$s->execute([$id]);$b=$s->fetch();
 if($b && $b['stock']>0){$_SESSION['cart'][$id]=min(($_SESSION['cart'][$id]??0)+1,(int)$b['stock']);}
}
if(isset($_GET['remove'])){unset($_SESSION['cart'][(int)$_GET['remove']]);}
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['update_cart'])){foreach($_POST['qty']??[] as $id=>$qty){$id=(int)$id;$qty=max(0,(int)$qty);$s=$pdo->prepare("SELECT stock FROM books WHERE id=?");$s->execute([$id]);$b=$s->fetch();if(!$b||$qty===0)unset($_SESSION['cart'][$id]);else $_SESSION['cart'][$id]=min($qty,(int)$b['stock']);}}
$items=[];$total=0;if($_SESSION['cart']){$ids=array_keys($_SESSION['cart']);$marks=implode(',',array_fill(0,count($ids),'?'));$s=$pdo->prepare("SELECT * FROM books WHERE id IN ($marks)");$s->execute($ids);$items=$s->fetchAll();}
$pageTitle="Shopping Cart";require "includes/header.php"; ?>
<h2>Shopping Cart</h2><form method="post"><input type="hidden" name="csrf" value="<?= csrf_token() ?>"><input type="hidden" name="update_cart" value="1">
<table class="table"><tr><th>Book</th><th>Price</th><th>Quantity</th><th>Subtotal</th><th></th></tr>
<?php foreach($items as $b): $qty=$_SESSION['cart'][$b['id']]??0;$sub=$qty*$b['price'];$total+=$sub; ?><tr><td><?= e($b['title']) ?></td><td>₹<?= e($b['price']) ?></td><td><input class="form-control" style="max-width:90px" type="number" min="0" max="<?= (int)$b['stock'] ?>" name="qty[<?= (int)$b['id'] ?>]" value="<?= $qty ?>"></td><td>₹<?= number_format($sub,2) ?></td><td><a href="cart.php?remove=<?= (int)$b['id'] ?>">Remove</a></td></tr><?php endforeach; ?>
</table><p class="h4">Total: ₹<?= number_format($total,2) ?></p><button class="btn btn-secondary">Update cart</button> <a class="btn btn-primary" href="checkout.php">Checkout</a></form>
<?php require "includes/footer.php"; ?>
