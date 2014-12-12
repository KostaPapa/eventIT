<?php
require_once('mysql.php');
session_start();

//$mysqli = NULL;
if (isset($_POST['email']) && isset($_POST['password'])) {
  if ($stmt = $mysqli -> prepare("SELECT name, email, school FROM student WHERE email=? AND password=?")) {
    $stmt -> bind_param("ss", $_POST['email'], hash("md5", $_POST['password']));
    $stmt -> execute();
    $stmt -> bind_result($name, $email, $school);

    if ($stmt -> fetch()) {
      $_SESSION['name'] = $name;
      $_SESSION['email'] = $email;
      $_SESSION['school'] = $school;
      header('Location: index.php');
    }
	else{
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
  <?php require_once('nav.php'); ?>
  <div class="container" style="padding-top: 60px;">
    <form action="login.php" method="POST" class="form-signin">
      <h2 class="form-signin-heading">Please sign in</h2>
      <input name ="email" type="text" class="form-control" placeholder="name@nyu.edu" required autofocus>
      <input name ="password" type="password" class="form-control" placeholder="Password" required>
      <label class="checkbox">
        <input type="checkbox" value="remember-me"> Remember me
      </label>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
  </div>
</body>
</html>