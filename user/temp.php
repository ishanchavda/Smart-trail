<?php 
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$vehiclenumber=$veno // enter your Android Variable
	require '../inc/dbconfig.php';
	getnumber($vehiclenumber);
}
?>
<?php 
function getnumber($vehicle);
{
	$vehicleno=$vehicle;
	$qry="SELECT * FROM smart_vehicle WHERE vehicle_no = '". $vehicleno ."'";
	$result = mysqli_query($conn,$qry);
	$count = mysqli_num_rows($result);
	if($count==1)
	{
		$date=date("Y-m-d");
		while($row = mysqli_fetch_array($result))
		  {
			$veid = $row['vehicle_id'];
			$veno = $row['vehicle_no'];			
			$vewh = $row['vehicle_wheels'];	
			$ownno = $row['owner_con_no'];	
			$owname = $row['vehicle_owner'];
			$email = $row['email'];
		  }
	}
	
	$penalty_status="No";
		if($vewh==2)
		{
			$penalty=100;
		}
		else
		{
			$penalty=400;
		}
		$sql="INSERT INTO smart_penalty(name, vehicle_no, penalty, paid_status, date, city,) VALUES ('$owname', '$veno', '$penalty', '$penalty_status', '$date', '$city')";
		if (mysqli_query($conn, $sql)) 
		{
		/*
		$usr_name=$_SESSION['emp_name'];
		// Create the email and send the message
		$to = $email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
		$email_subject = "Your Useris and Password";
		$email_body = "Mail From RTO Employee of Smart-Trail \n\n\n\n "."Dear,$owname Your Vehicle Which Vehicle no:$veno is Trailed. It ie requested to reach $city policestation, $distict. check:https://smart-trail.com/user/checkpenalty.php \n\n\n\n Thank YOU\n $usr_name\n Smart-Trail RTO Employee";
		$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
		$headers .= "Reply-To: $email";   
		mail($to,$email_subject,$email_body,$headers);*/
		//close Email
		
		/*start sms
		$mno ="9979004778";
		$message ="Dear,$owname Your Vehicle Which Vehicle no:$veno is Trailed. It ie requested to reach $city policestation, $distict. check:https://smart-trail.com/user/checkpenalty.php";
		if(preg_match( '/^[A-Z0-9]{10}$/', $mno) && !empty($message)) {
			$ch = curl_init();
			$user="strail2018@gmail.com:smart2018";
			$receipientno= $ownno;
			$senderID="TEST SMS";
			$msgtxt= $message; 
			curl_setopt($ch,CURLOPT_URL,  "http://api.mVaayoo.com/mvaayooapi/MessageCompose");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt");
			$buffer = curl_exec($ch);
			if(empty ($buffer))
			{ echo " buffer is empty "; }
			else
			{ 
				//echo $buffer;
				echo "<script type=\"text/javascript\">" . "alert('Sucessfully Add !!!');" . "</script>";
			} 
			curl_close($ch);
		} 
		else {
			echo "<script type=\"text/javascript\">" . "alert('Not Valid Information !!!');" . "</script>";
		}*/	
		echo "<script type=\"text/javascript\">" . "alert('Sucessfully Add !!!');" . "</script>";
return true;		
        }
		else
		{
			return false;
		}
}
?>