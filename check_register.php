<?php 
	session_start();
	include('condb.php');

		

		$username 	= $_POST["username"];
		$firstname 	= $_POST["firstname"];
		$lastname 	= $_POST["lastname"];
		$password 	= $_POST["password"];
		$tel 		= $_POST["tel"];
		$email 		= $_POST["email"];
		$address 	= $_POST["address"];
		$status 	= $_POST["status"];

//#######################################################


		$password = md5($password);
	
		$sql_query = "SELECT username FROM user WHERE username = '$username'";
		if ($result = mysqli_query($con, $sql_query)) {
			
			$count = 0;
			while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
				$count++;

			}
				if ($count === 0) {

					$sql = "INSERT INTO `user`( `username`, `firstname`, `lastname`, `password`, `tel`, `email`, `address`, `status`, `rent_no`) VALUES('$username','$firstname','$lastname','$password','$tel','$email','$address','$status','null')";

					if (mysqli_query($con,$sql)) {
						$_SESSION['username'] 	= 	$username;
						$_SESSION['status'] 	=	$status;

						if ($_SESSION['status'] === "renter") {
							# code...
							$redirectUrl = 'home_renter.php';
							echo '<script type="application/javascript">alert("สมัครสมาชิกสำเร็จ"); window.location.href = "'.$redirectUrl.'";</script>';
						}elseif ($_SESSION['status'] === "owner") {
							# code...
							$redirectUrl = 'home_owner.php';
							echo '<script type="application/javascript">alert("สมัครสมาชิกสำเร็จ"); window.location.href = "'.$redirectUrl.'";</script>';
						}
					}else{
						$redirectUrl = 'register_form.php';
						echo '<script>alert("สมัครสมาชิกไม่สำเร็จ โปรดลองใหม่อีกครี้ง");window.location.href="'.$redirectUrl.'"</script>';
					}
					

				}
				else if ($count === 1) {
					// $redirectUrl = 'register_form.php';
					// echo '<script>alert("ชื่อผู้ใช้ มีแล้ว โปรดลองใหม่อีกครี้ง");window.location.href="'.$redirectUrl.'"</script>';
					header("Location:duplicate_username.php");
					exit();
				}
			}else{
				echo "Error: " . $sql_query . "<br>" . $con->error;
			}


mysqli_close($con);
?>	