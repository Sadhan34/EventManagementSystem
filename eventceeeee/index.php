<?php
	ob_start();
	session_start();
	include('header.php');
	include('navigation_bar.php');
	if(isset($_GET["page"])) {
		if($_GET["page"]=="login"){
            include("login.php");
        }
		else if($_GET["page"]=="register"){
			 include("register.php");
		}
		else if($_GET['page']=="create_event"){
			include("create_event.php");
		}

	}
	else{
		include('home_slider.php');
		include('homepage_eventshow.php');
		include('contact.php');
	}
	
	include('footer.php');

?>
