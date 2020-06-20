<?php

$query="SELECT * FROM smart_rto_employee WHERE id= ".$_SESSION['emp_id'] ." ";
$result = mysqli_query($conn,$query);
	$count = mysqli_num_rows($result);
	if($count>0){
	while($row = mysqli_fetch_array($result))
	  {
		$empid = $row['id'];
		$empusername = $row['username'];	
	  }
	}
date_default_timezone_set('Asia/Kolkata');
$date=date("Y-m-d H:i:s");
$empIP=$_SERVER['REMOTE_ADDR'];
$qry="INSERT INTO smart_rto_employee_visitor (date, ip, emp_id, emp_name) VALUES ('". $date ."', '". $empIP ."', ". $empid .", '". $empusername ."')";

if (mysqli_query($conn, $qry)) {
$view=1;
}

?>