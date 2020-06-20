<?php

$query="SELECT * FROM smart_admin WHERE sa_id= ".$_SESSION['usr_id'] ." ";
$result = mysqli_query($conn,$query);
	$count = mysqli_num_rows($result);
	if($count>0){
	while($row = mysqli_fetch_array($result))
	  {
		$adminid = $row['sa_id'];
		$adminusername = $row['sa_username'];	
	  }
	}
date_default_timezone_set('Asia/Kolkata');
$date=date("Y-m-d H:i:s");
$adminIP=$_SERVER['REMOTE_ADDR'];
$qry="INSERT INTO smart_admin_visitor (date, ip, admin_id, admin_username) VALUES ('". $date ."', '". $adminIP ."', ". $adminid .", '". $adminusername ."')";

if (mysqli_query($conn, $qry)) {
$view=1;
}

?>
