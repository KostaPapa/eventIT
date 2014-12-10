<?php
$mysqli = new mysqli("localhost", "root", "root", "eventit");

if (mysqli_connect_errno()) {
  echo "Connection Failed: " . mysqli_connect_errno();
  exit();
}
?>
