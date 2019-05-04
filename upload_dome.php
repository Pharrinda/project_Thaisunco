<?php
	session_start();
	include('condb.php');

	//$dome_file_pic = $_POST["dome_file_pic"];
	$dome_price = $_POST["dome_price"];
	$dome_size = $_POST["dome_size"];

	//echo $dome_file_pic;
	echo "string"."<br>";
	echo $dome_price."<br>";
	echo $dome_size."<br>";

	$sql = "INSERT INTO `add_dome`(`dome_no`, `dome_file_pic`, `dome_size`, `dome_price`, `rent_no`) VALUES (null,'$dome_file_pic',$dome_price,$dome_size,null)";
	mysqli_query($con, $sql);



echo "\$_FILES[\"dome_file_pic\"][\"name\"] = ".$_FILES["dome_file_pic"]["name"]."<br>";
echo "\$_FILES[\"dome_file_pic\"][\"type\"] = ".$_FILES["dome_file_pic"]["type"]."<br>";
echo "\$_FILES[\"dome_file_pic\"][\"size\"] = ".$_FILES["dome_file_pic"]["size"]."<br>";
echo "\$_FILES[\"dome_file_pic\"][\"tmp_name\"] = ".$_FILES["dome_file_pic"]["tmp_name"]."<br>";
echo "\$_FILES[\"dome_file_pic\"][\"error\"] = ".$_FILES["dome_file_pic"]["error"]."<br>";

if(move_uploaded_file($_FILES["dome_file_pic"]["tmp_name"],"../img/".$_FILES["dome_file_pic"]["name"])) // Upload/Copy
{
	echo "Copy/Upload Complete.";
}

	
$con->close();

?>
