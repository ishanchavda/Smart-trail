<?php
$date=date("Y-m-d");
$qry="INSERT INTO smart_user_mail(send_id, subject, message, rec_date, send_name, rec_name) VALUES ('$adminid', '$sub', '$email_body', '$date', '$adminname', '$to')";
if (mysqli_query($conn, $qry)) {
echo "<script type=\"text/javascript\">" . "alert('Your Message Sucessfully Sent !!!');" . "window.location = 'index.php';" . "</script>";   
}
else
{
	echo "<script type=\"text/javascript\">" . "alert('Message Fail !!!');" . "window.location = 'index.php';" . "</script>";   
}
?>