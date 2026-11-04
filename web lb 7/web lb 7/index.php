<?php
session_start(); require_once "config.php"; require_once "includes/functions.php";
$pageTitle = "BookNest - Online Bookstore";
$q = trim($_GET['q'] ?? ''); $category = trim($_GET['category'] ?? '');
$page = max(1, (int)($_GET['page'] ?? 1)); $limit = 8; $offset = ($page-1)*$limit;
$where = ["stock > 0"]; $params = [];
if ($q !== '') { $where[] = "(title LIKE :q OR author LIKE :q OR category LIKE :q)"; $params['q']="%$q%"; }
if ($category !== '') { $where[] = "category = :category"; $params['category']=$category; }
$sqlWhere = implode(" AND ", $where);
$count = $pdo->prepare("SELECT COUNT(*) FROM books WHERE $sqlWhere"); $count->execute($params); $totalPages=max(1,(int)ceil($count->fetchColumn()/$limit));
$stmt=$pdo->prepare("SELECT * FROM books WHERE $sqlWhere ORDER BY created_at DESC LIMIT :lim OFFSET :off");
foreach($params as $k=>$v) $stmt->bindValue(":$k",$v); $stmt->bindValue(':lim',$limit,PDO::PARAM_INT); $stmt->bindValue(':off',$offset,PDO::PARAM_INT); $stmt->execute(); $books=$stmt->fetchAll();
$categories=$pdo->query("SELECT DISTINCT category FROM books ORDER BY category")->fetchAll(PDO::FETCH_COLUMN);
require "includes/header.php";
?>
<section class="hero p-5 rounded mb-4"><h1>Find your next great read</h1><p>Discover stories, ideas and knowledge.</p><a class="btn btn-warning" href="#catalogue">Explore Books</a></section>
<div class="promo mb-4">Special offer: Explore our featured collection today!</div>
<h2 id="catalogue">Featured Books</h2>
<form class="row g-2 mb-4" method="get">
 <div class="col-md-7"><input class="form-control" name="q" placeholder="Search title, author or category" value="<?= e($q) ?>"></div>
 <div class="col-md-3"><select class="form-select" name="category"><option value="">All categories</option>
 <?php foreach($categories as $c): ?><option <?= $category===$c?'selected':'' ?> value="<?= e($c) ?>"><?= e($c) ?></option><?php endforeach; ?></select></div>
 <div class="col-md-2"><button class="btn btn-primary w-100">Search</button></div>
</form>
<div class="row g-3">
<?php foreach($books as $b): ?><div class="col-sm-6 col-lg-3"><div class="card book-card h-100">
 <div class="book-cover"><?= e(substr($b['title'],0,1)) ?></div><div class="card-body">
 <h5><?= e($b['title']) ?></h5><p class="text-muted mb-1"><?= e($b['author']) ?></p><p>₹<?= e($b['price']) ?></p>
 <a class="btn btn-outline-primary btn-sm" href="book.php?id=<?= (int)$b['id'] ?>">View details</a>
 </div></div></div><?php endforeach; ?>
<?php if (!$books): ?><p>No books found.</p><?php endif; ?>
</div>
<nav class="mt-4"><ul class="pagination"><?php for($i=1;$i<=$totalPages;$i++): ?><li class="page-item <?= $i===$page?'active':'' ?>"><a class="page-link" href="?<?= http_build_query(['q'=>$q,'category'=>$category,'page'=>$i]) ?>"><?= $i ?></a></li><?php endfor; ?></ul></nav>
<?php require "includes/footer.php"; ?>
