<?php require 'data.php';
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $users = load($USERS);
    $u = $_POST['username']; $p = $_POST['password'];
    if (isset($users[$u])) { $msg = 'Username already taken.'; }
    else { $users[$u] = password_hash($p, PASSWORD_DEFAULT); save($USERS, $users); $msg = 'Registered! <a href="login.php">Login</a>'; }
}
?>
<h2>Register</h2>
<p><?= $msg ?></p>
<form method="post">
  Username: <input name="username"><br>
  Password: <input type="password" name="password"><br>
  <button>Register</button>
</form>
<a href="login.php">Back to login</a>
