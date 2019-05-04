<?php 
	include('header.php');
	include('topbar.php');
?>
<style type="text/css">
	
</style>
<body>
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
<div id="pic-top">
	<img src="img/Sil2.jpg" class="img-responsive margin">
</div>