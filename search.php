<?php 
	session_start(); 
	include('header.php');
	include('topbar_renter.php');
?>
<br><br><br>
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
<body>
	<div class="container">
		
	<div class="row">
    	<!-- Start col s12 m12 l8 -->
    	<div class="col s12 m12 l8" style="padding-left: 55px;">
        	<div class="card">
            	<!-- <div class="card-title">คำค้น : <?php echo $search ?></div> -->
            	<table class="table table-bordered">
            		<thead>
			 			<tr> 
			 				<!-- <th>ชื่อเจ้าของโดม</th> -->
			 				<th>ขื่อโดม</th>
			 				<th>ขนาดของโดม</th>
			 				<th>ราคาของโดม</th>
			 				<th>ที่ตั้งของโดม</th>
			 				<th></th>
			 			</tr>
		 			</thead>
            		<?php
						include('condb.php');
						mysqli_set_charset($con, 'utf8');

     					$province_search = $_POST['province_search'];
     					$amphur_seach = $_POST['amphur_seach'];

						$sql = "SELECT dome_id,dome_name,house_number,dome_size,dome_price,dome_img,PROVINCE_NAME,AMPHUR_NAME,DISTRICT_NAME FROM dome_detail,province,amphur,district WHERE (dome_detail.PROVINCE_ID = province.PROVINCE_ID) AND (dome_detail.AMPHUR_ID = amphur.AMPHUR_ID) AND (dome_detail.DISTRICT_ID = district.DISTRICT_ID) AND province.PROVINCE_ID LIKE '%".$province_search."%'";

						// echo $sql;
						
						
						$result = mysqli_query($con,$sql);

						if ($result->num_rows > 0) {
						  
						    // output data of each row
						    while($row = $result->fetch_assoc()) {
						?>
							<tr>
								<!-- <td><?php //echo $row['result']; ?></td> -->
								<td><?php echo $row['dome_name']; ?></td>
								<td><?php echo $row['dome_size']; ?></td>
								<td><?php echo $row['dome_price']; ?></td>
								<td><?php echo $row['house_number']."<br>".$row['DISTRICT_NAME']."&nbsp;".$row['AMPHUR_NAME']."&nbsp;".$row['PROVINCE_NAME']; ?></td>
								<td>
									<button type="submit" class="btn btn-primary" id="btnSearch">
 										<span class="glyphicon glyphicon-plus"></span>
 											
 									</button>
 								</td>
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
        <?php
        	// require '../include/boxOffice.php';
    	?> 
    </div>

	</div>

<?php
	// session_start();
	// include('condb.php');
	// $search = $_POST['search'];

	
	// $sql = "SELECT dome_id,username,dome_name,house_number,dome_size,dome_price,dome_img,PROVINCE_NAME,AMPHUR_NAME,DISTRICT_NAME FROM dome_detail,province,amphur,district WHERE (dome_detail.PROVINCE_ID = province.PROVINCE_ID) AND (dome_detail.AMPHUR_ID = amphur.AMPHUR_ID) AND (dome_detail.DISTRICT_ID = district.DISTRICT_ID) AND (username = '".$_SESSION['username']."') AND province.PROVINCE_NAME LIKE '%$search%'";
	// echo $sql;
	// // echo $_SESSION['username'];
	// $query = mysqli_query($con,$sql);
	 // echo $query;
	// var_dump($query);
 
?>
	<!-- <div class="col-md-12">
	 	<table class="table table-bordered">
	 		<thead>
	 			<tr> -->
	 				<!-- <th>ลำดับ</th> -->
	 				<!-- <th>รหัสสินค้า</th> -->
	 				<!-- <th>ชื่อสินค้า</th> -->
	 				<!-- <th>ราคาสินค้า</th> -->
	 				<!-- <th>หน่วยนับ</th> -->
	 			<!-- </tr>
	 		</thead>
		 	<tbody> -->
		 		<?php //while ($result = mysqli_fetch_array($query)) { ?>

		 		<!-- <tr> -->
		 			<!-- <td><?php //echo $result['dome_name'];?></td> -->
		 			<!-- <td><?php //echo $result['dome_name'];?></td> -->
		 			<!-- <td><?php //echo $result['dome_name'];?></td> -->
		 			<!-- <td><?php //echo $result['username'];?></td> -->
		 			<!-- <td><?php //echo number_format($result['price']);?></td> -->
		 			<!-- <td><?php //echo $result['dome_size'];?></td> -->
		 		<!-- </tr> -->
		 		<?php // } ?>
		 	<!-- </tbody>
	 	</table>
	</div> -->