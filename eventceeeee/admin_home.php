<?php
ob_start();
	session_start();
        include('db.php');
	$adminId=$_SESSION['adminId'];
	if(!isset($_SESSION['email']) && $_SESSION['loggedin'] == false) {
	     header("location:index.php");
	}
	//echo$_SESSION['email'];
	include('header.php');
	include('navigation_bar.php');
	if(isset($_GET["page"])) {
		if($_GET['page']=="create_event"){
			include("create_event.php");
		}
	}
	else{
		echo'<section id="">
		<div class="container">
		  
		   <div class="row"><div class="col-md-10 col-md-offset-1">';
				
				
				$sql="SELECT * FROM offline_ticket WHERE adminId='$adminId' ORDER BY id DESC";
				$result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result) > 0){
					echo'<div class="row">
			<div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
			  <h2>My Events</h2>
			  </div>
		  </div>';
					while($row=mysqli_fetch_assoc($result)){
						$_SESSION['eventID']=$row['id'];
						echo'<a href="show_event.php?idNo='.$row['id'] . '"><div class="my_event">
						<h4>';echo$row['eventname'].'</h4>
						<h5>';echo$row['start_date'].'</h5></a>
						<a class="k" href="delete_event.php?id=' . $_SESSION['eventID']. '">Delete</a>
						<a class="k" href="edit_event.php?id=' . $_SESSION['eventID'] . '">Edit</a>
						<a class="k" href="registered_user.php?id=' . $row['id']. '">Registered User</a>
						
					</div>
				';
				
					}
				}
				else{
					echo'  <div id="confirm_page">
					<div class="confirm">
						<h4>You Dont have any Event</h4>
						<a href="admin_home.php">Check all your Event here</>
					</div>
					
				  </div><!--/#contact-->';
					
				}
					
		  echo'</div></div>
		  
		  
		</div>
	</section>';
	}
	


	include('footer.php');

?>

