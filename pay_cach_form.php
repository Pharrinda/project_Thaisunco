<?php 
include("condb.php");

	//print_r($_POST);
	//print_r($_FILES);


			$strSQL2_order = "SELECT * FROM orders ORDER BY OrderID DESC LIMIT 1";
			$objQuery2_order = mysqli_query($con,$strSQL2_order);
			$objResult2_order = mysqli_fetch_array($objQuery2_order);
		
		$sql_inputDB = $objResult2_order['OrderID'];

		$sql_inputDB2 = "INSERT INTO pay_money(sql_inputDB)
	    				 VALUES ($sql_inputDB)";

		
		if(!$objQuery2_order)
	{
		echo $con->error;
		exit();
	} 
	

	if($_SERVER["REQUEST_METHOD"] == "POST"){
	date_default_timezone_set('Asia/Bangkok');
	$date1 = date("Ymd_His");
	$numrand = (mt_rand());

		//$OrderID = $_POST["OrderID"];
		$pay_time = $_POST["pay_time"];
		$pay_date = $_POST["pay_date"];
		$pay_mon = $_POST['pay_mon'];
		$pay_bank = $_POST['pay_bank'];

	
	
	if(isset($_POST['submit'])){
		$upload = $_FILES['pay_pic']['name'];
		
			$path = "upload/";
			$ty = strrchr($upload,".");
			$newname = $upload;
			$path_copy = $path.$newname;
			$path_link = "images/".$newname;
			///move_uploaded_file($_FILES["pay_pic"]["tmp_name"],$path_copy);
		
  }

  if ($pay_time == ""){
	echo "<script>alert('NOTICE : กรุณากรอกเวลาในการโอนเงิน');</script>" ;
	exit();
	} 
	else if ($pay_date == "") {
	echo "<script>alert('NOTICE : กรุณากรอกวันที่การโอนเงิน');</script>" ;
	exit();
	} 
	else if (empty($pay_mon)){
	echo "<script>alert('NOTICE : กรุณากรอกจำนวนเงินที่โอน') ;</script>" ;
	exit();
	} 
	else if ($pay_bank == "") {
	echo "<script>alert('NOTICE : กรุณาเลือกธนาคาร');</script>" ;
	exit();
	}else if ($upload == ""){
	echo "<script>alert('NOTICE : กรุณาเลือกรูปภาพ');</script>" ;
	exit();
	}

	$sql = "INSERT INTO pay_money (pay_bank,pay_date,pay_time,pay_mon,pay_pic,OrderID) 
				VALUES ($pay_bank,'$pay_date','$pay_time',$pay_mon,'$path_link',$sql_inputDB)";	

	if (mysqli_query($con, $sql)) {
		echo "<script>alert('NOTICE : ท่านชำระเงินเรียบร้อยแล้ว');</script>" ;
		//echo  "<meta http-equiv=\"refresh\" content=\"0; URL= http://localhost/fashe-colorlib/Home-02-admin.php\">";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($con);
		//echo  "<meta http-equiv=\"refresh\" content=\"0; URL= http://localhost/fashe-colorlib/payment.php\">";
		}
			//mysqli_close($connect);	
}

$status_pay = "Pay";

$sql_status = "UPDATE status_order SET status  ='".$status_pay."'
						WHERE orderID ='".$sql_inputDB."'";
						
if (mysqli_query($con, $sql_status)){
	///echo "Done: Updaing the record";
	header("location:product.php");
}else{
	echo "Failed: " . mysqli_error($con);
mysqli_close($con);	}					


						
 ?>
