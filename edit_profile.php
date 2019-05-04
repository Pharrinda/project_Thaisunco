<?php include('header.php'); ?>
<style type="text/css">
	body{
		font-family: 'Kanit', sans-serif;
		background-color: #f2f2f2;
	}
	#back{
		width: 80px;
	}
	#back:hover{
		background-color: black;
		color: white;
	}
	#edit_form ,h3{
		margin-top: -15px;
	}
	#edit_form ,p{
		font-size: 12px;
	}
	label{
		font-size: 14px;
	}
	hr{
		border-color: #a6a6a6; 
	}
	#confirm_update ,button{
		height: 45px;
	}
</style>
<?php
	session_start();

	include("condb.php");
	mysqli_set_charset($con,"utf8");
	if($_SESSION['username'] == "")
		{
			// echo "Please Login!";
			echo "<script>alert('กรุณาเข้าสู่ระบบ หรือ สมัครสมาชิก');window.location='index.php';</script>" ;
			exit();
		}


	$sql="SELECT * from user WHERE username = '".$_SESSION['username']."'";
	if ($result = mysqli_query($con, $sql)) {
		$row = mysqli_fetch_array($result); 
?>
<body>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-2">
			<button onclick="goBack()" class="form-control" id="back"><span class="glyphicon glyphicon-arrow-left"></span> กลับ</button>
		</div>
		<div class="col-md-8">
			<center><img id="logo_sun" src="img/logo_sun.png" class="img-responsive margin" width="250" height="150"></center>
			<br>
			
			<!-- form edit -->
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8" id="edit_form">
					<h3>แบบฟอร์มการแก้ไขข้อมูลของ <span style="color: #ffcc00; font-size: 30px;"><?php echo $_SESSION['username']; ?></span></h3>
					<p>โปรดแก้ไขข้อมูลล่าสุดของท่านเพื่อง่ายต่อการใช้บริการ และการแสดงความเป็นเจ้าของของบัญชีผู้ใช้นี้</p>
					<hr>
					<form action="update_form.php" method="post" >
						<div class="row" style="margin-top: 20px;">
								<div class="col-md-6">
									<label for="firstname">ชื่อ</label>
									<input class="form-control" type="text" name="firstname" id="firstname" value="<?php echo $row['firstname']; ?>" placeholder="ชื่อจริง.." >
									<!-- <div class="invalid-feedback">Valid first name is required.</div> -->
								</div>
								<div class="col-md-6">
									<label for="lastname">นามสกุล</label>
									<input class="form-control" type="text" name="lastname" id="lastname" value="<?php echo $row['lastname']; ?>" placeholder="นามสกุล.." >
									<!-- <div class="invalid-feedback">Valid first name is required.</div> -->
								</div>
							</div>
							<label for="username" style="margin-top: 10px;">ชื่อผู้ใช้</label>
							<input class="form-control" id="username" type="text" name="username" value="<?php echo $row['username']; ?>" onkeyup="check_char(this)" disabled>

							<label for="password" style="margin-top: 10px;">รหัสผ่าน</label>
							<input class="form-control" type="password" value="<?php echo $row['password']; ?>" name="password" id="password" onkeyup="check_char(this)">
							<p style="color: gray; font-size: 10px;">เป็นตัวเลข 0-9 ตัว ตัวอักษรพิมพ์เล็ก(a-z) และพิมพ์ใหญ่(A-Z) อย่างน้อย 6 ตัว</p>

							<label for="passwordCon" style="margin-top: -8px;">ยืนยันรหัสผ่าน</label>
							<input class="form-control" type="password" value="<?php echo $row['passwordCon']; ?>" name="passwordCon" id="passwordCon" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
							<div><span id='message' style="font-size: 10px;"></span></div>

							<div class="row">
								<div class="col-md-6">
									<label for="tel" style="margin-top: 10px;">เบอร์โทรศัพท์มือถือ</label>
									<input class="form-control" type="text" name="tel" id="tel" value="<?php echo $row['tel']; ?>" placeholder="0987654321" pattern="(?=.*[0-9]).{10,}" maxlength="10" onkeyup="check_char(this)">
									<p style="color: gray; font-size: 10px;">ต้องเป็นตัวเลข 0-9 และมีจำนวน 10 ตัวเท่านั้น</p>
								</div>
								<div class="col-md-6">
									<label for="email" style="margin-top: 10px;">อีเมล์</label>
									<input class="form-control" type="email" name="email" id="email" value="<?php echo $row['email']; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="example@gmail.com">
									<!-- <div class="invalid-feedback" style="width: 100%;"></div> -->
								</div>
							</div>
							
							<label for="address" style="margin-top: -8px;">ที่อยู่</label>
							<textarea class="form-control" type="text" name="address" id="address" rows="2" onkeyup="check_char(this)" ><?php echo $row['address']; ?></textarea>
	                        <br><!-- readonly -->
							<div id="confirm_update">
								<center><button class="btn btn-primary" type="submit">ยืนยันการแก้ไข</button></center>
							</div>
							<div style="margin-top: 10px;"></div>
					</form>
				</div>
				
				   
				<div class="col-md-2"></div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>
<br><br>
<?php
	}
	mysqli_close($con);
?>

<!-- script -->
<script type="text/javascript">
	function goBack(){
	window.history.back();
	}
</script>
<script type='text/javascript'>
function check_char(elm){
	if(!elm.value.match(/^[ก-ฮa-z0-9]+$/i) && elm.value.length>0){
		alert('ไม่สามารถใช้ตัวอักษรพิเศษได้');
		elm.value='';
	}
}
</script>
<script type="text/javascript">
    $('#password, #passwordCon').on('keyup', function () {
     if ($('#password').val() == $('#passwordCon').val()) {
       $('#message').html('รหัสผ่านตรงกัน').css('color', 'green');
     } else
       $('#message').html('รหัสผ่านไม่ตรงกัน โปรดกรอกใหม่ !').css('color', 'red');
   });
</script>