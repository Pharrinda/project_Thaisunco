<?php
	session_start();
	include('condb.php');
	mysqli_set_charset($con,"utf8");


	// $dome_id = $_POST['dome_id'];
	$dome_name 	= $_POST['dome_name'];
	$dome_size 	= $_POST['dome_size'];
	$dome_price = $_POST['dome_price'];
	$dome_id 	= $_POST['dome_id'];
	// echo $dome_id."<br>";

	$sql = "UPDATE `dome_detail` SET `dome_name`='$dome_name',`dome_size`='$dome_size',`dome_price`='$dome_price' WHERE dome_id = '".$_SESSION['dome_id']."'";
// echo $sql;
	if ($result = mysqli_query($con, $sql)) {
		echo "<script>alert('NOTICE : แก้ไขข้อมูลโดมสำเร็จ');</script>";
	 	echo '<meta http-equiv= "refresh" content="0; url=add_dome.php"/>';
	}else {
		echo "<script>alert('NOTICE : การแก้ไขข้อมูลโดมไม่สำเร็จ');</script>";
		echo '<meta http-equiv= "refresh" content="0; url=update_dome.php"/>';
	}
	 
	//("Error in query: $sql " . mysqli_error());
		
	 	


?>
