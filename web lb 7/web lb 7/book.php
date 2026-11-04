<?php
session_start(); require_once "config.php"; require_once "includes/functions.php";
$id=(int)($_GET['id']??0); $s=$pdo->prepare("SELECT * FROM books WHERE id=?"); $s->execute([$id]); $book=$s->fetch();
if(!$book){http_response_code(404);exit("Book not found.");}
$pageTitle=$book['title']; $r=$pdo->prepare("SELECT r.*,u.name FROM reviews r JOIN users u ON u.id=r.user_id WHERE book_id=? ORDER BY r.created_at DESC");$r->execute([$id]);$reviews=$r->fetchAll();
require "includes/header.php";
?>
<div class="row"><div class="col-md-4"><div class="book-cover large"><?= e(substr($book['title'],0,1)) ?></div></div>
<div class="col-md-8"><h1><?= e($book['title']) ?></h1><p>By <?= e($book['author']) ?> · <?= e($book['category']) ?></p>
<p><?= nl2br(e($book['description'])) ?></p><h3>₹<?= e($book['price']) ?></h3><p>Available stock: <?= (int)$book['stock'] ?></p>
<form method="post" action="cart.php"><input type="hidden" name="csrf" value="<?= csrf_token() ?>"><input type="hidden" name="book_id" value="<?= (int)$id ?>"><button class="btn btn-primary" <?= $book['stock']<1?'disabled':'' ?>>Add to cart</button></form>
<?php if(!empty($_SESSION['user_id'])): ?><a class="btn btn-outline-secondary mt-2" href="wishlist.php?add=<?= (int)$id ?>">Add to wishlist</a><?php endif; ?>
</div></div>
<hr><h3>Reviews</h3>
<?php if(!empty($_SESSION['user_id'])): ?><form method="post" action="review.php" class="mb-3"><input type="hidden" name="csrf" value="<?= csrf_token() ?>"><input type="hidden" name="book_id" value="<?= (int)$id ?>">
<select class="form-select mb-2" name="rating" required><option value="">Rating</option><?php for($i=5;$i>=1;$i--): ?><option value="<?= $i ?>"><?= $i ?> stars</option><?php endfor; ?></select>
<textarea class="form-control mb-2" name="comment" placeholder="Write your review"></textarea><button class="btn btn-primary">Submit review</button></form><?php else: ?><p><a href="login.php">Login</a> to write a review.</p><?php endif; ?>
<?php foreach($reviews as $review): ?><div class="border rounded p-3 mb-2"><strong><?= e($review['name']) ?></strong> · <?= (int)$review['rating'] ?>/5<p><?= e($review['comment']) ?></p></div><?php endforeach; ?>
<?php require "includes/footer.php"; ?>
