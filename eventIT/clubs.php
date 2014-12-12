<?php
require_once('mysql.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <?php require_once('header.php'); ?>

</head>
<body>
	<?php require_once('nav.php');?>
		<div class="container" style="background-color:white;" >
	<?php
		if(isset($_SESSION['name'])) {
			echo '<table class="table"><tr><th>Club Name</th><th>Contact Email</th><th>Description</th>';
			if ($stmt = $mysqli -> query("SELECT cname, contact_email, description FROM club")) {
				if ($stmt->num_rows > 0)
					while ($row = $stmt->fetch_assoc()){
						echo "<tr><td><form action='clubpage.php' method='get'><input id='club' type='submit' name = 'club'    value = '".$row["cname"]."'></form>";
						echo "<td>" . $row["contact_email"] . "</td><td>" . $row["description"] . "</td></tr>";
					}
			}
			echo '</table>';
		} else {
		echo "You need to sign in.";
	}
	?>
	</div>
</body>
</html>

