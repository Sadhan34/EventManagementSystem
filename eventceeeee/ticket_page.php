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

	}else{
		echo'  <div id="confirm_page">
	<div class="container confirm">
		<div class="alert alert-success">
  <h4>Your Event is Created</h4>
</div>
		
		<a href="admin_home.php">Check all your Event here</>
	</div>
    
  </div><!--/#contact-->';
	}
	
	?>
 <?php include('footer.php');
	?>
	

<?php	
	/*session_start();
	include('header.php');
	include('navigation_bar.php');
			$qrNumber=rand();
			 if(isset($_POST['submit'])){
				for($i=1;$i<=5;$i++){
					?>

					<?php $qrNumber++;
				}
			 }

		?>
  <?php
	include('db.php');
	$sql="SELECT eventname,start_date,location,image FROM offline_ticket";
	$result=mysqli_query($conn,$sql);
	
  */?>
	<!--<section id="ticket-home">
		<div class="container">
			<div class="ticket col-md-8 col-md-offset-2">
				<div class="row">
					<div class="col-md-9">
						<h3 class="text-center"><strong>Great Barrier Reef passions - AUCKLAND</strong></h3>
					</div>
					<div class="col-md-3 ticket-img">
						<img src="uploads/event.jpg" class="img-responsive">
					</div>
				</div><hr>
				<div class="row">
					<div class="col-md-4">
						<input style="display:none;"id="text" type="text" value="<?php echo $qrNumber;?>" />
						<div id="qrcode" style="width:90%; height:80%; margin-top:15px;"></div>
					</div>
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-6">
								<h3>Event Information</h3>
								<p><b>Date:</b> June 26, 2014</p>
								<p><b>Time:</b> 10.30 PM</p>
								<p><b>Event Venue:</b>KIB Auditorium, Khamarbari Road Dhaka-1207</p>
							</div>
							<div class="col-md-6">
								<h3>Customer Information</h3>
								<p>Motiur Rahaman</p>
								<p>memotiur@gmail.com</p>
								<p>+8801717849968</p>
							</div>
						</div><hr>
						<strong>S.L:</strong> 17178499681717849968171784996817178499681717849968
					</div>

				</div><hr>
				<div class="row">
					<div class="col-md-3 col-md-offset-9 ticket-img">
						<img src="uploads/logo.jpg" class="img-responsive">
					</div>
	
				</div>

			</div>
		<form class="form-horizontal" method="POST">
			<button type="submit" class="btn-submit" name="submit">Create</button>
		</form>

		</div>
	</section>-->
	