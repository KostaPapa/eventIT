<?php
require_once('mysql.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <?php require_once('header.php'); ?>
  <style>
  body {padding-top: 60px}
  </style>
</head>
<body>
  <?php require_once('navbar.php');
  if(isset($_SESSION['name'])) {
  	echo '<table class="table"><tr><th>Club Name</th><th>Contact Email</th><th>Description</th>';
  	if ($stmt = $mysqli -> query("SELECT cname, contact_email, description FROM club")) {
  		if ($stmt->num_rows > 0)
    	while ($row = $stmt->fetch_assoc()){
    		echo "<tr><td>" . $row["cname"] . "</td><td>" . $row["contact_email"] . "</td><td>" . $row["description"] . "</td></tr>";
    	}
    }
    echo '</table>';
} else {
	echo "You need to sign in.";
}
?>
</body>
</html>

