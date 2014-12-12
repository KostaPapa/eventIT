<div class="container">
	<div id="nav">
		<link rel="stylesheet" type="text/css" href="css/nav.css" />
		<style>			
 			#nav { background-color:#78147F;}
			div>ul>li>a{ margin-right:10px;color:white; }
			div>ul>li>a:hover{ color:#78147F; }
			h1>a{ margin-right:10px;color:white; }
			h1>a:hover{ color:white; text-decoration:none; }
			.manageClub{ background-color: green; border-radius: 25px;}
        </style>
		<div id="title"> <h1 style="font-size: 50px; float: left;"><a href="index.php">eventIT</a></h1>
            <style>	#title { color:white; text-align:left; padding:5px;} 
            </style>
		<div style="float:right; margin-top: 25px;">
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
			<?php 
			include "mysql.php";
			$rowQuery = "select count(*) from organizes where corg_email = ?";
			$stmt = $mysqli->prepare($rowQuery);		
			$stmt->bind_param('i', $_SESSION['email']);				
			$stmt->execute();
			$stmt->bind_result($numberofrows);	
			$stmt->fetch();
			$stmt->close();
			?>
            <ul class="nav navbar-nav navbar-right">
				<?php if($numberofrows > 0){?>
				<li><a href="clubManagement.php" class="btn btn-success">Manage Club</a></li>
				<?php }?>
				<li><a href="clubs.php">Browse Clubs</a></li>
				<li><a href="profile.php">Profile</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        <?php } ?>
		</div>
		<div style="clear:both;"></div>
		        </div>	
	</div>
</div>