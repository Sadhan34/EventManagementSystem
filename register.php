	<section id="form-design" method="POST">
		<div class="col-sm-offset-3 col-sm-6">
			<h5 class="text-center">Registration</h5><hr>
			<form class="form-horizontal" method="POST">
				<div class="form-group">
				  <div class="col-sm-12">
					<div class="input-group margin-bottom-sm">
					<span class="input-group-addon"><i class="fa  fa-user fa-fw"></i></span>
					  <input class="form-control" type="text" name="name" id="phone"placeholder="Full Name"required="required">
					  </div>
				  </div>
				</div>
				<div class="form-group">
				  <div class="col-sm-12">
					<div class="input-group margin-bottom-sm">
					<span class="input-group-addon"><i class="fa fa-mobile fa-fw"></i></span>
					  <input class="form-control" type="number" id="phone" name="phone"placeholder="Phone Number">
					  </div>
				  </div>
				</div>
				<div class="form-group">
				 <div class="col-sm-12">
					<div class="input-group margin-bottom-sm">
					<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
					  <input class="form-control" type="email" name="email" id="email"placeholder="Email"required="required">
					  </div>
				  </div>
				</div>
				<div class="form-group">
				 <div class="col-sm-12">
					<div class="input-group margin-bottom-sm">
					  <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
					  <input type="password" class="form-control"  name="password"id="password" placeholder="Password"required="required">
					</div>
				  </div>
				</div>
				<div class="form-group ">
				  <div class="col-sm-12">
					<button type="submit" class="btn-submit" name="submit">Register</button>
				  </div>
				</div>
			</form>
           <div class="login-box-btm text-center">
            <p>You have an account? <br>
            <a href="?page=login"><strong>Login !</strong> </a> </p>
            </div>
		</div>
	</section>
	<?php
		include('db.php');
		$sql="CREATE TABLE IF NOT EXISTS admin_reg (
			adminId INT(20) AUTO_INCREMENT,
			fullname VARCHAR(50),
			phone varchar(20),
			email VARCHAR(50) UNIQUE,
			password VARCHAR(50),
			PRIMARY KEY(adminId)
		)";
		if(!mysqli_query($conn,$sql)){
			echo'Table not created'.mysqli_error($conn);
		}
		if(isset($_POST['submit'])){
			$fullname=$_POST['name'];
			$phone=$_POST['phone'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			$sql="INSERT INTO admin_reg(fullname,phone,email,password)
			VALUE('$fullname','$phone','$email','$password')
			";
			if(!mysqli_query($conn,$sql)){
				//echo'Email address is already exist';
				echo'<div class="col-sm-offset-3 col-sm-6 alert alert-danger">Email address already exist</div>';
				//echo'<div class="alert alert-danger">Email address already exist</div>';
			}
			else
				//header("location.href = '?page=login'");
				//echo("<script>location.href = '?page=login&&email=".$email."';</script>");
				echo("<script>location.href = '?page=login';</script>");
		}
		echo'<div class="container">
	</div>';
	?>
	