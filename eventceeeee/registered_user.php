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
                            <th>Sented</th>
                     
                        </tr>';

				 while($row=mysqli_fetch_assoc($result)){
					 echo'<tr>';
						echo'<td>';echo($row['fullName']).'</td>';
						echo'<td>';echo($row['phone']).'</td>';
						echo'<td>';echo($row['email']).'</td>';
						echo'<td style=" padding: 0px;">
						<select class="form-control" style="padding:0px;border:none; margin:0px" name="choice">
						  <option value="confirm">Confirm</option>
						  <option value="cancel">Cancel</option>
						</select></td>
					  </tr>';
				 }
				 echo'
					</table>'.' <br>
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
		
		$sql="SELECT email FROM event_register WHERE eventId=$id";
		$recipients = array();
		$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) > 0){
				while($row=mysqli_fetch_assoc($result)){
					$recipients[] = $row['email'];//echo$recipients;
					$selectOption = $_POST['choice'];
					echo$selectOption.'<br>';
				}
				
		}
		foreach ($recipients as $item) {
			echo $item.'<br>';
			$to = $item;
			$subject = "E-mail subject";
			$body = "E-mail body";
			$headers = 'From: info@mydomain.com' . "\r\n" ;
			$headers .= 'Reply-To: info@mydomain.com' . "\r\n";
			$headers .= 'BCC: ' . implode(', ', $recipients) . "\r\n";

			mail($to, $subject, $body, $headers);
		}
		
		//$selectOption = $_POST['choice'];
		//echo$selectOption;
	}
?>


		  
		
