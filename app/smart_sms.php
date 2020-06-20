<?php 
function getnumber($vehicle)
{
include_once '../inc/dbconfig.php';	
	
	$vehicleno = $vehicle;
	$city="Vadodara";
	$distict="Vadodara";
	$emp_id = 203;
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
		  
	$file_name = 0;
	$file_name = $file_name+1;
	$file_path = "../rto/penalty/$date/$vehicleno";
            if(is_dir($file_path)==false)
			{
                mkdir("$file_path", 0700, true);		// Create directory if it does not exist
            }
            if(is_dir("$file_path/".$file_name)==false)
			{
                $file_path = $file_path . basename( $_FILES['uploaded_file']['name']);
				if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
					echo "success";
				} else{
					echo "fail";
				}
            }else
			{									// rename the file if another one exist
                $new_dir="$file_path/".$file_name.time();
                 rename($file_tmp,$new_dir) ;				
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
		$sql="INSERT INTO smart_penalty(name, vehicle_no, penalty, paid_status, date, city, emp_id) VALUES ('$owname', '$veno', '$penalty', '$penalty_status', '$date', '$city', '$emp_id')";

		if (mysqli_query($conn, $sql)) 
		{
		
		$usr_name='App RTO Employee';
		
		// Create the email and send the message
		$to = $email; 
		$email_subject = "Your Vehicle Trailed";
		
		$email_body = "Mail From RTO Employee of Smart-Trail \n\n\n\n "."Dear, $owname Your Vehicle having Vehicle no:$veno is Trailed. It is requested to collect your vehicle $city policestation, $distict. Kindly, note that you must carry  your Identification proof. check:https://smart-trail.com/user/checkpenalty.php \n\n\n\n Thank YOU\n $usr_name\n Smart-Trail RTO Employee";
		
		$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
		
		$headers .= "Reply-To: $email";   
		
		mail($to,$email_subject,$email_body,$headers);
		//close Email
		
		//start sms
		$mno ="9979004778";
		$message ="Dear, $owname Your Vehicle having Vehicle no:$veno is Trailed. It is requested to collect your vehicle $city policestation, $distict. Kindly, note that you must carry  your Identification proof. check : https://smart-trail.com/user/checkpenalty.php";
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
		echo "send";
		//return true;
				//echo $buffer;
				//echo "<script type=\"text/javascript\">" . "alert('Sucessfully Add !!!');" . "</script>";
			} 
			curl_close($ch);
		}
		else 
		{
			echo "msg fail";
			//return false;
		}			
        }
		else
		{
			echo "fail";
			//return false;
		}
	}
	else
	{
		echo "Number Not Found";
	}
}
?>

<?php 
if($_SERVER["REQUEST_METHOD"]=="GET")
{
	$vehiclenumber=$_GET['vehiclenumber']; // enter your Android Variable
	getnumber($vehiclenumber);
}
?>
