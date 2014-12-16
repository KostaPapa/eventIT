<div class="container" >
  <div class="row">
		<style>
 			.event { background-color:#FFDEFF; margin-bottom: 10px;}
			.eventName{ color: #78147F; font-size: 40px; float: left;}
			.clubName{color: white; font-size: 40px;background-color: #78147F; float:right; margin-right: -15px; padding-left: 5px; padding-right: 5px;}
			.clear{clear: both;}
			.UpcomingHeading{color: #78147F; font-size: 60px;font-weight: bold;}
			.floatRight{float:right;}
			ul{padding-left:0px;}
			a{color: white;}
			a:hover{color: white;text-decoration:none;}
		</style>	
		<?php
			include "mysql.php";
			$datetime = new DateTime();
			$date = $datetime->format('Y-m-d H:i:s');
			//Querying for the number of rows
			$rowQuery = "select count(*) 
							from event 
								where edate > ? 
									limit 5";
			$stmt = $mysqli->prepare($rowQuery);		
			$stmt->bind_param('i', $date);				
			$stmt->execute();
			$stmt->bind_result($numberofrows);	
			$stmt->fetch();
			$stmt->close();
			$_SESSION['numOfUpcomingEvents'] = $numberofrows;
			//querying events that in ascending order, but only events who's date is in the future
			$query = "select cname, ename, edate, location, description
								from event
									where edate > ?
										order by edate asc";
			
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param('s', $date);
			echo"<div class=\"UpcomingHeading\">Upcoming Events</div>";
			//print_r($date);
			$stmt->execute();
			
			$stmt->bind_result($cname, $ename, $edate, $location, $description);
			
			$i = 0;
			echo"<ul class=\"items\">";
			while($stmt->fetch() && ($i < 5 && $i < $numberofrows)){			
				$i++;
				if(strnatcmp($date, $edate) <= 0){
					echo"<div class=\"col-lg-12 col-lg-offset-0 event\">";
					echo"<div class=\"eventName\">$ename</div>";
					echo"<div class=\"clubName\"><a href = \"clubpage.php?club=Performing+Art+$cname\">$cname</a></div>";
					echo"<div class=\"clear\"></div>";
					echo"<div class=\"eventDate\"><b>Time: </b>$edate</div>";
					echo"<div class=\"eventLocation\"><b>Location: </b>$location</div>";
					echo"<div class=\"eventDescription\"><b>Description: </b>$description</div>";
					
					//The Button we'll eventually need to add a link to the events through
					echo"<p><a class=\"btn btn-default floatRight\" href=\"#\" role=\"button\">View details &raquo;</a></p><div class=\"clear\"></div>";
					
					echo"</div><!-- /.col-md-6 -->";
				}
			}
			$_SESSION['upcomingEventsIterator'] = $i;
		?>
		<script type="text/javascript" src="js/jquery1.6.2.js"></script>


		<script type="text/javascript">

		$(document).ready(function(){

			function lastAddedLiveFunc()
			{
				$('div#lastPostsLoader').html('<img src="bigLoader.gif">');

				$.get("loadmore.php", function(data){
					if (data != "") {
						//console.log('add data..');
						$(".items").append(data);
					}
					$('div#lastPostsLoader').empty();
				});
			};

		  //lastAddedLiveFunc();
		  $(window).scroll(function(){

			  var wintop = $(window).scrollTop(), docheight = $(document).height(), winheight = $(window).height();
			  var  scrolltrigger = 0.95;

			  if  ((wintop/(docheight-winheight)) > scrolltrigger) {
				 //console.log('scroll bottom');
				 lastAddedLiveFunc();
			  }
		  });
		});
		</script>
		<div id="lastPostsLoader"></div>

  </div><!-- /.row --> 
</div><!-- /.container --> 