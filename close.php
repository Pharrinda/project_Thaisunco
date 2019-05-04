<?php 
	$status = 0;

	// create curl resource
  if (isset($status) === 0) {
    # code...
    echo "close";
  }
      $a = file_get_contents("http://45.32.69.11:7755/test/=".$status);
      //var_dump(json_decode($output, true));
  header("Location:control_and_monitoring.php");
  exit();
 ?>