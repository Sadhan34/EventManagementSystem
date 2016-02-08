<?php
	session_start();
	include('header.php');
	include('navigation_bar.php');
	if(isset($_GET["page"])) {

		if($_GET['page']=="create_event"){
			$idNo ='';
			include("create_event.php");
		}
		else if($_GET["page"]=="login"){
            include("login.php");
        }
		else if($_GET["page"]=="register"){
			 include("register.php");
		}

	}
	else
	{
		echo'<section class="event-show">';
			
			include('db.php');
			$id = intval($_GET['idNo']);
			//$_SESSION['eventID'] = $id;
			//$id=$_GET['idNo'];
			$sql="SELECT * FROM offline_ticket WHERE id=$id";
			$result=mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)){
				 while($row=mysqli_fetch_assoc($result)){		

		echo'<div class="event-image">	
			<img src="';echo($row["image"]).'" alt="" width="100%">
		</div>
		<div class="container description-area ">
			<div class="description-text col-md-10 col-md-offset-1">';

					 echo('<h3>');echo($row['eventname']).'</h5>';
					echo('<strong>Organizer</strong>
					<h5>');echo($row['organizer']).'</h5>';
					echo('<strong>Time</strong>
					<h5>');echo($row['start_date']).'</h5>';
					echo('<strong>Location</strong>
					<h5>');echo($row['location']).'</h5>';
					echo('<strong>Description</strong>
					<p>');echo($row['description']).'</p>
				
				
				
				<a href="event_register.php?id=' . $id . '"><button type=submit" class="btn-submit">Register</button></a>
			</div>
		</div>';	}
			}
	}
	
	
			include('footer.php');
?>
	
