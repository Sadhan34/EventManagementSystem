<?php
$serverName="gdgbangla.com";
$password="Tgapga842742";
$username="gdgbangl_root";
$dbnNme="gdgbangl_event";

$con=mysqli_connect($serverName,$username,$password,$dbnNme);

//$con=mysqli_connect("localhost","root","''","gdgbangl_event");

// Check connection
if (mysqli_connect_errno()) {
  echo "An error occurred. Try after a while.";
  die();
}

	$getfromAppsQrNumber = $_POST['qr_code'];
	$event_id = 1;
	
	//$event_id = $_GET['event_id'];

	$result = mysqli_query($con,"SELECT * FROM event_register WHERE eventId = $event_id AND qrnumber=$getfromAppsQrNumber") or die("Error: ".mysqli_error($con));
	
	if(mysqli_num_rows($result) > 0)
	{
		$row=mysqli_fetch_assoc($result);
		
		    if($row['status']==0)
		    {
		        //$status=1; 
		    	mysqli_query($con, "UPDATE event_register SET status = '1' WHERE qrnumber=$getfromAppsQrNumber;");
		 echo "Please go inside";
		    }
		    else
		    {
		        //$status=0; 
		        mysqli_query($con, "UPDATE event_register SET status = '0' WHERE qrnumber=$getfromAppsQrNumber;");
		 echo "You are exiting";
		    }		
	}
	
	else
	{
		echo "Not Registered";
                }
	
	mysqli_close($con);

?>