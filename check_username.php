<?php
	include('condb.php');
	
	if (isset($_POST['username'])) {
		# code...
		$username = mysqli_real_escape_string($_POST['username']);

		if (!empty($username)) {
			# code...
			$sql_query = mysqli_query("SELECT username FROM user WHERE username = '$username'");
			$result = mysqli_num_rows($sql_query);

				if ($result == 0) {
					# code...
					echo " ";
				}
				else if ($result == 1) {
					# code...
					echo "Sorry, That username is taken";
				}
		}
	}
?>