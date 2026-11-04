<?php
session_start(); require_once "config.php"; require_once "includes/functions.php";require_login();$error='';
if(!$_SESSION['cart']){header("Location: cart.php");exit;}
if($_SERVER['REQUEST_METHOD']==='POST'){verify_csrf();$name=trim($_POST['shipping_name']??'');$address=trim($_POST['address']??'');$phone=trim($_POST['phone']??'');
 if(!$name||!$address||!$phone){$error="Please complete all shipping details.";}
 else {try{$pdo->beginTransaction();$ids=array_keys($_SESSION['cart']);$total=0;$locked=[];
 foreach($ids as $id){$s=$pdo->prepare("SELECT * FROM books WHERE id=? FOR UPDATE");$s->execute([(int)$id]);$b=$s->fetch();$qty=(int)$_SESSION['cart'][$id];if(!$b||$qty<1||$qty>$b['stock'])throw new Exception("Stock changed for a book. Please update your cart.");$total+=$b['price']*$qty;$locked[]=['book'=>$b,'qty'=>$qty];}
 $s=$pdo->prepare("INSERT INTO orders(user_id,total,shipping_name,shipping_address,shipping_phone) VALUES(?,?,?,?,?)");$s->execute([$_SESSION['user_id'],$total,$name,$address,$phone]);$orderId=(int)$pdo->lastInsertId();
 foreach($locked as $item){$b=$item['book'];$qty=$item['qty'];$pdo->prepare("INSERT INTO order_items(order_id,book_id,quantity,unit_price) VALUES(?,?,?,?)")->execute([$orderId,$b['id'],$qty,$b['price']]);$pdo->prepare("UPDATE books SET stock=stock-? WHERE id=?")->execute([$qty,$b['id']]);}
 $pdo->commit();$_SESSION['cart']=[];header("Location: invoice.php?id=".$orderId);exit;
 }catch(Throwable $e){if($pdo->inTransaction())$pdo->rollBack();$error=$e->getMessage();}}
}
$pageTitle="Checkout";require "includes/header.php"; ?>
<h2>Checkout</h2><?php if($error): ?><div class="alert alert-danger"><?= e($error) ?></div><?php endif; ?>
<form method="post" class="form-narrow"><input type="hidden" name="csrf" value="<?= csrf_token() ?>"><label>Name</label><input class="form-control mb-3" name="shipping_name" required><label>Shipping address</label><textarea class="form-control mb-3" name="address" required></textarea><label>Phone</label><input class="form-control mb-3" name="phone" required><button class="btn btn-success">Place order</button></form>
<?php require "includes/footer.php"; ?>
