<?php 
	session_start();
	include('header.php'); 
	include('topbar.php');
?>

<style type="text/css">
	body{
		font-family: 'Kanit', sans-serif;

	}
	#img-body{
		background-image: url("img/3.jpg");
		height: 750px;
		margin-top: -10px;
		background-position: center;
  		background-repeat: no-repeat;
  		background-size: cover;
  		position: relative;
  		/*opacity: 0.5px;
  		filter: alpha(opacity=50);*/
	}
	#card{
		margin-top: 25px;
		background-color: #fff;
		padding-left: 80px;
		padding-right: 80px;
		border-radius: 20px;
		box-shadow: 2px 2px 4px #000000;
	}
	h1{
		font-family: 'Kanit', sans-serif;
		text-align: center;
	}
	form ,label{
		font-size: 15px;
		margin-top: 8px;
	}
	form ,input{
		margin-top: -5px;
	}
	form ,span{
		font-size: 12px;
		/*text-align: center;*/
	}
	form ,textarea{
		margin-top: -5px;
	}
	.input-group{
		position: relative;
		/*display: -webkit-box;*/
		display: flex;
		flex-wrap: wrap;
		-webkit-box-align: stretch;
		align-items: stretch;
		width: 100%;
	}
</style>



<br><br><br>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

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
<!-- form register -->

<div class="container-fluid" id="img-body">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="w3-card w3-container" id="card">
				<!-- <div class="card-body"> -->
					<!-- <div class=""> -->
						<form class="" name="form_register" action="check_register.php" method="POST">
							<h1>สมัครสมาชิก</h1>
							<span>โปรดกรอกข้อมูลการสมัครสมาชิกของท่านให้ครบถ้วน และถูกต้อง</span>
							<hr>
							<div class="row" style="margin-top: -10px;">
								<div class="col-md-6">
									<label for="firstname">ชื่อ</label>
									<input class="form-control" type="text" name="firstname" id="firstname" value="" placeholder="ชื่อจริง.."  required>
									<!-- <div class="invalid-feedback">Valid first name is required.</div> onkeyup="check_char(this)"-->
								</div>
								<div class="col-md-6">
									<label for="lastname">นามสกุล</label>
									<input class="form-control" type="text" name="lastname" id="lastname" value="" placeholder="นามสกุล.." required>
									<!-- <div class="invalid-feedback">Valid first name is required.</div> -->
								</div>
							</div>
							
							<label for="username">ชื่อผู้ใช้</label>
							<input class="form-control" id="username" type="text" name="username" value="" placeholder="ชื่อผู้ใช้.." onkeyup="check_char(this)" required>

							<div class="row">
								<div class="col-md-6">
									<label for="password">รหัสผ่าน</label>
									<input class="form-control" type="password" name="password" id="passwordd" onkeyup="check_char(this)" required>
									<p style="color: gray; font-size: 10px;">รหัสผ่านอย่างน้อย 6 ตัว เป็นตัวเลข 0-9 ตัวอักษรพิมพ์เล็ก(a-z) และพิมพ์ใหญ่(A-Z)</p>
								</div>
								<div class="col-md-6">
									<label for="passwordCon" style="margin-top: 8px;">ยืนยันรหัสผ่าน</label>
									<input class="form-control" type="password" name="passwordCon" id="passwordConn" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required>
									<span id="message"></span>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-6">
									<label for="tel">เบอร์โทรศัพท์มือถือ</label>
									<input class="form-control" type="text" name="tel" id="tel" value="" placeholder="0987654321" pattern="(?=.*[0-9]).{10,}" maxlength="10" onkeyup="checknumber()" required>
									<p style="color: gray; font-size: 10px;">ต้องเป็นตัวเลข 0-9 และมีจำนวน 10 ตัวเท่านั้น</p>
								</div>

								<div class="col-md-6">
									<label for="email">อีเมล์</label>
									<input class="form-control" type="email" name="email" id="email" value="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="example@gmail.com" onblur="check_email(this)">
									<span id="msg_email"></span>
								</div>
							</div>
							
							<label for="address" style="margin-top: -8px;">ที่อยู่</label>
							<textarea class="form-control" type="text" name="address" id="address" rows="2" required></textarea>

							<label for="status" style="margin-top: 8px;">สถานะการสมัครสมาชิก</label><br>
	                        <select class="form-control" name="status" id="status" required>
	                            <option value="">เลือก...</option>
	                            <option value="owner">เจ้าของโดม</option>
	                            <option value="renter">ผู้เช่าโดม</option>
	                        </select>
	                        <br>
							<div class="">
								<center><button class="btn btn-primary" type="submit">ยืนยันการสมัครสมาชิก</button></center>
							</div>
							<div style="margin-top: 10px;"></div>
							<ul class="nav navbar-nav">
		                     	<li>
		                        	<p> เป็นสมาชิกอยู่แล้ว?  
		                        		<a href="#" data-toggle="modal" data-target="#login" style=""> เข้าสู่ระบบ</a>
		                        	</p><br>
		                     	</li>
		                  	</ul>

						</form>
					<!-- </div> -->
				<!-- </div> -->
			</div>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>

<!-- ############################################################################################################### -->
<!-- Javascript -->
<script>

    $('#passwordd, #passwordConn').on('keyup', function () {
  		if ($('#passwordd').val() === $('#passwordConn').val()) {
    		$('#message').html('รหัสผ่านตรงกัน').css('color', 'green');
  		} else 
  			$('#message').html('รหัสผ่านไม่ตรงกัน โปรดป้อนใหม่').css('color', 'red');
	});

</script>

<!-- ___________________________________ check charlecter  __________________________________________ -->
<script type='text/javascript'>
	function check_char(elm){
		if(!elm.value.match(/^[ก-ฮa-z0-9]+$/i) && elm.value.length>0){
			alert('ไม่สามารถใช้ตัวอักษรพิเศษได้ โปรดกรอกอีกครั้ง');
			elm.value='';
		}
	}
</script>

<!-- ___________________________________ check charlecter  __________________________________________ -->	
<script>
	
	function checknumber() {
		var key = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
		if (( key>57 || key == 47) && (key != 13) ) {
			event.returnValue = false;       
			alert( 'สามารถกรอกตัวเลข 0-9 ได้เท่านั้น ' );
			document.myform.myinput.value='';
		}
	}
</script>

<br><br><br>
<?php include('footer.php'); ?>