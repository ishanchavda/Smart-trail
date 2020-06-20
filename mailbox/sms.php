<?php
	if(isset($_POST["submit"]))
	{
		//echo "submitted";
		$mno = "9979004778";
		$message =  $_POST["message"];
		if(preg_match( '/^[A-Z0-9]{10}$/', $mno) && !empty($message)) {
			$ch = curl_init();
			$user="strail2018@gmail.com:smart2018";
			$receipientno=$_POST["mno"];
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
				echo $buffer;
				echo 'Message Send.';
			} 
			curl_close($ch);
		} else {
			echo 'Not Valid Information';
		}
	}
?>
 
<html>
	<head>
		<title>SMS Sending Using PHP and Mvaayoo API</title>
	</head>
	<body align="center">
	<h1>SMS Sending Using PHP and Mvaayoo API</h1>
		<form action="" method="post">
			  Enter mobile no<br>
			  <input type="text" name="mno"><br>
			  Message<br>
			  <textarea type="text" name="message"></textarea><br>
			  <br>
			  <input type="submit"  name="submit" value="Send"/>
		</form>
		<h3>Total Remaining SMS</h3>
		<?php 
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL,  "http://api.mvaayoo.com/mvaayooapi/APIUtil");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "Your Email And password&type=0");
			$buffer = curl_exec($ch);
			echo $buffer;
			curl_close($ch);
		?>
 
		<h3 style="color:red"> www.TechsoftTutorials.com</h3> 
	</body>
</html>