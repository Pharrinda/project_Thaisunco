<?php include('header.php'); ?>
<style type="text/css">
	body{
		font-family: 'kanit';
	}	
	#box-duplicate{
		margin-top: 70px;
		width: 450px;
		height: 300px;
	}
	#back{
		margin-top: 25px;
		width: 300px;
		height: 50px;
		border-radius: 10px;
		background-color: #f6f6f6;
	}
	#back:hover{
		background-color: red;
		color: #fff;
	}
</style>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<center><img src="img/duplicate.jpg" id="box-duplicate" class="img-responsive margin">
				<button onclick="goBack()" class="form-control" id="back"><span class="glyphicon glyphicon-arrow-left"></span> กลับ</button></center>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>

<script type="text/javascript">
	function goBack(){
		window.history.back();
	}
</script>