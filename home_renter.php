<?php 
	include('header.php');
	include('topbar_renter.php');
?>
<br><br><br>
<style type="text/css">
	body{
		font-family: 'kanit', sans-serif;
	}
</style>
<body>
	<?php 
		include('condb.php');

		// if () {
		// 	# code...
		// 	echo "<script>alert('ชื่อผู้ใช้ หรือ รหัสผ่านของคุณอาจไม่ถูกต้องกรุณาลองอีกครั้ง');window.location='index.php';</script>" ;
		// }

			mysqli_set_charset($con,"utf8");

			$no = 0;
			$sql = "SELECT * FROM `user` WHERE username = '".$_SESSION['username']."'";
			$ex = mysqli_query($con,$sql);
			$result = mysqli_query($con,$sql);
	?>
 	<div class="home1_all text-center">
 		<div class="container">
 			
 		</div>
 		<div class="row" style="margin-top: 35px; width: 1300px; height: 400px; background-color: #F9FFF7;">
 			<div class="col-md-3"></div>
 			<div class="col-md-6">
 				<br>
 				<br>
 				<br>
 				<br>
 				<br>

 				<h2 style="font-family: 'kanit', sans-serif;">สวัสดีสมาชิกใหม่ ยินดีต้อนรับ <?php echo $_SESSION['username']; ?></h2>      
				<p style="font-family: 'kanit', sans-serif; font-size: 16px;">หากท่านต้องการเช่า กรุณาคลิ๊กปุ่มด้านล่าง</p>
				<a href="page_rent.php">
					<button type="button" class="btn btn-primary form-control" style="width: 300px; height: 40px; margin-top:10px; border-radius: 8px; font-family: 'kanit', sans-serif; font-size: 18px;">
						เช่าโดม
					</button>
				</a>
 			</div>
 			<div class="col-md-3"></div>
 		</div>
 	</div>
<br>

<?php include('footer.php'); ?>