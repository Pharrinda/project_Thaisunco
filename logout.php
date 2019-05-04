<?php 
	session_start();
	session_destroy();
	$redirectUrl = 'index.php';
	    echo '<script type="application/javascript">alert("ออกจากระบบ"); window.location.href = "'.$redirectUrl.'";</script>';
?>