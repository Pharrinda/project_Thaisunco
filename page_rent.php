<?php 
	session_start(); 
	include('header.php');
	include('topbar_renter.php');
?>
<br>
<style type="text/css">
	body{
		font-family: 'Kanit', sans-serif;
	}
	#banana{
		background-image: url("img/Banana.jpg");
	}
	#chili{
		background-image: url("img/chili.PNG");
	}
 	.loading{
 		background-image: url("img/loader.gif");
 		background-repeat: no-repeat;
 		display: none;
 		height: 100px;
 		width: 100px;
 }
</style>
<?php
	include("condb.php");
	if($_SESSION['username'] == "")
		{
			echo "<script>alert('กรุณาเข้าสู่ระบบ หรือ สมัครสมาชิก');window.location='index.php';</script>" ;
			exit();
		}


	// $sql="SELECT * from user WHERE username = '".$_SESSION['username']."'";
	// if ($result = mysqli_query($con, $sql)) {
	// 	$row = mysqli_fetch_array($result); 
?>
<body>
	<div class="container" style="margin-top: 20px;">
		<div class="row" style="margin-top: 40px;">
			<div class="col-md-4" style="background-color: #f6f6f6; height: 650px;">
				<center><h2>เช่าโดม</h2>
				<p>กรอกข้อมูลเช่าให้ครบถ้วน.</p></center>
				<form action="save_rent.php" id="form-rent" method="post">
						<label for="rent_add"><span class="glyphicon glyphicon-map-marker"></span> สถานที่ :</label>
						
						<textarea class="form-control" type="text" name="rent_add" id="rent_add" rows="1" readonly></textarea>
						
						<label for="rent_size" style="margin-top: 10px;">ขนาดของโดม :</label>
						<!-- <input class="form-control" type="" name="rent_size" style="margin-top: 3px;" disabled> -->
						<?php  
							include("condb.php");
							mysqli_set_charset($con,"utf8");
							
							$_SESSION['dome_id'] = $_GET["id"];
							$_SESSION['status'] = $_GET['status'];
							// $sql = "SELECT * FROM dome_detail";
							$sql = "SELECT status,dome_id,dome_name,dome_size,dome_price FROM (user,dome_detail) WHERE status ='owner'";
							echo $sql;
							echo $_SESSION['status'];
							// echo $_SESSION['dome_id'];
							if ($result = mysqli_query($con, $sql)) {
								$rows = mysqli_fetch_array($result); 
									?>
							<select class="form-control" style="margin-top: 3px;" name="rent_size" id="rent_size">
							  	<option value=""> เลือกขนาดของโดม... </option>
							  	<option value="small" <?php if ($rows['dome_size']=='small') {
		      								echo 'selected';
		      							} ?>>ขนาดเล็ก (พพ.1)</option>
							  	<option value="mid" <?php if ($rows['dome_size']=='mid') {
		      								echo 'selected';
		      							} ?>>ขนาดกลาง (พพ.2)</option>
							  	<option value="large" <?php if ($rows['dome_size']=='large') {
		      								echo 'selected';
		      							} ?>>ขนาดใหญ่ (พพ.3)</option>
							</select>
						<?php } ?>
						<label for="rent_product_type" style="margin-top: 10px; margin-left: 10px;">ประเภทของอบแห้ง :</label>
						
							<select class="form-control" name="rent_product_type" style="margin-top: 3px;">
								<option value="">เลือก..</option>
								<option value="banana">กล้วย</option>
								<option value="chili">พริก</option>
							</select>
						<label for="rent_start" style="margin-top: 10px;">เริ่มเช่า</label>
							<input class="form-control" type="date" name="rent_start" style="margin-top: 3px;">
						<!-- </dd> -->
						<div class="row">
							<div class="col-md-9">
								<label for="rent_end" style="margin-top: 10px;">สิ้นสุดการเช่า</label>
									<input class="form-control" type="date" name="rent_end" style="margin-top: 3px;">
							</div>
							<div class="col-md-3">
								<label style="margin-top: 10px;">จำนวนวัน</label>
									<input class="form-control" name="number-date-rent" style="margin-top: 3px;" disabled>
							</div>
						</div>
						<label for="rent_price" style="margin-top: 10px;">จำนวนเงินรวม</label>
							<input class="form-control" type="text" name="rent_price" style="margin-top: 3px;" disabled>

							<center>
								<button type="submit" class="btn btn-default form-control" style="background: #009AFF; color: #fff; width: 300px; height: 40px; margin-top: 25px;">
									<b>ยืนยันการเช่าโดม</b>
								</button>
							</center>
				</form>
				
			</div>

	<!-- #################################################### Search ###################################################### -->

			<div class="col-md-8">

				<!-- <img src="img/1.jpg" class="img-responsive margin" style="height: 650px; width: 780px;"> -->
				<div class="">
					<div class="">
						<div class="panel panel-default">
						  	<div class="panel-heading"><label style="font-size: 18px;">ค้นหาโดมที่ต้องการ</label></div>
						  	<div class="panel-body">
						    	<form class="form-inline" name="searchform" id="searchform" method="get" action="page_rent.php">
                        			<div class="form-group">
                        				<font style="margin-top: 8px;">จังหวัด</font>
	  									<select class="form-control" id="province" name="province_search">
	  										<option value="">-- เลือกจังหวัด --</option>
	  									</select>
									</div>
	                        		<button type="submit" class="btn btn-primary" id="btnSearch">
 										<span class="glyphicon glyphicon-search"></span>
 											ค้นหา
 									</button>
								</form>
                        	</div>
						</div>
						 	<!-- <div class="loading"></div>
							<div class="row" id="list-data" style="margin-top: 10px;">
								
							</div> -->
					</div>
					
						
					</div>
					<?php 
