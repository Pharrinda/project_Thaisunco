<?php 
  session_start();
	include('header.php');
?>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style type="text/css">
	body{
		font-family: 'Kanit', sans-serif;
	}
	.navbar {
      font-family: 'Kanit', sans-serif;
      margin-bottom: 0;
      background-color: #f6f6f6;
      border: 0;
      font-size: 12px !important;
      letter-spacing: 0px;
      opacity: 0.9;
  }
  #navTop{
      font-family: 'Kanit', sans-serif;
      
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
  #btn-login{
    font-family: 'Mitr', sans-serif;
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
    
    

    // if($_SESSION['status'] != "admin")
    // {
    //     echo "<script>alert('กรุณาลงชื่อเข้าสู่ระบบ');window.location='index.php';</script>" ;
    //     exit();
    // }   
    
    
    $strSQL = "SELECT * FROM user WHERE username = '".$_SESSION['username']."' ";
    
    $objQuery = mysqli_query($con,$strSQL);
    $objResult = mysqli_fetch_array($objQuery);
?>
<body class="w3-light-grey" id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
      <!-- Top container -->
    <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
        <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
        <div class="w3-bar-item w3-right" style="color: #000;">Logo</div>
    </div>

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
        <div class="w3-container w3-row">
            <div class="w3-col s2">
                
                <a class="navbar-brand" href="home_owner.php">
                    <img src="img/logo_sun.png" class="w3-circle w3-margin-right" style="width:90px; height: 60px; margin-top: 20px;">
                </a>
            </div>
            <br>
            <div class="w3-col s10 w3-bar" style="margin-top: 20px;">
                <center><label style="margin-left: 50px; font-size: 30px;"><?php echo $objResult['username']; ?></label></center>
                
            </div>
        </div>
        <div class="container">
            <table style="margin-top: 10px; ">
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

            </table>
        </div>
        <hr>
        <div class="w3-container">
            <!-- <h5>Dashboard</h5> -->
        </div>
        <div class="w3-bar-block">
            <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
            <a href="home_admin.php" class="w3-bar-item w3-button w3-padding" style="font-size: 18px;"><i class="fa fa-bank fa-fw"></i>  หน้าแรก</a>
            <a href="manage_member.php" class="w3-bar-item w3-button w3-padding" style="font-size: 18px;"><i class="fa fa-users fa-fw"></i>  จัดการสมาชิก</a>
            <a href="status_pay.php" class="w3-bar-item w3-button w3-padding" style="font-size: 18px;"><i class="fa fa-history fa-fw"></i>  สถานะการชำระเงิน</a></a><br><br> --><br><br><br><br><br>
            <a href="logout.php" class="w3-bar-item w3-button w3-padding" style="font-size: 16px; text-align: center;"><span class="glyphicon glyphicon-log-out"></span> ออกจากระบบ </a>
            
        </div>
    </nav>
    <script>
    // Get the Sidebar
    var mySidebar = document.getElementById("mySidebar");

    // Get the DIV with overlay effect
    var overlayBg = document.getElementById("myOverlay");

    // Toggle between showing and hiding the sidebar, and add overlay effect
    function w3_open() {
      if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
      } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
      }
    }

    // Close the sidebar with the close button
    function w3_close() {
      mySidebar.style.display = "none";
      overlayBg.style.display = "none";
    }
</script>