<?php require 'data.php';
if (!isset($_SESSION['user'])) { header('Location: login.php'); exit; }
$posts = load($POSTS);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $posts[] = ['who' => $_SESSION['user'], 'text' => $_POST['text'], 'time' => date('Y-m-d H:i:s')];
    save($POSTS, $posts);
    header('Location: whodidit.php'); exit;
}
?>
<h2>Who Did It?</h2>
<p>Logged in as <b><?= e($_SESSION['user']) ?></b> | <a href="logout.php">Logout</a></p>
<form method="post">
  <input name="text" size="60" placeholder="Write a message"> <button>Post</button>
</form>
<hr>
<?php foreach (array_reverse($posts) as $p): ?>
  <p><b><?= e($p['who']) ?></b> (<?= e($p['time']) ?>): <?= e($p['text']) ?></p>
<?php endforeach; ?>
