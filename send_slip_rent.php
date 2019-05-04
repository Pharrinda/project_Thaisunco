<?php 
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
   <div class="container">
      <div class="row">
         <div class="col-md-3"></div>
         <div class="col-md-6">
            <div class="box" style="box-sizing: border-box; box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1); padding: 20px;">
               <h1>ชำระเงินผ่านบัญชีธนาคาร</h1>
               <p>กรุณากรอกข้อมูลการชำระเงินของท่านให้ครบถ้วน</p>
               <hr>
               <?php 
                  include('condb.php');
                  mysqli_set_charset($con,"utf8");

                  $no = 0;
                  $sql = "SELECT * FROM `payment` WHERE username = '".$_SESSION['username']."'";
                   $objQuery = mysqli_query($con,$sql);
                   $objResult = mysqli_fetch_array($objQuery);
                ?>
               <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                     <h4 style="margin-left: -90px;">เลขใบชำระเงิน N0001</h4>
                     <br>

                     <form action="save_send_slip.php" method="POST">
                           <div class="row">
                              <?php 
                                 // include('condb.php');
                                 // $sql = "SELECT * FROM user WHERE username = '".$_SESSION['username']."'";
                                 // $objQuery = mysqli_query($con,$sql);
                                 // $row = mysqli_fetch_array($objQuery);
                              ?>
                              <div class="col-md-6">
                                 <label for="f_name" >ชื่อ</label>
                                 <input class="form-control" type="text" name="firstname" value="" style="margin-top: -5px;">
                              </div>
                              <div class="col-md-6">
                                 <label for="l_name" >นามสกุล</label>
                                 <input class="form-control" type="text" name="lastname" value="" style="margin-top: -5px;">
                              </div>
                           </div>
                                 
                           <label for="tel" style="margin-top: 10px;">เบอร์โทรศัพท์</label>
                           <input class="form-control" type="text" name="tel" value="" maxlength="10" minlength="0" style="margin-top: -5px;">

                           <label for="name_bank">ชื่อธนาคารที่โอนเงิน</label>
                           <input class="form-control" type="text" name="name_bank" placeholder="ชื่อธนาคารที่ท่านโอน">

                           <label for="pay_total">จำนวนเงินที่โอน</label>
                           <!-- <input class="form-control" type="text" name="pay_total" placeholder="ชื่อธนาคารที่ท่านโอน"> -->
                           <div class="input-group">
                              <span class="input-group-addon">ราคา</span>
                              <input type="text" name="pay_total" id="pay_total" class="form-control" required>
                              <span class="input-group-addon"> บาท</span>
                           </div>

                           <label for="pay_date" style="margin-top: 10px;">วันที่ที่โอนเงิน</label>
                           <input class="form-control" type="date"  name="pay_date">

                           <label for="pay_time">เวลาที่โอนเงิน</label>
                           <input class="form-control" type="time" name="pay_time">

                           <label for="pay_img">อัพโหลดไฟลล์ภาพบิล</label>
                           <input class="form-control" type="file" name="pay_img">
                           <p style="font-size: 12px; color: #ccc">กรุณาตรวจสอบข้อมูลที่ท่านกรอกอีกครั้งเพื่อความถูกต้อง</p>
                           <br>
                           <center>
                              <a href="">
                              <button type="submit" name="form-save" class="btn btn-primary" style="margin-top: 10px; width: 250px;">
                                 ยืนยันการชำระเงิน
                              </button>
                              </a>
                              <script>
                              // function sendPay() {
                              //     //alert("รอการตรววจสอบสถานะการชำระเงินของท่าน ภายใน 24 ชั่วโมงหลังทำรายการ");
                              //     <?php //echo "รอการตรววจสอบสถานะการชำระเงินของท่าน ภายใน 24 ชั่วโมงหลังทำรายการ" ?>
                              // }
                            </script>
                           </center>
                           <br>
                     </form>
                  </div>
                  <div class="col-md-2"></div>
               </div>
            </div>
         </div>
         <div class="col-md-3"></div>
      </div> 
      <br>
      <hr>
      <div class="paynow" style="margin-top: 0px; text-align: center;">
         <br>
            <h1 style="margin-top: 25px; margin-left: 0px;">ชำระเงินผ่าน</h1><br>
            <center><a href="index.php" type="" onclick="myFunction()"><img src="img/Line_pay_logo.png" class="img-responsive" width="200" height="150"></a></center>
         <br>
      </div>
      <script>
      function myFunction() {
          alert("คลิ๊กปุ่ม ตกลง เปิด application Line เพื่อชำระเงิน");
      }
      </script>
   </div>
   

<br><br><br><br><br>
<?php 
   include('footer.php');
 ?>