<?php 
	session_start();
	include('header.php');
	include('topbar_owner.php');
?>
<style type="text/css">
	body{
		
		font-family: 'Kanit', sans-serif;
	
	}
	#back{
		width: 100px;
		height: 40px;
		margin-top:25px;
		color: #000;
		background-color: #fff;
		border-radius: 5px;
	}
	#back:hover{
		background-color: red;
		color: #fff;
	}
	#confirm_edit_dome-btn{
		background-color: #337AB7;
		border-radius: 5px;
		/*border-color: #3377ff;*/
		color: #000;
	}
	#confirm_edit_dome-btn:hover{
		background-color: #000066;
		color: #fff;
	}

</style>
<br><br><br>
<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<center>
				<img id="logo_sun" src="img/logo_sun.png" class="img-responsive margin" width="250" height="150">
			</center>

			<!-- form edit -->
			<?php
				include("condb.php");
				mysqli_set_charset($con,"utf8");
				
				$_SESSION['dome_id'] = $_GET["id"];
				$sql = "SELECT * FROM dome_detail where dome_id = '".$_SESSION['dome_id']."'";
				// echo $sql;
				// echo $d_id;
				if ($result = mysqli_query($con, $sql)) {
					$rows = mysqli_fetch_array($result); 
			?>
			<div class="row" style="margin-top: -40px;">
			 	<div class="col-md-2"></div>
			 		<div class="col-md-8" id="edit_form">
			 			<h3>แบบฟอร์มการแก้ไขข้อมูลโดม</h3>
			 			<p>โปรดแก้ไขข้อมูลล่าสุดของท่านเพื่อง่ายต่อการใช้บริการ และการแสดงความเป็นเจ้าของของบัญชีผู้ใช้นี้</p>
			 			<hr>
			 			<form action="update_dome2.php" method="POST" enctype="multipart/form-data">
							<label for="dome_name" style="margin-top: 20px;">ชื่อโดม</label>
							<input class="form-control" type="text" name="dome_name" id="name_dome" placeholder="ขนาดเล็กหลังที่ 1" value="<?php echo $rows['dome_name']; ?>" required>
							<div class="row">
			 	      			<div class="col-md-6">
		      						<label for="dome_size" style="margin-top: 10px;">ขนาดโดมอบแห้ง</label>
		      						<select id="size_dome" name="dome_size" class="form-control" required>
		      							 <option value="#">--- เลือกขนาดโดม ---</option>
		      							<option value="small"<?php if ($rows['dome_size']=='small') {
		      								echo 'selected';
		      							} ?>>ขนาดเล็ก (พพ.1)</option>
		      							<option value="mid"<?php if ($rows['dome_size']=='mid') {
		      								echo 'selected';
		      							} ?>>ขนาดกลาง (พพ.2)</option>
		      							<option value="large"<?php if ($rows['dome_size']=='large') {
		      								echo 'selected';
		      							} ?>>ขนาดใหญ่ (พพ.3)</option> 

		      								
		      						</select>	
			 	      			</div>
			 	      			<div class="col-md-6">
			 	      				<label for="dome_price" style="margin-top: 10px;">ราคาของโดม</label>
		      						<div class="input-group">
		      							<span class="input-group-addon">ราคา</span>
		      							<input type="text" name="dome_price" id="price_dome" class="form-control" value="<?php echo $rows['dome_price']; ?>" required>
		      							<span class="input-group-addon"> บาท</span>
		      						</div>
			 	      			</div>
			 	      		</div>
			 	      		<div class="row">
			 	      			<div class="col-md-6">
			 	      				<button id="back" onclick="goBack()" type="button" class="form-control" style="width:100px; height: 40px; margin-top: 35px;">ยกเลิก</button>
			 	      			</div>
			 	      			<div class="col-md-6">
			 	      				
				 	        			<button id="confirm_edit_dome-btn" type="submit" class="form-control" style="width:150px; height: 40px; margin-top: 35px; margin-left: 35%;">ยืนยันการแก้ไขโดม</button>
				 						<input type="hidden" name="dome_id" value="'.$_SESSION['dome_id'].'">
				 	        			
			 	      			</div>
			 	      		</div>
		 	        		
			 			</form>
				 	</div>
				<div class="col-md-2"></div>
			</div>
			<?php
				}
				mysqli_close($con);
			?>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>
<br><br><br>

<script type="text/javascript">
	function goBack(){
		window.history.back();
	}
</script>

<?php include('footer.php'); ?>