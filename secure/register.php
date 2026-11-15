<?php require 'data.php';
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $users = load($USERS);
    $u = trim($_POST['username']); $p = $_POST['password'];
    if (!preg_match('/^[A-Za-z0-9_]{3,20}$/', $u)) { $msg = 'Username: 3-20 letters, numbers or underscore only.'; }
    elseif (!strong_password($p)) { $msg = 'Password must be at least 8 characters and include a number, an uppercase and a lowercase letter.'; }
    elseif (isset($users[$u])) { $msg = 'Username already taken.'; }
    else { $users[$u] = password_hash($p, PASSWORD_DEFAULT); save($USERS, $users); $msg = 'Registered! You can now log in.'; }
}
?>
<h2>Register</h2>
<p><?= e($msg) ?></p>
<form method="post">
  Username: <input name="username"><br>
  Password: <input type="password" name="password"><br>
  <small>Min 8 characters, with a number, an uppercase and a lowercase letter.</small><br>
  <button>Register</button>
</form>
<a href="login.php">Back to login</a>
