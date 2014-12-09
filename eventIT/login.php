<!DOCTYPE html>
<link href="signin.css" rel="stylesheet">
  <div class="container" style="padding-top: 60px;">
    <form action="login.php" method="POST" class="form-signin">
      <h2 class="form-signin-heading">Please sign in</h2>
      <input name ="pid" type="text" class="form-control" placeholder="PID" required autofocus>
      <input name ="password" type="password" class="form-control" placeholder="Password" required>
      <label class="checkbox">
        <input type="checkbox" value="remember-me"> Remember me
      </label>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
  </div>
</body>
</html>