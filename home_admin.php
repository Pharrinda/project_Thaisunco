<?php 
	include('header.php');
	include('topbar_admin.php');
?>
<style type="text/css">
	body{
		font-family: 'Kanit', sans-serif;
		background-color: #fff;
	}
	#btn-manage_member{
		width: 350px;
		height: 100px;
		text-align: center;
		font-size: 30px;
		border-radius: 15px;
		background-color: #ffcc00;
	}
	#btn-manage_member:hover{
		background-color: #999966;
	}
	#btn-confirm_status_pay{
		width: 350px;
		height: 100px;
		text-align: center;
		font-size: 30px;
		border-radius: 15px;
		background-color: #3399ff;		
	}
	#btn-confirm_status_pay:hover{
		background-color: #999966;
	}
</style>
<br><br><br><br><br>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-9">
			<h1></h1>
			<div class="row">
				<div class="col-md-6">
					<a href="manage_member.php"><center><button class="btn btn-default " id="btn-manage_member">จัดการสมาชิก</button></center></a>
				</div>
				<div class="col-md-6">
					<a href="status_pay.php"><center><button class="btn btn-default" id="btn-confirm_status_pay">สถานะการชำระเงิน</button></center></a>
				</div>

			</div>

		</div>
	</div>
</div>