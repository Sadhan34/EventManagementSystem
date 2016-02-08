<?php
	session_start();
	if (isset($_SESSION['email']) && $_SESSION['loggedin'] == true) {
		$email=$_SESSION['email'];
		$fullname=$_SESSION['fullname'];
		$phone=$_SESSION['phone'];
	}else{
		$email="";
		$fullname="";
		$phone="";
		$_SESSION["loggedin"]=false;
	}
	
	if(isset($_GET["page"])) {
		if($_GET["page"]=="login"){
           header('location:index.php');
        }
		else if($_GET["page"]=="register"){
			 header('location:index.php');
		}
		else if($_GET['page']=="create_event"){
			 header('location:index.php');
		}

	}
	else
	{
	include('header.php');
	include('navigation_bar.php');
	 include('db.php');
	 $id=$_GET['id'];
	 $sql="SELECT COUNT(fullName)AS total FROM event_register WHERE eventId=$id";
			$result=mysqli_query($conn,$sql);
			$count = mysqli_fetch_assoc($result);
			$ticketNumber=$count['total'];
			
	 $sql="SELECT ticket,eventname,start_date FROM offline_ticket WHERE id=$id";
			$result=mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)){
				 while($row=mysqli_fetch_assoc($result)){
					 $ticketNumber=$row['ticket']-$ticketNumber;
				 
	echo'<section id="form-design">
		<div class="col-sm-offset-3 col-sm-6">
			<h3 class="text-center text-success">';echo($row['eventname']."<br>".' Event Time: '.$row['start_date']."<br>".' Available Ticket: '.$ticketNumber).'</h3><hr>';
			}

			}
			
			
		}
		if($ticketNumber>0){
			echo'<form class="form-horizontal"method="POST" action="" >
				<div class="form-group">
				  <div class="col-sm-12">
					<div class="input-group margin-bottom-sm">
					<span class="input-group-addon"><i class="fa fa-mobile fa-fw"></i></span>
					  <input class="form-control" type="text" name="name" value="';echo$fullname.'" id="phone"placeholder="Full Name" required="required">
					  </div>
				  </div>
				</div>
				<div class="form-group">
				  <div class="col-sm-12">
					<div class="input-group margin-bottom-sm">
					<span class="input-group-addon"><i class="fa fa-mobile fa-fw"></i></span>
					  <input class="form-control" type="number" id="phone" value="';echo$phone.'" name="phone"placeholder="Phone Number">
					  </div>
				  </div>
				</div>
				<div class="form-group">
				 <div class="col-sm-12">
					<div class="input-group margin-bottom-sm">
					<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
					  <input class="form-control" type="email" name="email" name="name" value="';echo$email.'"id="email"placeholder="Email" required="required">
					  </div>
				  </div>
				</div>
				<div class="form-group">
				 <div class="col-sm-12">
					<div class="input-group margin-bottom-sm">
					<span class="input-group-addon"><i class="fa fa-hand-o-up fa-fw"></i></span>
					  <select class="form-control" name="district">
						<option value="Dhaka"selected>Select District</option> 
						<option value="BAGERHAT">BAGERHAT</option> 
						<option value="BANDARBAN">BANDARBAN</option>
						<option value="BARGUNA">BARGUNA</option>
						<option value="BARISAL">BARISAL</option> 
						<option value="BHOLA">BHOLA</option> 
						<option value="BOGRA">BOGRA</option>
						<option value="BRAHMONBARIA">BRAHMONBARIA</option> 
						<option value="CHANDPUR">CHANDPUR</option> 
						<option value="CHITTAGONG">CHITTAGONG</option>
						<option value="CHUADANGA">CHUADANGA</option> 
						<option value="COMILLA">COMILLA</option>
						<option value="COX`S BAZAR">COX`S BAZAR</option>
						<option value="DHAKA">DHAKA</option> 
						<option value="DINAJPUR">DINAJPUR</option> 
						<option value="FARIDPUR">FARIDPUR</option>
						<option value="FENI">FENI</option> 
						<option value="GAIBANDHA">GAIBANDHA</option> 
						<option value="GAZIPUR">GAZIPUR</option> 
						<option value="GOPALGONJ">GOPALGONJ</option> 
						<option value="HOBIGONJ">HOBIGONJ</option> 
						<option value="JAIPURHAT">JAIPURHAT</option> 
						<option value="JAMALPUR">JAMALPUR</option> 
						<option value="JESSORE">JESSORE</option> 
						<option value="JHALOKATHI">JHALOKATHI</option> 
						<option value="JHENAIDAH">JHENAIDAH</option> 
						<option value="KHAGRACHHARI">KHAGRACHHARI</option> 
						<option value="KHULNA">KHULNA</option> 
						<option value="KISHORGONJ">KISHORGONJ</option>
						<option value="KURIGRAM">KURIGRAM</option> 
						<option value="KUSHTIA">KUSHTIA</option> 
						<option value="LALMONIRHAT">LALMONIRHAT</option>
						<option value="LUXMIPUR">LUXMIPUR</option> 
						<option value="MADARIPUR">MADARIPUR</option>
						<option value="MAGURA">MAGURA</option> 
						<option value="MANIKGONJ">MANIKGONJ</option> 
						<option value="MEHERPUR">MEHERPUR</option> 
						<option value="MOULVIBAZAR">MOULVIBAZAR</option>
						<option value="MUNSHIGONJ">MUNSHIGONJ</option> 
						<option value="MYMENSINGH">MYMENSINGH</option> 
						<option value="NAOGAON">NAOGAON</option> 
						<option value="NARAIL">NARAIL</option>
						<option value="NARAYANGONJ">NARAYANGONJ</option>
						<option value="NARSINGDI">NARSINGDI</option> 
						<option value="NATORE">NATORE</option> 
						<option value="NAWABGONJ">NAWABGONJ</option>
						<option value="NETROKONA">NETROKONA</option>
						<option value="NILPHAMARI">NILPHAMARI</option>
						<option value="NOAKHALI">NOAKHALI</option> 
						<option value="PABNA">PABNA</option> 
						<option value="PANCHAGARH">PANCHAGARH</option>
						<option value="PATUAKHALI">PATUAKHALI</option> 
						<option value="PIROJPUR">PIROJPUR</option> 
						<option value="RAJBARI">RAJBARI</option> 
						<option value="RAJSHAHI">RAJSHAHI</option>
						<option value="RANGAMATI">RANGAMATI</option> 
						<option value="RANGPUR">RANGPUR</option> 
						<option value="SATKHIRA">SATKHIRA</option> 
						<option value="SHARIATPUR">SHARIATPUR</option>
						<option value="SHERPUR">SHERPUR</option> 
						<option value="SIRAJGONJ">SIRAJGONJ</option>
						<option value="SUNAMGONJ">SUNAMGONJ</option>
						<option value="SYLHET">SYLHET</option> 
						<option value="TANGAIL">TANGAIL</option> 
						<option value="THAKURGAON">THAKURGAON</option>
					</select>
					  </div>
				  </div>
				</div>

				<div class="form-group ">
				  <div class="col-sm-12">
					<button type="submit" class="btn-submit" name="submit">Event Register</button>
				  </div>
				</div>
			</form>';
			if($_SESSION["loggedin"] == false) {
				echo'<div class="login-box-btm text-center">
            <p>Have You an account? <br>
            <a href="?page=login"><strong>Login !</strong> </a> </p>
            </div>';
			}
           
		echo'</div>';
	
	$sql="CREATE TABLE IF NOT EXISTS event_register(
		eventRegId int(255) AUTO_INCREMENT,
        fullName varchar(255),
        phone varchar(50),
		email varchar(50),
		district varchar(50),
		status int(5),
		eventId INT(255),
		PRIMARY KEY(eventRegId)
		)";
		if(!mysqli_query($conn,$sql)){
			echo "Table Not created".mysqli_error($conn);
		}
		else
			//echo"Table Created";
		if(isset($_POST['submit'])){
			$fullname=$_POST['name'];
			$phone=$_POST['phone'];echo$phone;
			$email=$_POST['email'];
			$status=0;
			$district = $_POST['district'];//echo$district;
			echo $id;
			$sql="SELECT * FROM event_register WHERE email='$email' AND eventID='$id'";
				$result=mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)){
					 echo'Registered Already';
			}else{
				$sql="INSERT INTO event_register(fullName,phone,email,district,status,eventId)
			VALUE('$fullname','$phone','$email','$district','$status','$id')";
			if(!mysqli_query($conn,$sql)){
				echo("There was an problem. Try again".mysqli_error($conn));
			}
			else
				 echo("<script>location.href = 'event_confirm.php';</script>");
		}
			}
			
		}
		else{
				echo'<div id="confirm_page">
				<div class="confirm">
					<div class="alert alert-success">
			 <h4>Ticket Not Available</h4>
			</div>
		
	</div>
    
  </div><!--/#contact--></section>';
		}
		
	?>
<?php	
		
		include('footer.php');
  ?>
	
			
	