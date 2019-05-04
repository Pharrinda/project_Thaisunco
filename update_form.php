<?php
session_start();

include("condb.php");
mysqli_set_charset($con,"utf8");


$sql = "UPDATE user SET firstname  ='".$_REQUEST["firstname"]."', 
                        lastname   ='".$_REQUEST["lastname"]."', 
                        email    ='".$_REQUEST["email"]."', 
                        password    ='".md5($_REQUEST["password"])."', 
						tel    ='".$_REQUEST["tel"]."' WHERE username='".$_SESSION["username"]."'";

	// if (mysqli_query($con, $sql)){
	// 	echo "Done: แก้ไขข้อมูลของท่านเรียบร้อยแล้ว";
	// }else{
	// 	echo "Failed: " . mysqli_error($con);
	// }
	mysqli_close($con);

	if($_SESSION["status"] == "owner"){ 
		echo "<script>alert('แก้ไขข้อมูลเรียบร้อย');window.location='home_owner.php';</script>" ;
	    // header("location:home_owner.php"); 

	}else if($_SESSION["status"] == "renter"){ 
		echo "<script>alert('แก้ไขข้อมูลเรียบร้อย');window.location='home_renter.php';</script>" ; 
	    // header("location:home_renter.php"); 
	}
?>
