<?php  
	session_start();
	include('condb.php');

	

	mysqli_set_charset($con,"utf8");
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	date_default_timezone_set('Asia/Bangkok');
	$date9 = date("Ymd_His");
	$numrand_ran = (mt_rand());

	// $pID = $_POST["pID"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$tel = $_POST["tel"];
	$name_bank = $_POST["name_bank"];
	$pay_total = $_POST["pay_total"];
	$pay_date = $_POST["pay_date"];
	$pay_time = $_POST["pay_time"];
	// $price = $_POST["pprice"];
	// $pamount = $_POST["pamount"];
	$pay_img =  (isset($_POST['pay_img']) ? $_POST['pay_img'] : '');

	$upload=$_FILES['pay_img'];
		if($upload > '') {

		    //โฟลเดอร์ที่เก็บไฟล์
		    $path="upload/";
		    //ตัวขื่อกับนามสกุลภาพออกจากกัน
		    $type = strrchr($_FILES['pay_img']['name'],".");
		    //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
		    $newname =$numrand.$date1.$type;
		    echo $newname;
		    $path_copy=$path.$newname;
		    $path_link="upload/".$newname;
		    //คัดลอกไฟล์ไปยังโฟลเดอร์
		    move_uploaded_file($_FILES['pay_img']['tmp_name'],$path_copy);

		}

	$username_send = $_SESSION["username"];
	// $username_insert = $_SESSION["username"];

	 // echo $username_send;
	 $sql = "INSERT INTO `payment`(`pay_img`,`pay_no`, `firstname`, `lastname`, `tel`, `name_bank`, `pay_total`, `pay_date`, `pay_time`,`username`, `rent_no`) VALUES (`$newname`,`null`, `$firstname`, `$lastname`, `$tel`, `$name_bank`, `$pay_total`, `$pay_date`, `$pay_time`, `$username_send`, `$rent_no`)";

	  // echo $sql;
	//$objQuery = mysqli_query($con,$sql);

	if ($con->query($sql) === TRUE) {
  //   	echo "New record created successfully";
  //   	header("Location:pay_home.php");
		// exit();
		$redirectUrl = 'home_renter.php';
		echo '<script type="application/javascript">alert("ยืนยันการชำระเงินเรียบร้อย รอการตรวจสอบ!"); window.location.href = "'.$redirectUrl.'";</script>';
	} else {
    	echo "Error: " . $sql . "<br>" . $con->error;
	}
}
// mysqli_close($con);
?>