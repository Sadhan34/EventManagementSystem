<?php 
	 if (isset($_SESSION['email']) && $_SESSION['loggedin'] == true) {
		echo'<section id="form-design">
		<div class="col-sm-offset-3 col-sm-6 loginspace">
    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
			<label class="col-sm-3 "></label>
                <div class="col-sm-9">
                  <h5 class="text-center">Create Your Event</h5><hr></div>
			
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Event Name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" value=" " name="event_name" placeholder="Event Name" required="required">
                </div>
            </div>
			     <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Start Date</label>
                <div class="col-sm-9">
					<div class="input-group date form_datetime">
						<input size="16" type="text" value="" id="theDate" name="date"readonly class="form-control">
						<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
					</div>

                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Description</label>
                <div class="col-sm-9">
                  <textarea class="form-control" rows="3" name="description" placeholder="Description" required="required"></textarea>
                </div>
            </div>
			
			<div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Organizer</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control"value=" " name="organizer" placeholder="Organizer/Company"required="required">
                </div>
            </div>
			<div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Location</label>
                <div class="col-sm-9">
                  <textarea class="small_text_area form-control"rows="2" name="location"placeholder="location"required="required"></textarea>
                </div>
              </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Ticket Quantity</label>
                <div class="col-sm-9">
                  <input type="number" class="form-control"value="" name="ticket" placeholder="Ticket Quantity"required="required">
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
	</section>';
	 }
	 else{
		echo'  <div id="confirm_page">
	<div class="container confirm">
		<h4>Please Login before continue</h4>
		<div class="login-box-btm text-center">
            <a href="?page=login"><strong>Login !</strong> </a> </p>
            </div>
	</div>
    
  </div><!--/#contact-->';
	
	 }
		 
?>
  

<?php
    include('db.php');
	if(isset($_SESSION['adminId'])){
		$adminId=$_SESSION['adminId'];
	}
	
    $sql="CREATE TABLE IF NOT EXISTS offline_ticket(
        id int(255) AUTO_INCREMENT,
        eventname varchar(255),
        start_date datetime,
        description BLOB(15535),
        organizer varchar(255),
        location varchar(255),
        ticket int(255),
		image varchar(200),
		adminId INT(255),
        PRIMARY KEY(id),
		FOREIGN KEY (adminId) REFERENCES admin_reg(adminId)

      )";
    if(!mysqli_query($conn,$sql)){
      echo "Table Not created".mysqli_error($conn);
    }
    else
      //echo "Table Created";
  

    if(isset($_POST['submit'])){
        $eventname=$_POST['event_name'];
        $date=$_POST['date'];//echo ($date)."<br/>";
        $description=$_POST['description'];
        $organizer=$_POST['organizer'];
        $location=$_POST['location'];
        $ticket=$_POST['ticket'];
		
		//File Upload
			$target_dir = "uploads/";
			$bool=true;
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$filetype=pathinfo($target_file,PATHINFO_EXTENSION);
			$temp=$adminId.date('dms');
			$newfilename="uploads/". $temp.".".$filetype;
			if($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg"
			&& $filetype != "gif" ) {
				//$msg= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$newfilename="images/default.jpg";
				$bool=true;
			}
			if($bool==true){
				move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newfilename);
				$msg="Event Create Succesfully !";
				$sql="INSERT INTO offline_ticket(eventname,start_date,description,organizer,location,ticket,image,adminId)
				Value('$eventname','$date','$description','$organizer','$location','$ticket','$newfilename','$adminId')";
				if(!mysqli_query($conn,$sql)){
					$msg="Data Not Inserted";
					echo'Data Not inserted'.mysqli_error($conn);
					
				}else{
                    header("location:admin_home.php");
					 //echo("<script>location.href = 'ticket_page.php';</script>");
				}
			}
			echo'<div class="col-sm-offset-3 col-sm-6 alert alert-success">';echo$msg.'</div>';
		 //Insert data
		

    }
  ?>    
