<?php
	require_once('mysql.php');
	session_start();
	$_SESSION['id'] = "";
	$_SESSION['fname'] = "";
	$_SESSION['lname'] = "";
	session_destroy();
	header("Location: index.php");
?>
<!DOCTYPE html>

<html>
	<head>
		<title>Logout</title>
	</head>
	<body>

		

	</body>
</html>