if($_GET['province_search'] || $_GET['amphur_seach']){
	?>
	<!-- <div class="container"> -->
		
	<div class="row">
	    <!-- Start col s12 m12 l8 -->
	    <div class="col s12 m12 l8" style="padding-left: 10px;">
	        <div class="card">
	            <!-- <div class="card-title">คำค้น : <?php echo $search ?></div> -->
	            <table class="table table-bordered">
	            	<thead>
				 		<tr> 
				 			<!-- <th>ชื่อเจ้าของโดม</th> -->
				 			<th style="text-align: center;">ขื่อโดม</th>
				 			<th style="text-align: center;">ขนาดของโดม</th>
				 			<th style="text-align: center;">ราคาของโดม</th>
				 			<th style="text-align: center;">ที่ตั้งของโดม</th>
				 			<th style="text-align: center;"></th>
				 		</tr>
			 		</thead>
            		<?php
						include('condb.php');
						mysqli_set_charset($con, 'utf8');

     					$province_search = $_REQUEST['province_search'];
     					// $amphur_seach = $_REQUEST['amphur_seach'];

						$sql = "SELECT dome_id,dome_name,house_number,dome_size,dome_price,dome_img,PROVINCE_NAME,AMPHUR_NAME,DISTRICT_NAME FROM dome_detail,province,amphur,district WHERE (dome_detail.PROVINCE_ID = province.PROVINCE_ID) AND (dome_detail.AMPHUR_ID = amphur.AMPHUR_ID) AND (dome_detail.DISTRICT_ID = district.DISTRICT_ID) AND province.PROVINCE_ID LIKE '%".$province_search."%'";

						$result = mysqli_query($con,$sql);

						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
						?>
						<tr>
							<!-- <td><?php //echo $row['result']; ?></td> <input class="form-control" value="<?php //echo $row['dome_size']; ?>" readonly>-->
							<form name="register_complaint" id="register_complaint_frm"> 
							<td style="text-align: center;"><?php echo $row['dome_name']; ?></td>
							<td style="text-align: center;">
								<?php 
									if ($row['dome_size'] == "small") {
										# code...
										echo "ขนาดเล็ก (พพ.1)";
									}
									if ($row['dome_size'] == "mid") {
										# code...
										echo "ขนาดกลาง (พพ.2)";
									}
									if ($row['dome_size'] == "large") {
										# code...
										echo "ขนาดใหญ่ (พพ.3)";
									}

								?>
							</td>
							<td style="text-align: center;"><?php echo $row['dome_price']; ?></td>
							<td style="text-align: center;"><input class="form-control" type="" name="" value="<?php echo $btn_search = $row['house_number'] ." ".$row['DISTRICT_NAME']." ".$row['AMPHUR_NAME']." ".$row['PROVINCE_NAME']; ?>" readonly
								size="35">

								<!-- <input type="hidden" name="add_search" id="add_search" value="<?php //echo($btn_search); ?>"> -->
							</td>
							<td>
								<button type="button" class="btn btn-primary" id="plus_search" onclick="showFormData(this.form);">
									<span class="glyphicon glyphicon-plus"></span>	
								</button>
							</td>
							</form>
						</tr>
						<?php
					    	}

						} else {
						?>
							<h5 style="color: #42729B padding-top:50px; padding-bottom: 50px;" align="center">ไม่พบข้อมูลที่คุณต้องการค้นหา</h5>
							<?php
								}
							?>
            	</table>
           	</div>
        </div>
    </div>

<?php
	}
?>
			</div>
		</div>
	</div> <!-- close container-->
<!-- #################################################### END Search ###################################################### -->	
<br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="AutoProvince.js"></script>
<script>
	$('body').AutoProvince({
		PROVINCE:		'#province', // select div สำหรับรายชื่อจังหวัด
		AMPHUR:			'#amphur', // select div สำหรับรายชื่ออำเภอ
		DISTRICT:		'#district', // select div สำหรับรายชื่อตำบล
		POSTCODE:		'#postcode', // input field สำหรับรายชื่อรหัสไปรษณีย์
		arrangeByName:		false // กำหนดให้เรียงตามตัวอักษร
	});
</script>
<script>
	$(document).ready(function(){
    	$("#plus_search").click(function(){
	        document.getElementById('rent_add').innerHTML = document.getElementById('add_search').value;
    	});
	});
</script>
<script type="text/javascript">
		function showFormData(oForm) {
		   document.getElementById('rent_add').value = oForm.elements[0].value;
		   document.getElementById('rent_size').value = oForm.elements[0].value;
		}

</script>
<!-- <script type="text/javascript" src="jquery-1.11.2.min.js"></script>
<script type="text/javascript">
 	$(function () {
	 	$("#btnSearch").click(function () {
		 	$.ajax({
		 		url: "search.php",
		 		type: "post",
		 		data: {province_search: $("#province").val()},
		 		beforeSend: function () {
		 			$(".loading").show();
		 		},
		 		complete: function () {
		 			$(".loading").hide();
		 		},
		 		success: function (data) {
		 			$("#list-data").html(data);
		 		}
		 	});
	 	});
	 	$("#searchform").on("keyup keypress",function(e){
	 		var code = e.keycode || e.which;
	 		if(code==13){
	 			$("#btnSearch").click();
	 			return false;
	 		}
	 	});
	});
</script> -->




<?php include('footer.php'); ?>