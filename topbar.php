<?php include('header.php'); ?>

      

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
  #img-logo{
   margin-top: -30px;
   margin-left: 15px;
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
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
	<nav class="navbar navbar-inverse  navbar-fixed-top">
	  	<div class="container-fluid">
	    	<div class="navbar-header">
	    		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>                        
			    </button>
	      		<a class="navbar-brand" href="index.php">
                    <img id="img-logo" src="img/logo_sun.png" class="img-responsive margin" width="120" height="90">
                </a>
	      		<label style="font-size: 10px; margin-top: 18px; font-family: 'Kanit', sans-serif;" id="web">
                    Website นี้จัดทำขึ้นเพื่อเป็นโครงงานปริญญานิพนธ์เท่านั้น
            	</label>
	   		</div>
	   		<div class="collapse navbar-collapse" id="myNavbar">
		    	<ul class="nav navbar-nav navbar-right">
		    		<li><a href="index.php">หน้าหลัก</a></li>
		      		<li><a href="about.php">เกี่ยวกับ</a></li>
		      		<li><a href="rule.php">เงื่อนไขการเช่าโดม</a></li>
                    <li><a href="des_rent.php">วิธีการเช่าโดม </a></li>
		      		<li><a href="register_form.php"><span class="glyphicon glyphicon-user"></span> สมัครสมาชิก</a></li>
		      		<li><a href="#" data-toggle="modal" data-target="#login"><span class="glyphicon glyphicon-log-in"></span> เข้าสู่ระบบ</a></li>
		    	</ul>
		    </div>
	  	</div>
	</nav>