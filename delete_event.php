<?php
	ob_start();
	session_start();
	include('db.php');
	$id=($_GET['id']);
	$adminID=$_SESSION['adminId'];echo$adminID;
	$sql="DELETE FROM offline_ticket WHERE id='$id' AND adminId='$adminID'";
	if(!mysqli_query($conn,$sql)){
		echo'There was a problem'.mysqli_query($conn);
		header('location:admin_home.php');
	}
	else{
		echo'Item Deleted';
		header('location:admin_home.php');
	}
		
?>