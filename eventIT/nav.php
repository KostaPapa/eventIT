<div class="container">
	<div id="nav">
		<style>
 			#nav { background-color:purple; }
        </style>
		<div id="title"> <h1>event it</h1>
            <style>	#title { color:white; text-align:left; padding:5px; } 
            </style>
        </div>	
	</div>
    <?php if (!isset($_SESSION['name'])) { ?>
        <form action="login.php" method="POST" class="navbar-form navbar-right">
            <div class="form-group">
                <input name="email" type="text" placeholder="name@nyu.edu" class="form-control">
            </div>
            <div class="form-group">
                <input name="password" type="password" placeholder="Password" class="form-control">
            </div>
                <button type="submit" class="btn btn-success">Log In</button>
        </form>
        <?php } else { ?>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        <?php } ?>
</div>