<?php

$query="SELECT * FROM smart_rto_admin WHERE ra_id= ".$_SESSION['rto_id'] ." ";
$result = mysqli_query($conn,$query);
	$count = mysqli_num_rows($result);
	if($count>0){
	while($row = mysqli_fetch_array($result))
	  {
		$adminid = $row['ra_id'];
		$adminusername = $row['ra_username'];	
	  }
	}
date_default_timezone_set('Asia/Kolkata');
$date=date("Y-m-d H:i:s");
$adminIP=$_SERVER['REMOTE_ADDR'];
$qry="INSERT INTO smart_rto_admin_visitor (date, ip, admin_id, admin_username) VALUES ('". $date ."', '". $adminIP ."', ". $adminid .", '". $adminusername ."')";

if (mysqli_query($conn, $qry)) {
$view=1;
}

?>