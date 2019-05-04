<?php  
	include('header.php');
	include('topbar_owner.php');

?>
<style type="text/css">
	body{
        font-family: 'Kanit', sans-serif;
    }
    #box_index{
        height: auto; 
        display: block; 
        position: 
        absolute; 
        bottom: 100px;
        right: 20px;
        background-color: #f6f6f6;
        color: #4C4C4C; 
        padding-left: 20px;
        margin-right: 40px;
        opacity: 0.9; 
        text-align: center;
    }
    #rent_dome{
        background-color: #009AFF; 
        color: white; 
        width: 200px; 
        height: 40px; 
        margin-left: 0px; 
        margin-top: 40px; 
        margin-bottom: 10px;
    }
    #about-text{
        text-align: center;
    }
    #des_about{
        font-size: 16px;
    }
    #com{
        margin: 25px;
        font-size: 18px;
        text-align: center;
        font-family: 'Kanit', sans-serif;
    }
</style>

<?php
	// session_start();
    include("condb.php");
	mysqli_set_charset($con,"utf8");
	
	if($_SESSION['username'] == "")
	{
		header("Location: index.php");
		exit();
	}

	
	
	$strSQL = "SELECT * FROM user WHERE username = '".$_SESSION['username']."' ";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	
	
	// $strSQL_P = "SELECT * FROM Product ORDER BY pr_num DESC LIMIT 3 ";
	// $objQuery_P = mysqli_query($con,$strSQL_P);
	// $objResult_P= mysqli_fetch_assoc($objQuery_P);
	// if(!$objQuery_P)
	// {
	// 	echo $con->error;
	// 	exit();
	// }
?>
<body>
	<br><br><br>
	<!-- img index -->
    <div class="index_all">
        <img src="img/1.jpg" class="img-responsive margin" style="display:inline" alt="Bird" width="100%" overflow:hidden;>
        <div class="container">
            <!-- <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
                <div class="col-md-4"> 
                    <div id="box_index" class="text-block text-center" max-width="100%">

                        <h4 style="margin-top: 25px;">โรงอบพลังงานแสงอาทิตย์ หรือ <h2 style="color: #009AFF;">" พาราโบลาโดม "</h2></h4>
                        <p style="margin-right: 10px;">เป็นการใช้พลังงานแสงอาทิตย์เข้ามาช่วยในการอบแห้ง จะทำให้อาหารของคุณสะอาด ปลอดภัย ไร้สารปนเปื้อน สนใจ  คลิ๊กที่ปุ่มนี้ </p>
                        <a href="rental.php">
                            <center>
                                <button id="rent_dome" type="button" class="form-control">เช่าโดม</button>
                            </center>
                        </a>
                    </div>
                </div>
            </div> -->
        </div>


        <!-- login and register -->
        <div class="container">
            <!-- Modal  Login-->
            <form name="form1" method="POST" action="check_login.php">
                <div class="modal fade" id="login" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">เข้าสู่ระบบ</h4>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <input class="form-control" type="text" name="Username" id="username" placeholder="ชื่อผู้ใช้"  required><!-- maxlength="10" pattern="[0-9]*" -->
                                    <input class="form-control" type="password" name="Password" id="password" placeholder="รหัสผ่าน" style="margin-top: 10px;">
                                    <div class="checkbox">
                                        <input type="checkbox"  style="margin-left: 5px;" name="saveuser" value="1" ><label>จำรหัสไว้</label>
                                    </div>
                                </form>
                                <center>
                                    <font style="margin-top: -10px; font-size: 15px;">หรือ</font>&nbsp;&nbsp;
                                        <img src="img/button_line.png" class="img-responsive margin" style="display:inline; " alt="Bird" width="150" overflow:hidden;>      
                                </center>
                            </div>
                            
                            <!-- modal footer -->
                            <div class="modal-footer">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button class="btn btn-default pull-left" type="button"  data-dismiss="modal"  style="margin-top: 10px; width: 82.1px; ">ยกเลิก</button>
                                    </div>
                                    <div class="col-md-6">
                                    <!-- <a href="login.php"> -->
                                        <button type="submit" name="form-login" class="btn btn-primary pull-right" style="margin-top: 10px; ">เข้าสู่ระบบ</button>
                                    <!-- </a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>     
        </div>
    </div>
<br><br><br>

    <!-- about -->
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8" id="about">
                <h2 id="about-text">เกี่ยวกับเว็บไซต์ของเรา</h2>
                <br>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <p id="des_about">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;แพลตฟอร์มของเราเป็นแพลตฟอร์มที่ทำขึ้นเพื่อให้บริการเกี่ยวกับการเช่าโดมอบแห้งพลังงานแสงอาทิตย์ ซึ่งได้รับความร่วมมือของทั้ง 2 ภาควิชา คณะวิทยาศาสตร์ มหาวิทยาศิลปากร  &nbsp; คือ
                        </p>
                        <br>

                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row" >
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <center>
                            <img src="img/pc-computer-with-monitor.png" class="img-responsive center" style=" display:inline; overflow:hidden;" alt="Bird" width="120" >
                            <label id="com">ภาควิชาคอมพิวเตอร์</label>
                        </center>
                    </div>
                    <div class="col-md-4">
                        <center>
                            <img src="img/circuit.png" class="img-responsive center" style=" display:inline; overflow:hidden;" alt="Bird" width="120" >
                            <label id="com">ภาควิชาฟิสิกส์</label>
                        </center>    
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
<br><br><br><br>

    <!-- Rule Rental -->
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="box pull-right" style="box-sizing: border-box; box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1); padding: 20px; width: 500px; text-align: center;">
                    <h4>
                        <a href="rule.php">เงื่อนไขในการเช่าโดม</a>
                    </h4>
                    <hr>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box  pull-left" style="box-sizing: border-box; box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1); padding: 20px; width: 500px; text-align: center;">
                    <h4>
                        <a href="descript_rent.php">วิธีการเช่าโดม</a>
                    </h4>
                    <hr>
                </div>
            </div>   
        </div>
    </div>
</div>


<br>
<?php include('footer.php'); ?>