<?php 
	require("mysql2json.class.php");
	include('connect.php');

	$ID=$_GET["ID"];
	$type=$_GET["TYPE"];
	
	if($type=='Proviance'){

		$query="SELECT PROVINCE_ID, PROVINCE_NAME FROM province ORDER BY PROVINCE_NAME ASC ";
	}
	else if($type=='District') {

		$query="SELECT AMPHUR_ID, AMPHUR_NAME FROM amphur WHERE PROVINCE_ID='".$ID."'";
	} 
	else if($type=='Subdistrict'){

		$query="SELECT DISTRICT_ID, DISTRICT_NAME FROM district WHERE AMPHUR_ID='".$ID."'";
	} 
	else if($type=='Postcode'){
		$query="SELECT POST_CODE FROM amphur_postcode WHERE AMPHUR_ID='".$ID."'";
	}

	$result = mysqli_query($query,$conn);
	$num = mysqli_affected_rows();
	// $result=mysql_query($query,$connection);
	// $num=mysql_affected_rows();
	
	$json=new mysql2json;
	$data=$json->getJSON($result,$num);
	echo $data;

?>