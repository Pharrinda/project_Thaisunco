<?php 
	$status = 1;

	
	// create curl resource
	// $ch = curl_init();
 // //  // set url 
 //  		curl_setopt($ch, CURLOPT_URL, "http://45.32.69.11:7755/test/=".$status);
 //  		$output = curl_exec($ch);
 //  		 curl_close($ch);
	if (isset($status) === 1) {
		# code...
		echo "open";
	}
  		$a = file_get_contents("http://45.32.69.11:7755/test/=".$status);
  		//var_dump(json_decode($output, true));
	header("Location:control_and_monitoring.php");
	exit();
 ?>