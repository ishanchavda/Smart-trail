<?php
include_once '../inc/dbconfig.php';
?>

<?php
$sql= 'SELECT * FROM markers';
if ($result=mysqli_query($conn,$sql))
	{
	  // Fetch one and one row
	  while ($row=mysqli_fetch_array($result))
	{
		$id=$row['id'];
		$name=$row['name'];
		$addr=$row['address'];
		$lat=$row['lat'];
		$lng=$row['lng'];
		if($lat==0.000000 || $lng==0.000000)
		{
			$address = $addr; // Address
			// Get JSON results from this request
			$geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false');
			$geo = json_decode($geo, true); // Convert the JSON to an array
			if (isset($geo['status']) && ($geo['status'] == 'OK')) {
			  $latitude = $geo['results'][0]['geometry']['location']['lat']; // Latitude
			  $longitude = $geo['results'][0]['geometry']['location']['lng']; // Longitude
			$sql="UPDATE markers SET lat=". $latitude .",lng=". $longitude ." WHERE id =".$id."";
				if (mysqli_query($conn, $sql)) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			}
		}
	}
	}	  
?>

