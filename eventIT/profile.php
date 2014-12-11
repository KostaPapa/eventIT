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
  <?php require_once('navbar.php'); ?>
  <b><h1><?php echo $_SESSION["name"]; ?></h2></b><br>
  <b>School: </b><?php echo $_SESSION["school"]; ?><br>
  <b>Email: </b><?php echo $_SESSION["email"]; ?><br><br>
  <?php
  if(isset($_SESSION['name'])) {
  	echo "<h2>Clubs</h2>";
  	//echo $_SESSION['email'];
  	if ($stmt = $mysqli -> prepare("SELECT club_name FROM member_of WHERE student_email = ?")) {
	  	$stmt -> bind_param("s", $_SESSION['email']);
	  	$stmt -> execute();
	    $stmt-> store_result();
	    //$num_of_rows = $stmt->num_rows;
	    $stmt -> bind_result($cname);

	    for ($i = 0; $i < $stmt->num_rows; ++$i) {
		    if ($stmt -> fetch()) {
		    	echo $cname;
		    }
		}
		$stmt->close();
	} else {
		echo "mysqli error.";
	}
	echo "<h2>Events</h2>";
	echo '<table class="table"><tr><th>Club Name</th><th>Event Name</th><th>Event Date</th><th>Event Location</th>';
	if($stmt = $mysqli -> prepare("SELECT club_name, event_name, event_date, event_location FROM going_to WHERE student_email = ?")){
		$stmt -> bind_param("s", $_SESSION['email']);
	  	$stmt -> execute();
	    $stmt-> store_result();
	    //$num_of_rows = $stmt->num_rows;
	    $stmt -> bind_result($cname, $ename, $edate, $elocation);

	    for ($i = 0; $i < $stmt->num_rows; ++$i) {
		    if ($stmt -> fetch()) {
		    	echo "<tr><td>" . $cname . "</td><td>" . $ename . "</td><td>" . $edate . "</td><td>" . $elocation . "</td></tr>";
		    }
		}
		$stmt->close();
	} else {
		echo "mysqli error.";
	}
} else {
	echo "You need to sign in.";
}