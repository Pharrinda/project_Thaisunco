<?php  
	include('condb.php');
	session_start();


	$name = $_GET['username'];


	//echo $id;
	$sql = "DELETE FROM user WHERE username='$name'";
	$ex = mysqli_query($con,$sql);

	if($ex){
	echo "<meta http-equiv='refresh' content='0; url=manage_member.php'>";
	} else {
	echo "<h3>ไม่สามารถลบข้อมูลประเภทสินค้านี้ได้</h3>";
	}

	mysqli_close($con);
?>