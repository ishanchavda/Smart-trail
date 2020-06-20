<?php
session_start();
include_once '../inc/dbconfig.php';

$penst="Yes";
$peid=$_SESSION['peid'];
$query = "UPDATE smart_penalty SET paid_status='$penst' WHERE pe_id=".$peid;

if(mysqli_query($conn,$query))
{
	$sql="SELECT * FROM smart_penalty WHERE pe_id=".$peid;
	$result = mysqli_query($conn,$sql);
	$count = mysqli_num_rows($result);
	if($count==1)
	{
		$date=date("d/m/Y");
		while($row = mysqli_fetch_array($result))
		  {			
			$veno = $row['vehicle_no'];			
			$owname = $row['name'];
		  }
	}
	$q="SELECT * FROM smart_vehicle WHERE vehicle_no = '". $veno ."'";
	$result = mysqli_query($conn,$q);
	$count = mysqli_num_rows($result);
	if($count==1)
	{
		while($row = mysqli_fetch_array($result))
		  {
			$ownno = $row['owner_con_no'];	
			$email = $row['email'];
		  }
	}
	
		// Create the email and send the message
		$to = $email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
		$email_subject = "Thanks !!! Your Penalty Sucessfully Paid";
		$email_body = "Thanks. $owname, your payment for penalty Id : $peid , on vehicle : $veno is done on date : $date.";
		$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
		$headers .= "Reply-To: $email";   
		mail($to,$email_subject,$email_body,$headers);
		//close Email
		//start sms
		$mno ="9979004778";
		$message ="Thanks. $owname, your payment for penalty Id : $peid , on vehicle : $veno is done on date : $date.";
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
			
			session_destroy();
			
			if(empty ($buffer))
			{ echo " buffer is empty "; }
			else
			{ 
				//echo $buffer;
				echo "<script type=\"text/javascript\">" . "alert('Penalty Sucessfully Paid !!!');" . "window.location = 'checkpenalty.php';" . "</script>";
			} 
			curl_close($ch);
		} else {
			echo "<script type=\"text/javascript\">" . "alert('Not Valid Information !!!');" . "window.location = 'checkpenalty.php';" . "</script>";
		}	
		
	//echo "<script type=\"text/javascript\">" . "alert('Penalty Sucessfully Paid');" . "window.location = 'checkpenalty.php';" . "</script>";
}
?>

