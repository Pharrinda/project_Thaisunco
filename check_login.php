<?php
	
	session_start();
	include('condb.php');

	$error=''; 
	if(isset($_POST['username'])){
		// echo $_POST['username'];
	 	if(empty($_POST['username']) || empty($_POST['password'])){
	 		//$error = "username or password is Invalid";
	 		// echo $error;
	 		//  $redirectUrl = 'index.php';
				// 	//echo "string";
			 // echo '<script type="application/javascript">alert($error); window.location.href = "'.$redirectUrl.'";</script>';
	 		//echo $error;
	 	}
	 	else
	 	{
			$username = $_POST['username'];
			$password = $_POST['password'];
			$password = md5($password);
	
			$sql = "SELECT * FROM user WHERE username='$username' AND password='$password' ";
			$objQuery = mysqli_query($con,$sql);
			$objResult_username = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

			// echo $sql;
			if(!$objResult_username){
				echo "<script>alert('ชื่อผู้ใช้ หรือ รหัสผ่านของคุณอาจไม่ถูกต้องกรุณาลองอีกครั้ง');window.location='index.php';</script>" ;
				exit();
			}
			else{
				if($objResult_username["username"] == " "){
					echo "<script>alert('บัญชีนี้ไม่มีอยู่จริง โปรดลองอีกครั้ง');window.location='index.php';</script>" ;
					exit();
				}
				else if($objResult_username["password"] != $password){
					echo "<script>alert('รหัสผ่านของท่านไม่ถูกต้อง');window.location='login_form.php';</script>" ;
			 	}
		
					$_SESSION["username"] = $objResult_username["username"];
            		$_SESSION["status"] = $objResult_username["status"];
				if($objResult_username["status"] == "renter")
				{
					///echo "Welcome Admin";
					// header("location:Home-02.php");
					$redirectUrl = 'home_renter.php';
					// 	//echo "string";
				   	echo '<script type="application/javascript">alert("เข้าสู่ระบบสำเร็จ"); window.location.href = "'.$redirectUrl.'";</script>';
				}
				else if($objResult_username["status"] == "owner")
				{
					///echo "Welcome User";
					// header("location:Home-02.php");
						$redirectUrl = 'home_owner.php';
						//echo "string";
				    	echo '<script type="application/javascript">alert("เข้าสู่ระบบสำเร็จ"); window.location.href = "'.$redirectUrl.'";</script>';
				}else if($objResult_username["status"] == "admin")
				{
					///echo "Welcome User";
					// header("location:Home-02.php");
						$redirectUrl = 'home_admin.php';
				    	echo '<script type="application/javascript">alert("เข้าสู่ระบบสำเร็จ"); window.location.href = "'.$redirectUrl.'";</script>';
				}
			}
		}
						
	}
	
	// echo "string";
?>