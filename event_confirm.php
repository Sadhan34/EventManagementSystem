<?php
	session_start();
	include('header.php');
	include('navigation_bar.php');
	if(isset($_GET["page"])) {

		if($_GET['page']=="create_event"){
			include("create_event.php");
		}
        
		else if($_GET["page"]=="register"){
			 include("register.php");
		}
		else if($_GET["page"]=="login"){
			 include("login.php");
		}

	}else{
		echo'  <div id="confirm_page">
				<div class="container confirm">
					<div class="alert alert-success">
			 <h4>Your Registartion is complete. We will inform you soon.</h4>
			</div>
		
	</div>
    
  </div><!--/#contact-->';
	}
	
	?>
 <?php include('footer.php');
	?>
	