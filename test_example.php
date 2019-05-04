<?php 
	// session_start();
	include('header.php');
	include('topbar_renter.php');
?>
<script>
	var chart, toOffline;
	const limit = 5;
	var newItems = false;
	
	// Initialize Firebase
	var config = {
		apiKey: "AIzaSyDj_ZcH06mmxoVSJb5hV_08P-s5be8wCt0",
		authDomain: "nb-iot-c6c42.firebaseapp.com",
		databaseURL: "https://nb-iot-c6c42.firebaseio.com",
		storageBucket: "nb-iot-c6c42.appspot.com",
	};

	$(document).ready(function(e) {
		$.material.init()
	
		chart = new CanvasJS.Chart("chartContainer", {
			title: {
				text: " Temperature and Humidity "
			},
			axisX:{  
				valueFormatString: "HH:mm"
			},
			axisY: {
				valueFormatString: "0.0#"
			},
			toolTip: {
				shared: true,
				contentFormatter: function (e) {
					var content = CanvasJS.formatDate(e.entries[0].dataPoint.x, "HH:mm:ss") + "<br>";
					content += "<strong>Temperature</strong>: " + e.entries[0].dataPoint.y + " &deg;C<br>";
					content += "<strong>Humidity</strong>: " + e.entries[1].dataPoint.y + " %";
					return content;
				}
			},
			animationEnabled: true,
			data: [
				{
					type: "spline",
					dataPoints: []
				},
				{
					type: "spline",
					dataPoints: []
				}
			]
	 	});
	 	chart.render();	
	
		firebase.initializeApp(config);
		var logDHT = firebase.database().ref().child("valueNB");
		logDHT.orderByKey().limitToLast( limit ).once("value", function(snap) {
			console.log(snap.val());
			let vals = snap.val();
			$.each(vals, function(index, val) {
				let humidity = val.Humidity;
				let temp = val.Temperature;
				let datetime = new Date( val.dateTime );

				console.log( "Date: " + val.dateTime + " , Temperature: " + temp + " , Humidity: " + humidity );
			
				$("#temperature > .content").html(temp + " &deg;C");
				$("#humidity > .content").text(humidity + " %");

				chart.options.data[0].dataPoints.push({x: datetime, y: temp});
				chart.options.data[1].dataPoints.push({x: datetime, y: humidity});
				chart.render();
			});
		});
	
		logDHT.orderByKey().limitToLast(1).on("child_added", function(snap) {
			let val = snap.val();
			let humidity = val.Humidity;
		let temp = val.Temperature;
			let datetime = new Date( val.dateTime );

			console.log( "Date: " + val.dateTime + " , Temperature: " + temp + " , Humidity: " + humidity );
		
			$("#temperature > .content").html(temp + " &deg;C");
			$("#humidity > .content").text(humidity + " %");

			chart.options.data[0].dataPoints.push({x: datetime, y: temp});
			chart.options.data[1].dataPoints.push({x: datetime, y: humidity});
			chart.render();
		});
	});

	var setTimeoffline = function() {
		if (typeof toOffline === "number") clearTimeout(toOffline);
		toOffline = setTimeout(function() {
			$("#status").removeClass("success").addClass("danger");
			$("#status > .content").text("OFFLINE");
		}, 1000);
	}
</script>

<!-- style -->
<style>
	body{
		background-color: #FFF;
		font-family: 'Mitr', sans-serif;
	}
	.dialog {
		width: 100%;
		border-radius: 4px;
		margin-bottom: 20px;
		box-shadow: 0 1px 6px 0 rgba(0, 0, 0, 0.12), 0 1px 6px 0 rgba(0, 0, 0, 0.12);
	}
	.dialog > .content {
		padding: 30px 0;
		border-radius: 6px 6px 0 0;
		font-size: 64px;
		color: rgba(255,255,255, 0.84);
		text-align: center;
	}
	.dialog.primary > .content{
		background: #00aa9a;
	}
	.dialog.success > .content {
		background: #59b75c;
	}
	.dialog.info > .content {
		background: #03a9f4;
	}
	.dialog.warning > .content {
		background: #ff5722;
	}

	.dialog.danger > .content {
		background: #f44336;
	}
	.dialog > .title {
		background: #FFF;
		border-radius: 0 0 6px 6px;
		font-size: 22px;
		color: rgba(0,0,0, 0.87);
		text-align: center;
		padding: 10px 0;
		font-weight: bold;
	}
	.nav-tabs {
		margin-bottom: 20px;
	}
</style>
<br><br>
<body>

	


<div class="container">
	<!-- <h1>Temperature &amp; Humidity Dashboard <small>Firebase + ESP8266</small></h1> -->
	<h1 style="font-weight: bold;">ค่าอุณหภูมิและค่าความชื้น</h1>
    <hr>
     
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#overview" aria-controls="home" role="tab" data-toggle="tab">ตัวเลข</a></li>
      <li role="presentation"><a href="#history" aria-controls="profile" role="tab" data-toggle="tab">กราฟ</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      	<div role="tabpanel" class="tab-pane active" id="overview">
        	<div class="row">
           		<div class="col-sm-4">
             		<div class="dialog primary fadeIn animated" id="temperature">
               			<div class="content">00.0 &deg;C</div>
               			<div class="title">ค่าอุณหภูมิ</div>
             		</div>
           		</div>
           		<div class="col-sm-4">
             		<div class="dialog info fadeIn animated" id="humidity">
               			<div class="content">00.0 %</div>
               			<div class="title">ค่าความชื้น</div>
             		</div>
           		</div>
           		<div class="col-sm-4">
           		<!-- status fan -->
             		<div class="dialog success fadeIn animated" id="status">
               			<div class="content">???</div>
               			<div class="title">สถานะพัดลม</div>
					</div>

				<!-- Button control open/close -->

					<div class="row">
						<form method="POST">
							<div class="col-md-6 pull-left">
								<input type="submit" class="btn btn-success" id="btn_open" value="open" name="open" style="text-align: center;width: 100px;height: 100px; border-radius: 50%; font-size: 22px;">  
								
								<!-- <p id="demo"></p> -->
							</div>
							<div class="col-md-6 pull-rigth">
								<input type="submit"  class="btn btn-danger" id="btn_close" value="close" name="close" style="text-align: center;width: 100px;height: 100px; border-radius: 50%; margin-left: 80px; font-size: 22px;">

							</div>	
						</form>
						<?php 
							//echo "Hello";
						    if(isset($_POST['open'])){
						        //echo "open";
						        $res = file_get_contents("http://45.32.69.11:7755/test/1");
						    }
						    if (isset($_POST['close'])) {
						    	//echo "close";
						    	$res = file_get_contents("http://45.32.69.11:7755/test/0");
						    }
						?>
					</div>		 
           		</div>
        	</div>
      	</div>

	<!-- Chart Humidity and Temperture -->
      	<div role="tabpanel" class="tab-pane" id="history">
        	<div id="chartContainer" style="height: 200px; width: 100%;"></div>
      	</div>

    </div>

<br>
<br>

</div>
<br>
<?php include('footer.php'); ?>