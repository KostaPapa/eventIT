<!doctype html>
<?php
session_start();
?>
<html>
  <head>
  <?php require_once('header.php') ?>
    <title>event it</title>
    <meta charset="utf-8" />
	<style>

		body { 
			background: #eee; 
		}

		/*------------------------------*/

		#signup {
			width: 550px;
			height: 330px;
			margin: 100px auto 50px auto;
			padding: 20px;
			position: relative;
			background-color: purple;
			border: 1px solid #ccc;
			-moz-border-radius: 3px;
			-webkit-border-radius: 3px; 
			border-radius: 3px;  
		}

		#signup::before, 
		#signup::after {
			content: "";
			position: absolute;
			bottom: -3px;
			left: 2px;
			right: 2px;
			top: 0;
			z-index: -1;
			background: #fff;
			border: 1px solid #ccc;			
		}

		#signup::after {
			left: 4px;
			right: 4px;
			bottom: -5px;
			z-index: -2;
			-moz-box-shadow: 0 8px 8px -5px rgba(0,0,0,.3);
			-webkit-box-shadow: 0 8px 8px -5px rgba(0,0,0,.3);
			box-shadow: 0 8px 8px -5px rgba(0,0,0,.3);
		}

		/*------------------------------*/

		#signup h1 {
			position: relative;
			color: purple;
			background-color: white;
			text-align: center;
			margin: 0 0 20px;
			height: 50px;
			border-radius: 5px;
		}

		#signup h1::before,
		#signup h1::after{
			content:'';
			position: absolute;
			border: 10px solid rgba(128,0,128,.15);
			top: 0px;
			bottom: 0px;
			left: 0;
			right: 0;
			border-radius: 5px;
		}

		

		/*------------------------------*/

        ::-webkit-input-placeholder {
           color: #bbb;
        }
        
        :-moz-placeholder {
           color: #bbb;
        } 				    	

		.placeholder{
			color: #bbb; /* polyfill */
		}		

		#signup input{
			margin: 5px 0;
			padding: 15px;
			width: 100%;
			*width: 518px;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
			border: 1px solid #ccc;
			-moz-border-radius: 3px;
			-webkit-border-radius: 3px;
			border-radius: 3px;	
		}

		#signup input:focus{
			outline: 0;
			border-color: #aaa;
			-moz-box-shadow: 0 2px 1px rgba(0, 0, 0, .3) inset;
			-webkit-box-shadow: 0 2px 1px rgba(0, 0, 0, .3) inset;
			box-shadow: 0 2px 1px rgba(0, 0, 0, .3) inset;
		}		

		#signup button{
			margin: 20px 0 0 0;
			padding: 15px 8px;			
			width: 100%;
			cursor: pointer;
			border: 1px solid #2493FF;
			overflow: visible;
			display: inline-block;
			color: #fff;
			font: bold 1.4em arial, helvetica;
			text-shadow: 0 -1px 0 rgba(0,0,0,.4);		  
			background-color: #2493ff;
			background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(255,255,255,.5)), to(rgba(255,255,255,0)));
			background-image: -webkit-linear-gradient(top, rgba(255,255,255,.5), rgba(255,255,255,0));
			background-image: -moz-linear-gradient(top, rgba(255,255,255,.5), rgba(255,255,255,0));
			background-image: -ms-linear-gradient(top, rgba(255,255,255,.5), rgba(255,255,255,0));
			background-image: -o-linear-gradient(top, rgba(255,255,255,.5), rgba(255,255,255,0));
			background-image: linear-gradient(top, rgba(255,255,255,.5), rgba(255,255,255,0));
			-webkit-transition: background-color .2s ease-out;
			-moz-transition: background-color .2s ease-out;
			-ms-transition: background-color .2s ease-out; 
			-o-transition: background-color .2s ease-out;  
			transition: background-color .2s ease-out;
			-moz-border-radius: 3px;
			-webkit-border-radius: 3px;
			border-radius: 3px;
			-moz-box-shadow:  0 2px 1px rgba(0, 0, 0, .3),
							  0 1px 0 rgba(255, 255, 255, .5) inset;
			-webkit-box-shadow: 0 2px 1px rgba(0, 0, 0, .3),
								0 1px 0 rgba(255, 255, 255, .5) inset;
			box-shadow: 0 2px 1px rgba(0, 0, 0, .3),
						0 1px 0 rgba(255, 255, 255, .5) inset;			  						  
		}

		#signup button:hover{
		  	background-color: purple;
            border-color: purple;
		}

		#signup button:active{
			position: relative;
			top: 3px;
			text-shadow: none;
			-moz-box-shadow: 0 1px 0 rgba(255, 255, 255, .3) inset;
			-webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, .3) inset;
			box-shadow: 0 1px 0 rgba(255, 255, 255, .3) inset;
		}

		/* ------------------------------------------------- */

		#about{
		    color: #999;
		    text-align: center;
		    font: 0.9em Arial, Helvetica;
		}

		#about a{
		    color: #777;
		}		
	</style>    
  </head>

  <body>
	<?php require_once('nav.php') ?>
	<div class="container">
  	<form id="signup">
		<h1>event it</h1>
		<input type="email" placeholder="john.doe@email.com" required="">
		<input type="password" placeholder="Choose your password" required="">
		<input type="password" placeholder="Confirm password" required="">					
		<button type="submit">Sign up for free!</button>	
	</form>

	</div>
  </body>

</html>