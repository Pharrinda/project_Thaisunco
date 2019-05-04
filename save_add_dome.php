<?php
	session_start();
	include ("condb.php");

	mysqli_set_charset($con,"utf8");
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	date_default_timezone_set('Asia/Bangkok');
	$date1 = date("Ymd_His");
	$numrand = (mt_rand());

	// $pID = $_POST["pID"];
	$dome_name = $_POST["dome_name"];
	$dome_size = $_POST["dome_size"];
	$dome_price = $_POST["dome_price"];
	$house_number = $_POST["house_number"];
	$PROVINCE_ID = $_POST["PROVINCE_ID"];
	$AMPHUR_ID = $_POST["AMPHUR_ID"];
	$DISTRICT_ID = $_POST["DISTRICT_ID"];
	// $price = $_POST["pprice"];
	// $pamount = $_POST["pamount"];
	$dome_img =  (isset($_POST['dome_img']) ? $_POST['dome_img'] : '');

	$upload=$_FILES['dome_img'];
		if($upload > '') {

		    //โฟลเดอร์ที่เก็บไฟล์
		    $path="upload/";
		    //ตัวขื่อกับนามสกุลภาพออกจากกัน
		    $type = strrchr($_FILES['dome_img']['name'],".");
		    //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
		    $newname =$numrand.$date1.$type;

		    $path_copy=$path.$newname;
		    $path_link="upload/".$newname;
		    //คัดลอกไฟล์ไปยังโฟลเดอร์
		    move_uploaded_file($_FILES['dome_img']['tmp_name'],$path_copy);

		}
       

	if ($dome_name === ""){
		echo "<script>alert('NOTICE : กรุณากรอกชื่อสินค้า');</script>" ;
		exit();
	}
	else if ($dome_size === "") {
		echo "<script>alert('NOTICE : กรุณาเลือกขนาดของโดม');</script>" ;
		exit();
	}
	// else if (empty($detail)){
	// echo "<script>alert('NOTICE : กรุณากรอกรายละเอียดของสินค้า') ;</script>" ;
	// exit();
	// }
	else if ($dome_price === "") {
		echo "<script>alert('NOTICE : กรุณากรอกราคาของโดม');</script>" ;
		exit();
	}
	// else if ($pamount == ""){
	// echo "<script>alert('NOTICE : กรุณากรอกจำนวนสินค้า');</script>" ;
	// exit();
	// }
	else if ($upload === ""){
		echo "<script>alert('NOTICE : กรุณาเลือกรูปภาพโดมของท่าน');</script>" ;
		exit();
	}

	$user_test = $_SESSION['username'];
	$dome_id = $_SESSION['dome_id'];
	// echo $user_test;
	// echo $_SESSION['username'];
	$sql = "INSERT INTO dome_detail(dome_img,dome_name,house_number, dome_size, dome_price,PROVINCE_ID,AMPHUR_ID,DISTRICT_ID,username) VALUES('$newname','$dome_name','$house_number', '$dome_size' ,'$dome_price','$PROVINCE_ID','$AMPHUR_ID','$DISTRICT_ID', '$user_test')";
	// echo $sql;
	if (mysqli_query($con, $sql)) {
		echo "<script>alert('NOTICE : เพิ่มโดมใหม่สำเร็จ');</script>" ;
		echo  "<meta http-equiv=\"refresh\" content=\"0; URL= https://www.thaisunco.com/add_dome.php\">";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($con);
		echo  "<meta http-equiv=\"refresh\" content=\"0; URL= https://www.thaisunco.com/add_dome.php\">";
		}
	}


?>
