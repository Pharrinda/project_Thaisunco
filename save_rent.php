<?php  
	session_start();
	include('condb.php');

	$rent_add = $_POST["rent_add"];
	$rent_size = $_POST["rent_size"];
	$rent_product_type = $_POST["rent_product_type"];
	$rent_start = $_POST["rent_start"];
	$rent_end = $_POST["rent_end"];
	$rent_price = $_POST["rent_price"];


	$username_insert = $_SESSION["username"];
	// $username_insert = $_SESSION["username"];

	// echo $username_insert;
	 $sql = "INSERT INTO `rent_detail`(`rent_no`, `username`, `rent_add`, `rent_size`, `rent_product_type`, `rent_start`, `rent_end`, `rent_price`, `pay_no`, `dome_id`) VALUES ('$rent_no','$username_insert','$rent_add','$rent_size','$rent_product_type','$rent_start','$rent_end','$rent_price','$pay_no','$dome_id')";

	 // echo $sql;
	//$objQuery = mysqli_query($con,$sql);

	if ($con->query($sql) === TRUE) {
    	// echo "New record created successfully";
    	header("Location:pay_home.php");
		exit();
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}

mysqli_close($con);
?>