<?php 
	session_start();
	include('header.php'); 
	include('topbar_owner.php');
?>

<br><br><br><br>
<style type="text/css">
	body{
		font-family: 'Kanit', sans-serif;
	}
	table {
  		border-collapse: collapse;
	  	border-spacing: 0;
	  	width: 100%;
	  	border: 1px solid #ddd;
	}

	th, td {
  		text-align: center;
  		padding: 8px;
	}

	#address_dome ,select{
		margin-top: -5px;
	}
	#house_number{
		margin-top: -5px;
	}
	#size_dome{
		margin-top: 2px;
	}

</style>
<body>
	<div class="container">

		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
		  	<span class="glyphicon glyphicon-plus"></span> เพิ่มโดมของคุณ
		</button>

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
		      		<div class="modal-header">
		        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        		<h3 class="modal-title" id="myModalLabel">แบบฟอร์มการเพิ่มโดม</h3>
		      		</div>

<!---_________________________________________________  ฟอร์มเพิ่มโดม  ______________________________________________--->

		      		<form action="save_add_dome.php" method="post" enctype="multipart/form-data" id="add_dome" name="form1">
			      		<div class="modal-body">
<!-- ################## img dome ################## -->
		      				<label for="dome_img">เพิ่มรูปโดมของคุณ</label>
		      				<input class="" type="file" name="dome_img" id="img_dome" required>

<!-- ################## ชื่อโดม ################## -->
							<label for="dome_name" style="margin-top: 20px;">ชื่อโดม</label>
	  						<input class="form-control" type="text" name="dome_name" id="name_dome" placeholder="ขนาดเล็กหลังที่ 1" required>

<!-- ############## ที่อยู่ของโดม ############## -->

	  						<label for="dome_address" style="margin-top: 20px;">ที่อยู่ของโดม</label>
	  						<p style="margin-top: 8px;">บ้านเลขที่</p>
	  						<input type="text" name="house_number" class="form-control">

	  						<div class="row" id="address_dome">

	  							<div class="col-md-4 ">
	  								<div class="form-group" >
	  									<p style="margin-top: 8px;">จังหวัด</p>
	  									<select class="form-control" id="province" name="PROVINCE_ID">
	  										<option value="">-- เลือกจังหวัด --</option>
	  										
	  									</select>
	  								</div>
	  							</div>

	  							<div class="col-md-4">
	  								<div class="form-group">
	  									<p style="margin-top: 8px;">อำเภอ</p>
		  								<select class="form-control" id="amphur" name="AMPHUR_ID">
		  									<option value="">-- เลือก --</option>
		  								</select>
	  								</div>
	  							</div>

	  							<div class="col-md-4">
	  								<div class="form-group">
	  									<p style="margin-top: 8px;">ตำบล</p>
		  								<select class="form-control" id="district" name="DISTRICT_ID">
		  									<option value="">-- เลือก --</option>
		  								</select>
	  								</div>
	  							</div>
	  						</div>

                                 <!--  -->
                        
<!-- ######################### ขนาดของโดม ######################### -->
		      				<div class="row">
		      					<div class="col-md-6">
		      						<label for="dome_size" style="margin-top: 25px;">ขนาดโดมอบแห้ง</label>
		      						<select id="size_dome" name="dome_size" class="form-control" required>
		      							<option value="#">--- เลือกขนาดโดม --- </option>
		      							<option value="small">ขนาดเล็ก (พพ.1)</option>
		      							<option value="mid">ขนาดกลาง (พพ.2)</option>
		      							<option value="large">ขนาดใหญ่ (พพ.3)</option>
		      						</select>	
		      					</div>
		
<!-- ######################### ราคาโดม ######################### -->
		      					<div class="col-md-6">
		      						<label for="dome_price" style="margin-top: 25px;">ราคาของโดมต่อวัน</label>
		      						<div class="input-group">
		      							<span class="input-group-addon">ราคา</span>
		      							<input type="text" name="dome_price" id="price_dome" class="form-control" required>
		      							<span class="input-group-addon"> บาท</span>
		      						</div>
		      					</div>
		      				</div>
			      		</div>
			      		<div class="modal-footer">
			        		<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
			        		<button type="submit" class="btn btn-primary">ยืนยันการเพิ่มโดม</button>
			      		</div>
		      		</form>	
		    	</div>
		  	</div>
		</div>
		<br><br>

