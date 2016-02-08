<?php
	session_start();
	include('db.php');
	include('header.php');
		
	if(isset($_GET['id'])>0){
		$id=($_GET['id']);//echo$id;
	}else{
		$id=null;
	}
	
	if (isset($_SESSION['email']) && $_SESSION['loggedin'] == true) {
		$email=$_SESSION['email'];//echo$email;
		$adminID=$_SESSION['adminId'];//echo$adminID;
	}else{
		header('location:admin_home.php');
	}
	?>
	
	<div class="main-nav">
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
				<li class="scroll dropdown">
				  <a href="admin_home.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo$_SESSION['fullname'];?><span class="caret"></span></a>
				  <ul class="dropdown-menu">
					<li class="scroll"><a href="admin_home.php">My Event</a></li>
					<li class="scroll"><a href="logout.php">Logout</a></li>
				  </ul>
				</li>
				
				
			  </ul>
			</div>
		  </div>
		</div><!--/#main-nav-->
	  </header><!--/#home-->
	
<?php

	
	//Get data from Table
	$sql="SELECT * FROM offline_ticket WHERE id='$id' AND adminId='$adminID'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)){
		$row=mysqli_fetch_assoc($result);
		$eventname=$row['eventname'];
		$start_date=$row['start_date'];
		$description=$row['description'];
		$organizer=$row['organizer'];
		$location=$row['location'];
		$ticket=$row['ticket'];
		$image=$row['image'];
	}else{
		header('location:admin_home.php');
		$eventname=null;
		$start_date=null;
		$description=null;
		$organizer=null;
		$location=null;
		$ticket=null;
		$image=null;
	}
?>
	
<section id="form-design">
		<div class="col-sm-offset-3 col-sm-6 loginspace">
    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
			<label class="col-sm-3 "></label>
                <div class="col-sm-9">
                  <h5 class="text-center">Create Your Event</h5><hr></div>
			
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Event Name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" value="<?php echo$eventname; ?>"name="event_name" placeholder="Event Name" required="required">
                </div>
            </div>
			     <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Start Date</label>
                <div class="col-sm-9">
					<div class="input-group date form_datetime">
						<input size="16" type="text" value="<?php echo$start_date; ?>" id="theDate" name="date"readonly class="form-control">
						<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
					</div>

                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Description</label>
                <div class="col-sm-9">
                  <textarea class="form-control" rows="3" name="description" placeholder="Description" required="required"><?php echo$description; ?></textarea>
				  </div>
            </div>
			
			<div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Organizer</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control"value="<?php echo$organizer; ?>" name="organizer" placeholder="Organizer/Company"required="required">
                </div>
            </div>
			<div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Location</label>
                <div class="col-sm-9">
                  <textarea class="small_text_area form-control"rows="2" name="location"placeholder="location"required="required"><?php echo$location; ?></textarea>
                </div>
              </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Ticket Quantity</label>
                <div class="col-sm-9">
                  <input type="number" class="form-control"value="<?php echo$ticket; ?>" name="ticket" placeholder="Ticket Quantity"required="required">
                </div>
              </div>
			  <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Event Image</label>
                <div class="col-sm-9">
                   <input type="file" name="fileToUpload" id="fileToUpload">
                </div>
              </div>
            <div class="form-group ">
              <div class="col-sm-offset-3 col-sm-9">
               <button type="submit" class="btn-submit" name="submit">Create</button>
              </div>
            </div>
            </form>
		</div>
	</section>
	
	
	
<?php //Update Event
	if(isset($_POST['submit'])){
        $eventname=$_POST['event_name'];
        $date=$_POST['date'];//echo ($date)."<br/>";
        $description=$_POST['description'];
        $organizer=$_POST['organizer'];
        $location=$_POST['location'];
        $ticket=$_POST['ticket'];
		
		$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$filetype=pathinfo($target_file,PATHINFO_EXTENSION);
			$temp=date('dms');
			$newfilename="uploads/". $temp.".".$filetype;
			if($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg"
			&& $filetype != "gif" ) {
				//echo'Ok';
				move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newfilename);
			}else{
				$newfilename='images/slider/2.jpg';
				//echo'Not Ok';
			}

		
		$sql="UPDATE offline_ticket SET eventname='$eventname',start_date='$date',
		description='description',organizer='$organizer',location='$location',
		ticket='$ticket', image='$newfilename' WHERE id='$id' AND adminId='$adminID'";
		if (mysqli_query($conn, $sql)) {
			echo '<div class="col-sm-offset-3 col-sm-6 alert alert-success">
  <strong>Event!</strong> Updated.
</div>';
		} else {
			echo "Error updating record: " . mysqli_error($conn);
		}
		mysqli_close($conn);
	}

	 include('footer.php');
?>