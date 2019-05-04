<?php 
    session_start();
    include('header.php'); 
?>
<style type="text/css">
	body{
        font-family: 'kanit', sans-serif;
    }
    .navbar {
      font-family: 'kanit', sans-serif;
      margin-bottom: 0;
      background-color: #f6f6f6;
      border: 0;
      font-size: 12px !important;
      letter-spacing: 0px;
      opacity: 0.9;
  }
  #navTop{
      font-family: 'kanit', sans-serif;
      
  }
  .navbar li a, .navbar .navbar-brand { 
      color: black !important;
  }
  .navbar-nav li a:hover {
      color: #009AFF !important;
  }
  .navbar-nav li.active a {
      color: #fff !important;
      background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
  }
  #img-logo{
   margin-top: -30px;
   margin-left: 15px;
  }
  #btn-login{
    font-family: 'kanit', sans-serif;
    margin-top: 10px;
    background-color: #009AFF;
    color: #fff;
  }
  #btn-register{
    font-family: 'Mitr', sans-serif;
    margin-top: 10px; 
    background-color: #009AFF;
    color: #fff;
  }
</style>
<?php
    // session_start();
    include("condb.php");
    mysqli_set_charset($con,"utf8");
    
    

    /*if($_SESSION['typenumber'] != "2")
    {
        echo "This page for Customer only!";
        exit();
    }   */
    
    
    $strSQL = "SELECT * FROM user WHERE username = '".$_SESSION['username']."' ";
    
    $objQuery = mysqli_query($con,$strSQL);
    $objResult = mysqli_fetch_array($objQuery);
?>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
    <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navTop">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="home_renter.php"><img id="img-logo" src="img/logo_sun.png" class="img-responsive margin" width="120" height="30"></a>
            <label style="font-size: 10px; margin-top: 18px; font-family: 'kanit', sans-serif;" id="web">
              Website นี้จัดทำขึ้นเพื่อเป็นโครงงานปริญญานิพนธ์เท่านั้น
            </label>
        </div>
        <div class="collapse navbar-collapse" id="navTop">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="home_renter.php">หน้าแรก</a></li>
                <li><a href="list_renter.php">รายงานการเช่าโดม</a></li>
                <li><a href="page_rent.php">เช่าโดม</a></li>
                <li><a href="send_slip_rent.php">ชำระเงิน</a></li>
                <li><a href="control_and_monitoring.php">ควบคุมและติดตามผล</a></li>
                <!-- <li><a href="#about">เกี่ยวกับเรา</a></li> -->
                <li>
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu-header1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="font-family: 'kanit', sans-serif; margin-top: 8px; margin-right: 5px;" name=""><span class="glyphicon glyphicon-user"></span> 
                        <?php
                          // Set session variables
                          echo $_SESSION['username'];

                        ?>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu-header1" style="margin-right: 5px; width: 270px;">
                        <!-- <li><a href="edit_profile.php"><span class="glyphicon glyphicon-pencil"></span> แก้ไขข้อมูลส่วนตัว</a></li> -->
                        <li>
                            <div class="container">
                                <table style="margin-top: 10px; margin-left: 3px;">
                                    <th></th>
                                    <th></th>
                                    <tr>
                                        <td style="color: #8c8c8c"><span class=""></span>&nbsp;&nbsp;&nbsp;ชื่อผู้ใช้ : &nbsp;</td>
                                        <td><span style="font-weight: bold; color: #000;"><?php echo $objResult['username']; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td style="color: #8c8c8c">&nbsp;&nbsp; ชื่อ : &nbsp;</td>
                                        <td><span style="font-weight: bold; color: #000;"><?php echo $objResult['firstname']; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td style="color: #8c8c8c">&nbsp;&nbsp; นามสกุล : &nbsp;</td>
                                        <td><span style="font-weight: bold; color: #000;"><?php echo $objResult['lastname']; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td style="color: #8c8c8c">&nbsp;&nbsp; เบอร์โทรศัพท์ : &nbsp;</td>
                                        <td><span style="font-weight: bold; color: #000;"><?php echo $objResult['tel']; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td style="color: #8c8c8c">&nbsp;&nbsp; อีเมล์ : &nbsp;</td>
                                        <td><span style="font-weight: bold; color: #000;"><?php echo $objResult['email']; ?></span></td>
                                    </tr>
                                    <!-- <tr>
                                        <td style="color: #8c8c8c">&nbsp;&nbsp; ที่อยู่ : &nbsp;</td>
                                        <td><span style="font-weight: bold; color: #000;"><?php //echo $objResult['address']; ?></span></td>
                                    </tr> -->
                                </table>
                            </div>
                        </li>
                        <li style="margin-top: 10px;"><a href="edit_profile.php" style="font-size: 16px; text-align: center;"><span class="glyphicon glyphicon-pencil"></span> แก้ไขข้อมูลส่วนตัว</a></li>
                        <li><a href="logout.php" style="font-size: 16px; text-align: center;"><span class="glyphicon glyphicon-log-out"></span> ออกจากระบบ </a></li>
                    </ul> 
                </li>
            </ul>
        </div>
    </div>
</nav>
