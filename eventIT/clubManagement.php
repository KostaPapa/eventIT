<?PHP error_reporting(-1); ?>
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    	<?php require_once('header.php') ?>
    </head>
    <body style="background-color:#E5E4E2">
    	<?php require_once('nav.php') ?>
		<style>
			.up5px{margin-top: -10px;}
		</style>
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
		<div class="container" style="background-color:white; padding: 15px;">
			<?php 
				include "mysql.php";
				$rowQuery = "select cname, contact_email, description from organizes join club on cname = club_name where corg_email = ?";
				$stmt = $mysqli->prepare($rowQuery);		
				$stmt->bind_param('i', $_SESSION['email']);				
				$stmt->execute();
				$stmt->bind_result($cname, $contactEmail, $description);	
				$stmt->fetch();
				$stmt->close();
				
				echo"<b><h2 style='display: inline; margin-top: 20px;'>$cname</h2></b> <a class='btn btn-success up5px'>edit</a><br><br>";
				echo"<b>Contact Information: </b> $contactEmail <a class='btn btn-success'>edit</a><br>";
				echo"<b>Description: </b> $description <a class='btn btn-success'>edit</a>";
			?>
		</div>
		<footer>
            <?php require_once('footer.php'); ?>
		</footer>
    </body>


</html>
