<?php

	session_start();
	include "mysql.php";
	$datetime = new DateTime();
	$date = $datetime->format('Y-m-d H:i:s');

	$query = "select cname, ename, edate, location, description
							from event
								where edate > ?
									order by edate asc
										LIMIT 5 OFFSET ?";
		
	$i = $_SESSION['upcomingEventsIterator'];
	$stmt = $mysqli->prepare($query);
	$stmt->bind_param('si', $date, $i);
	$stmt->execute();	
	$stmt->bind_result($cname, $ename, $edate, $location, $description);
	
	
	unset($_SESSION['upcomingEventsIterator']);
	$di = $i + 5;
	$t = $_SESSION['numOfUpcomingEvents'];
	while($stmt->fetch() && $i < $di && $i < $t){			
		$di++;
		if(strnatcmp($date, $edate) <= 0){
			echo"<div class=\"col-lg-12 col-lg-offset-0 event\">";
			echo"<div class=\"eventName\">$ename</div>";
			echo"<div class=\"clubName\">$cname</div>";
			echo"<div class=\"clear\"></div>";
			echo"<div class=\"eventDate\"><b>Time: </b>$edate</div>";
			echo"<div class=\"eventLocation\"><b>Location: </b>$location</div>";
			echo"<div class=\"eventDescription\"><b>Description: </b>$description</div>";
			
			//The Button we'll eventually need to add a link to the events through
			echo"<p><a class=\"btn btn-default floatRight\" href=\"#\" role=\"button\">View details &raquo;</a></p><div class=\"clear\"></div>";
			
			echo"</div><!-- /.col-md-6 -->";
		}
	}
	$_SESSION['upcomingEventsIterator'] = $di;
?>