<!---______________________________________________  แสดงโดม  _________________________________________________--->

	<div style="overflow-x:auto;">
		<?php

			include ('condb.php');
			mysqli_set_charset($con,"utf8");

			$no = 0;
			// $sql = "SELECT * FROM `dome_detail` INNER JOIN (province,amphur,district) ON dome_detail.PROVINCE_ID = province.PROVINCE_ID AND dome_detail.dome_id = amphur.AMPHUR_ID AND dome_detail.dome_id = district.DISTRICT_ID WHERE username = '".$_SESSION['username']."'";
			// echo $sql;
			$sql = "SELECT dome_id,username,dome_name,house_number,dome_size,dome_price,dome_img,PROVINCE_NAME,AMPHUR_NAME,DISTRICT_NAME FROM dome_detail,province,amphur,district WHERE (dome_detail.PROVINCE_ID = province.PROVINCE_ID) AND (dome_detail.AMPHUR_ID = amphur.AMPHUR_ID) AND (dome_detail.DISTRICT_ID = district.DISTRICT_ID) AND (username = '".$_SESSION['username']."') ORDER BY PROVINCE_NAME ASC";
			$ex = mysqli_query($con,$sql);
			$result = mysqli_query($con,$sql);

			$show = "<table class=table-bordered width=900 cellpadding=4 align=center border>";
			$show .= "<tr bgcolor=#ffcc00 align=center height=50>
				
				<td><b><font color=#000>ชื่อโดม</b></td>
				<td><b><font color=#000>ขนาดของโดม</b></td>
				<td><b><font color=#000>ราคาต่อวัน</b></td>
				<td><b><font color=#000>รูปโดม</b></td>
				<td><b><font color=#000>ที่อยู่โดม</b></td>
				<td><b><font color=#000> แก้ไขข้อมูล</b></td>
				<td><b><font color=#000> ลบ</b></td>
				</tr>";
				while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
					// $show .= "<td align=center height=40>$row[dome_id]</td>";
					$show .= "<td align=center height=40> $row[dome_name] </td>";
					$show .= "<td align=center height=40> $row[dome_size] </td>";
					$show .= "<td align=center height=40> $row[dome_price] </td>";
					$show .= "<td align=center height=40><img class=img-responsive src =upload/$row[dome_img] width=100 height=100></td>";

					$show .= "<td align=center height=40>$row[house_number]<br>$row[DISTRICT_NAME]&nbsp; $row[AMPHUR_NAME]&nbsp; $row[PROVINCE_NAME] </td>";
					$show .= "<td align=center height=40>
								<button class=form-control style=background-color:#008000>
									<a href=update_dome.php?id=$row[dome_id] style=color:#fff>แก้ไข</a>
								</button>
							</td>";
					$show .= "<td align=center height=40>
								<button class=form-control style=background-color:red>
									<a href=deldetail.php?id=$row[dome_id] style=color:#fff onclick=\"return confirm('ยืนยันการลบข้อมูล?')\">ลบ</a>
								</button>
							</td>";
					$show .= "</tr>";
				}
				$show .= "</table>";
				echo $show;

				mysqli_close($con);

				if($_SERVER["REQUEST_METHOD"] == "POST"){
					$dome_name = $_POST["dome_name"];
					$sql = "INSERT INTO dome_detail (dome_id,dome_name) values ('','$dome_name')";
			
					if (mysqli_query($con, $sql)) {
						echo "<script>alert('NOTICE : เพิ่มโดมใหม่สำเร็จ');</script>" ;
					} else {
						echo "Error: " . $sql . "<br>" . mysqli_error($con);
					}

				}

			?>

		</div>
	</div>

<br><br><br><br><br><br><br><br><br><br>

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
<?php include('footer.php'); ?>
