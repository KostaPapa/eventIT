<?php
require_once('mysql.php');
session_start();

if($_GET["club"]){
  	if(isset($_SESSION['name'])){
  		if ($stmt = $mysqli -> prepare("SELECT cname, contact_email, description FROM club WHERE cname = ?")){
  			$stmt -> bind_param("s", $_GET['club']);
  			$stmt -> execute();
  			$stmt -> bind_result($cname, $email, $description);
  			if ($stmt -> fetch()) {
  				$_SESSION["cname"] = $cname;
  				$_SESSION["email"] = $email;
  				$_SESSION["description"] = $description;				
  			}
  			$stmt->close();
  			//$mysqli->close();
  		}
  	}
  } else {
  	echo "Please specify club!";
  }
?>

<!DOCTYPE html>
<html>
<head>
  <?php require_once('header.php'); ?>
</head>
<body style="background-color:#E5E4E2">
  <?php require_once('nav.php'); ?>
  <div class="container" style="background-color:white;" >
  <?php if($_GET["club"]){ ?>
  <b><h2><?php echo $_SESSION["cname"]; ?></h2></b><br>
  <b>Email: </b><?php echo $_SESSION["email"]; ?><br>
  <b>Description: </b><?php echo $_SESSION["description"]; ?><br><br>
  <b><h3>Upcoming Events</h3><b>
  <?php 
  echo '<table class="table"><tr><th>Event</th><th>Date</th><th>Location</th><th>Description</th></tr>';
  if ($stmt = $mysqli -> prepare("SELECT cname, ename, edate, location, description FROM event WHERE cname=?")) {
  	$stmt -> bind_param("s", $_SESSION['cname']);
  	$stmt -> execute();
    $stmt-> store_result();
    //$num_of_rows = $stmt->num_rows;
    $stmt -> bind_result($cname, $ename, $edate, $location, $description);

    for ($i = 0; $i < $stmt->num_rows; ++$i) {
	    if ($stmt -> fetch()) {
			echo "<tr><td>" . $ename . "</td><td>" . $edate . "</td><td>" . $location . "</td><td>" . $description . "</td></tr>";
		}
	}
	$stmt->close();
} else {
	echo "Error with mysqli.";
}
}
echo '</table>';
  ?>
</body>
</html>