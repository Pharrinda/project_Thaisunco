<?php 
	$DBServer ="localhost";
	$name = "root";
	$psw ="";
	$database ="goingont_sunco";

	$con = mysqli_connect($DBServer,$name,$psw,$database);
	mysqli_query($con, "SET NAMES 'utf8' "); 
	
	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}
	//echo "Connected successfully";
// 	$DBServer = "localhost";
// 	$name = "goingont_sunco";
// 	$psw = "PE0T8zvuCH";
// 	$database = "goingont_sunco";
// 
?>