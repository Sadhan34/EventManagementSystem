<?php
	if (isset($_SESSION['email']) && $_SESSION['loggedin'] == true) {
		echo'<div class="main-nav">
		  <div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="index.php">
				
				<h1>EVENTUM</h1>
			  </a>                    
			</div>
			<div class="collapse navbar-collapse">
			  <ul class="nav navbar-nav navbar-right">    
				<li class="scroll"><a href="?page=create_event">CREATE EVENT</a></li>		  
				<li class="scroll dropdown">
				  <a href="admin_home.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">';echo$_SESSION['fullname'].' <span class="caret"></span></a>
				  <ul class="dropdown-menu">
					<li class="scroll"><a href="admin_home.php">My Event</a></li>
					<li class="scroll"><a href="logout.php">Logout</a></li>
				  </ul>
				</li>
				
				
			  </ul>
			</div>
		  </div>
		</div><!--/#main-nav-->
	  </header><!--/#home-->';
		
	}else
	{
		echo'<div class="main-nav">
		  <div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="index.php">
				<a class="navbar-brand" href="index.php">
				
				<h1>EVENTUM</h1>
			  </a>                    
			</div>
			<div class="collapse navbar-collapse">
			  <ul class="nav navbar-nav navbar-right">                 
				<li class="scroll"><a href="?page=login">Login</a></li>
				<li class="scroll"><a href="?page=register">Register</a></li>
				<li class="scroll"><a href="?page=create_event">CREATE EVENT</a></li>
			  </ul>
			</div>
		  </div>
		</div><!--/#main-nav-->
	  </header><!--/#home-->';
	}
?>
