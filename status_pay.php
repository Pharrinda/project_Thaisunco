<?php 
	// session_start();
	include('header.php');
	include('topbar_admin.php'); 
?>
<style type="text/css">
	body{
		font-family: 'Kanit', sans-serif;
	}
</style>
<br><br>

<body class="w3-light-grey" id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-9">
				<center><h1>สถานะการชำระเงิน</h1></center>
				<br>
				<div style="overflow-x:auto;">
				<?php

					include ('condb.php');
					mysqli_set_charset($con,"utf8");

					$no = 0;
					$sql = "SELECT * FROM user ORDER BY username";
					$ex = mysqli_query($con,$sql);
					$result = mysqli_query($con,$sql);

					$show = "<table class=table-bordered width=900 cellpadding=4 align=center border>";
					$show .= "<tr bgcolor=#ffcc00 align=center height=50>
						<td><b><font color=#000>ลำดับ</b></td>
						<td><b><font color=#000>ชื่อผู้ใช้</b></td>
						<td><b><font color=#000>ชื่อ</b></td>
						<td><b><font color=#000>นามสกุล</b></td>
						<td><b><font color=#000>เบอร์โทรศัพท์</b></td>
						<td><b><font color=#000> สถานะ</b></td>
						<td><b><font color=#000> ลบ</b></td>
						</tr>";
						while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
							$show .= "<td align=center height=40>$row[user_id]</td>";
							$show .= "<td align=center height=40> $row[username] </td>";
							$show .= "<td align=center height=40> $row[firstname] </td>";
							$show .= "<td align=center height=40> $row[lastname] </td>";
							$show .= "<td align=center height=40> $row[tel] </td>";
							$show .= "<td align=center height=40> $row[status] </td>";
							
							$show .= "<td align=center height=40>
										<button class=form-control style=background-color:red>
											<a href=del_member.php?id=$row[user_id] style=color:#fff onclick=\"return confirm('ยืนยันการลบข้อมูล?')\">ลบ</a>
										</button>
									</td>";
							$show .= "</tr>";
						}
						$show .= "</table>";
						echo $show;

						// mysqli_close($con);

						// if($_SERVER["REQUEST_METHOD"] == "POST"){
						// 	$username = $_POST["username"];
						// 	$sql = "INSERT INTO user (user_id,username) values ('','$username')";
					
						// 	if (mysqli_query($con, $sql)) {
						// 		echo "<script>alert('NOTICE : เพิ่มโดมใหม่สำเร็จ');</script>" ;
						// 	} else {
						// 		echo "Error: " . $sql . "<br>" . mysqli_error($con);
						// 	}

						// }

					?>
				</div>
			</div>
		</div>
	</div>
