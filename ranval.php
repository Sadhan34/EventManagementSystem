<?php
	$recipients = array();
	for($i=0;$i<=20000;$i++){
		$recipients[] = $i."@gmail.com";
	}
	
	
	foreach ($recipients as $email) {
			echo$email."</br>";
		}
?>