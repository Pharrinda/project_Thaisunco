<?php  
	include('condb.php');
	session_start();


	$id = $_GET['id'];


	//echo $id;
	$sql = "DELETE FROM dome_detail WHERE dome_id='$id'";
	$ex = mysqli_query($con,$sql);

	if($ex){
	echo "<meta http-equiv='refresh' content='0; url=add_dome.php'>";
	} else {
	echo "<h3>ไม่สามารถลบข้อมูลประเภทสินค้านี้ได้</h3>";
	}

	mysqli_close($con);
?>