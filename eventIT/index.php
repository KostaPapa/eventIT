<?PHP error_reporting(-1); ?>
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once('header.php') ?>
</head>

<body>
	
	<?php require_once('nav.php') ?>

	<?php require_once('carousel.php') ?>

    
    <!-- Page Content -->
   <p><p></p></p>

    <!-- Events -->
    <?php require_once('events.php'); ?>
    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

    <!-- Footer -->
    <?php require_once('footer.php'); ?>

</body>

</html>
