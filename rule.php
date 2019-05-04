<?php 
	include('header.php');
	include('topbar.php');
?>
<style>
	body{
		font-family: 'Kanit', sans-serif;
		background-color: #fff;
	}
</style>
<br><br><br><br>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
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
                                    <input class="form-control" type="text" name="username" id="username" placeholder="ชื่อผู้ใช้"  required><!-- maxlength="10" pattern="[0-9]*" -->
                                    <input class="form-control" type="password" name="password" id="password" placeholder="รหัสผ่าน" style="margin-top: 10px;">
                                    <div class="checkbox">
                                        <input type="checkbox"  style="margin-left: 5px;" name="saveuser" value="1" >
                                        <label style="font-size: 12px; margin-top: -2px;">จำรหัสไว้</label>
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
                                        <button type="submit" name="form-login" class="btn btn-primary pull-right" style="margin-top: 10px; ">เข้าสู่ระบบ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>     
        </div>
	<div class="container">
		<div class="row">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div class="box" style="box-sizing: border-box; box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1); padding: 20px;">
					<h1>เงื่อนไขการเช่าพาราโบลาโดม</h1><br>
					<p>1. ในการเช่าโดม ผู้ใช้สามารถเช่าโดมได้เพียง 1 โดมต่อการเช่า 1 ครั้ง</p>
					<p>2. ผู้ใช้ที่ต้องการเช่าโดมจะต้องมี Line ID</p>
					<p>3. ผู้ใช้จะต้องทำรายการเช่าโดมก่อนการเข้าใช้อย่างน้อย 3 วัน</p>
					<p>4. ผู้ใช้ที่ต้องการทำรายการเช่าโดมจะต้องชำระเงินผ่าน Line pay หรือโอนเงินผ่านทางบัญชีธนาคาร ภายใน 24 ชั่วโมงหลังการเช่า หากผู้ใช้งานท่านใดไม่ชำระเงินภายใน 24 ชั่วโมงหลังการทำรายการเช่า ระบบจะยกเลิกรายการเช่าของท่าน</p>
					<br>
				</div>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div>

<br>
	<?php include('footer.php'); ?>