<?php require 'data.php';
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $users = load($USERS);
    $u = $_POST['username']; $p = $_POST['password'];
    if (isset($users[$u]) && password_verify($p, $users[$u])) { $_SESSION['user'] = $u; header('Location: whodidit.php'); exit; }
    $msg = 'Invalid login for ' . $u;          // reflected output, not escaped
}
?>
<h2>Login</h2>
<p><?= $msg ?></p>
<form method="post">
  Username: <input name="username"><br>
  Password: <input type="password" name="password"><br>
  <button>Login</button>
</form>
<a href="register.php">Register</a>
