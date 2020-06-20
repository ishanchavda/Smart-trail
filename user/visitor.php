<?php

$date=date("Y-m-d");
$userIP=$_SERVER['REMOTE_ADDR'];
$sql="SELECT * FROM smart_site_visitor";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) 
{
    while($row = mysqli_fetch_assoc($result)) 
	{
       $dbdate=$row['date'];
	   $dbuserIP=$row['ip'];
	   $dbview=$row['views'];
    }
	if($dbdate == $date && $dbuserIP == $userIP)
	{
		$dbview=$dbview+1;
		$qry="UPDATE smart_site_visitor SET views = '$dbview'";
		if (mysqli_query($conn, $qry)) 
		{
		 return true;
		}
mysqli_close($conn);
		
	}
} 
else 
{   $view=1;
    $qry="INSERT INTO smart_site_visitor (date, ip, views) VALUES ('". $date ."', '". $userIP ."', '" . $view . "')";
	if (mysqli_query($conn, $qry)) 
	{
		return true;
	} 
}

?>