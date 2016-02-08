<section id="form-design">
		<div class="col-sm-offset-4 col-sm-5">
            <h5 class="text-center">Login</h5><hr>
          <form class="form-horizontal" method="POST">
            <div class="form-group">
              <div class="col-sm-12">
                <div class="input-group margin-bottom-sm">
                <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                  <input class="form-control" type="text" id="username"name="email"placeholder="E-mail">
                  </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <div class="input-group margin-bottom-sm">
                  <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                  <input type="password" class="form-control"name="password" id="password" placeholder="Password">
                </div>
                
              </div>
            </div>
            <div class="form-group form-group-lg">
              <div class="col-sm-12">
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Remember me
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group ">
              <div class="col-sm-12">
                <button type="submit" class="btn-submit" name="submit">Login</button>
              </div>
            </div>
            </form>
           <div class="login-box-btm text-center">
            <p> Don't have an account? <br>
            <a href="?page=register"><strong>Sign Up !</strong> </a> </p>
            </div>
		</div>
	</section>
	<?php
		include('db.php');
		$email="";
		$pass="";
		if(isset($_POST['submit'])){
			$email=$_POST['email'];
			$pass=$_POST['password'];
			
			//$email = stripslashes($email);
			//$pass = stripslashes($pass);
			//$email = mysql_real_escape_string($email);
			//$pass = mysql_real_escape_string($pass);
			
			$sql="SELECT * FROM admin_reg WHERE email='$email' AND password='$pass'";
			$result = mysqli_query($conn, $sql);
			
			if(mysqli_num_rows($result) > 0){
				$row=mysqli_fetch_assoc($result);
				$_SESSION['loggedin'] = true;
				$_SESSION['email'] = $email;
				$_SESSION['adminId'] = $row['adminId'];
				$_SESSION['fullname'] = $row['fullname'];
				$_SESSION['phone'] = $row['phone'];
				header("location:admin_home.php");
				
			}else
				echo'<div class="alert alert-warning">
  <strong>Email Address Or Password is wrong!</strong>
</div>
';
				}
	
		
	?>