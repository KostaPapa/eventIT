<?php
require_once('mysql.php');
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
  if ($stmt = $mysqli -> prepare("SELECT username, fname, lname FROM person WHERE pid=? AND passwd=?")) {
    $stmt -> bind_param("ss", $_POST['username'], hash("md5", $_POST['password']));
    $stmt -> execute();
    $stmt -> bind_result($username, $fname, $lname);

    if ($stmt -> fetch()) {
      $_SESSION['username'] = $username;
      $_SESSION['fname'] = $fname;
      $_SESSION['lname'] = $lname;
      header('Location: index.php');
    }
  }
}

?>
<!DOCTYPE html>
<html>
<head>
  <?php require_once('header.php'); ?>
</head>
<body>
  <link href="signin.css" rel="stylesheet">
  <?php require_once('navbar.php'); ?>
  <div class="container" style="padding-top: 60px;">
    <form action="login.php" method="POST" class="form-signin">
      <h2 class="form-signin-heading">Please sign in</h2>
      <input name ="pid" type="text" class="form-control" placeholder="username" required autofocus>
      <input name ="password" type="password" class="form-control" placeholder="password" required>
      <label class="checkbox">
        <input type="checkbox" value="remember-me"> Remember me
      </label>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
  </div>
</body>
</html>