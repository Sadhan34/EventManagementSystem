<?php
	include('db.php');	
        session_start();
        $adminId=$_SESSION['adminId'];
	if(!isset($_SESSION['adminId'])){
	    header("location:index.php");
	}
	include('header.php');
	include('navigation_bar.php');
	if(isset($_GET["page"])) {

		if($_GET['page']=="create_event"){
			include("create_event.php");
		}
		else if($_GET["page"]=="login"){
            include("login.php");
        }
		else if($_GET["page"]=="register"){
			 include("register.php");
		}

	}else{
	$id=$_GET['id'];
	$checkEvent="SELECT * FROM offline_ticket WHERE id=$id AND adminId='$adminId'";
	$result2 = mysqli_query($conn, $checkEvent);
		if(mysqli_num_rows($result2) > 0){
			$row=mysqli_fetch_assoc($result2);
			echo'<div class="container"><h3 class="text-center">'.'You Are Going To Send Confirmation Ticket For ';echo($row['eventname']."<br>".' Event Time: '.$row['start_date']).'</h3><hr>';
			
				//echo$row['eventname'];
				//echo$row['start_date'];
				//echo$row['location'];
				//echo$row['ticket'];
		}else{
			header("location:admin_home.php");
		}
		$recipients = array();
	$sql="SELECT * FROM event_register WHERE eventId=$id";
	$result=mysqli_query($conn,$sql);
			if(mysqli_num_rows($result) > 0){
				
				echo'<div class="col-md-8 col-md-offset-2">
				<form method="POST">
					<table class="table table-bordered table-responsive">
                        <tr>
                            <th>Full Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>District</th>
                            <th>status</th>
                            <th>Qr Number</th>
                            <th>Delete</th>
                     
                        </tr>';

				 while($row=mysqli_fetch_assoc($result)){
					 $count = count($row['email']);
					 $fullName[]= $row['fullName'];
					 $email[]= $row['email'];
					 $phone[]= $row['phone'];
					 $qr[]=$row['qrnumber'];
					 echo'<tr>';
						echo'<td>';echo($row['fullName']).'</td>';
						echo'<td>';echo($row['phone']).'</td>';
						echo'<td>';echo($row['email']).'</td>';
						echo'<td>';echo($row['district']).'</td>';
						echo'<td>';echo($row['status']).'</td>';
						echo'<td>';echo($row['qrnumber']).'</td>';
						/*'<td style=" padding: 0px;">
						<select class="form-control" style="padding:0px;border:none; margin:0px" name="choice">
						  <option value="confirm">Confirm</option>
						  <option value="cancel">Cancel</option>
						</select></td>*/
						echo'<td><a href="delete_entry.php?id=' . $row['eventRegId'] . '">Delete</a></td>
					 </tr>';
				 }
				 echo'
					</table>'.' <br>
					<form method="POST" action="" enctype="multipart/form-data">
                            <button type="submit" class="btn-submit" name="submit">Send Ticket</button>
                     
                        <br></form>
	</div>
</div>';
			}
			
			else
				echo'<div class="confirm"><div class="col-sm-offset-2 col-sm-8 alert alert-info ">You dont have registered user</div></div></div>';
	}
	include('footer.php');
	
	if(isset($_POST['submit'])){
		$count=0;
		foreach($email as $email){
			
			//echo'Email '.$email;
			//echo'Email '.$fullName[$count];
			//echo'QR '.$qr[$count];
			//echo'Phone '.$phone[$count].'<br>';
			
			//Print Ticket
			echo'<div class="ticket col-md-8 col-md-offset-2">
				<div class="row">
					<div class="col-md-9">
						<h3 class="text-center"><strong>Great Barrier Reef passions - AUCKLAND</strong></h3>
					</div>
					<div class="col-md-3 ticket-img">
						<img src="uploads/event.jpg" class="img-responsive">
					</div>
				</div><hr>
				<div class="row">
					<div class="col-md-6">
						<input style="display:none;"id="text" type="text" value="';echo$qr[$count].'" />
						<div id="qrcode" style="width:90%; height:80%; margin-top:15px;"></div>
					</div>
					<div class="col-md-6">
						<div class="row cinfo">
							<div class="col-md-6">
								<h3>Event Information</h3>
								<p><b>Date:</b> Jan 18, 2016 To Jan 24, 2016</p>
								<p><b>Time:</b> 9.00 AM To 9.00 PM</p>
								<p><b>Event Venue:</b>BCS Computer City. IDB Bhaban</p>
							</div>
							<div class="col-md-6">
								<h3>Customer Information</h3>
								<p>';echo$fullName[$count].'</p>
								<p>';echo$email.'</p>
								<p>';echo$phone[$count].'</p>
							</div>
						</div><hr>
						<strong>S.L: </strong>';echo$qr[$count].'
					</div>

				</div><hr>
				<div class="row">
					<div class="col-md-3 col-md-offset-9 ticket-img">
						<img src="uploads/logo.png" class="img-responsive">
					</div>
	
				</div>

			</div>';
			//Counter
			$count++;
		}echo'<br>';
		
	}
?>
<script>
	var qrcode = new QRCode("qrcode");

function makeCode () {      
    var elText = document.getElementById("text");
    
    if (!elText.value) {
        alert("Input a text");
        elText.focus();
        return;
    }
    
    qrcode.makeCode(elText.value);
}

makeCode();
</script>


		  
		
