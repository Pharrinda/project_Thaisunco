<?php 
session_start();
    include('header.php');
    include('topbar_renter.php');
 ?>
 <style>
 	body{
		font-family: 'Kanit', sans-serif;
	}
 </style>
 <br><br><br>
 <body>
 <?php 
 	include('condb.php');
	mysqli_set_charset($con,"utf8");

	$no = 0;
	$sql = "SELECT * FROM `rent_detail` WHERE username = '".$_SESSION['username']."'";
	 $objQuery = mysqli_query($con,$sql);
    $objResult = mysqli_fetch_array($objQuery);
 ?>
    <div class="container">
      <div class="row">
         <div class="col-md-12" id="check-out-list">
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h3>รายละเอียดการเช่าสินค้าของคุณ</h3>
               </div>
<br><br> 
			
               <!-- Table -->
               <table class="table table-responsive">
                  <tr>
                     <td  style="color: #998E9C; width: 300px; text-align: left;"><label style="margin-left: 25px;">ตำแหน่งโดม :</label> </td>
                     <td> <?php echo $objResult['rent_add']; ?></td>
                  </tr>
                  <tr>
                     <td  style="color: #998E9C; width: 300px; text-align: left;"><label style="margin-left: 25px;">ขนาดของโดม :</label> </td>
                     <td><?php echo $objResult['rent_size']; ?></td>
                  </tr>
                  <tr>
                     <td  style="color: #998E9C; width: 300px; text-align: left;"><label style="margin-left: 25px;">ประเภทของอบแห้ง :</label> </td>
                     <td> <?php echo $objResult['rent_product_type']; ?></td>
                  </tr>
                  <tr>
                     <td  style="color: #998E9C; width: 300px; text-align: left;"><label style="margin-left: 25px;">เริ่มเช่า :</label> </td>
                     <td> <?php echo $objResult['rent_start']; ?></td>
                  </tr>
                  <tr>
                     <td  style="color: #998E9C; width: 300px; text-align: left;"><label style="margin-left: 25px;">สิ้นสุดการเช่า :</label> </td>
                     <td> <?php echo $objResult['rent_end']; ?></td>
                  </tr>
                  
                  <!-- <tr>
                     <td  style="color: #998E9C; width: 300px; text-align: left;"><label style="margin-left: 25px;">จำนวนวันที่เช่า :</label> </td>
                     <td> <?php //echo $objResult['rent_product_type']; ?> </td>
                  </tr> -->
                  <tr>
                     <td  style="color: #998E9C; width: 300px; text-align: left;"><label style="margin-left: 25px;">รวมราคาทั้งหมด :</label> </td>
                     <td> <h3><b><?php echo $objResult['rent_price']; ?></b></h3></td>
                  </tr>
               </table>
               <footer>
                  <div class="row">
                     <div class="col-md-12 ">
                        <a href="send_slip_rent.php">
                            <button type="submit" class="form-control btn btn-primary pull-right" style="max-width: 150px; height: 40px; margin-right: 25px; margin-top: 25px;">
                                ชำระเงิน
                            </button>
                        </a>
                     </div>
                  </div>
                  <br>
               </footer>
            </div>
         </div>
      </div>
   </div>
    <br>
    <br>


<?php 
    include('footer.php');
 ?>