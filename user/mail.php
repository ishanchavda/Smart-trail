<?php
// Check for empty fields
if(empty($_POST['Name'])      ||
   empty($_POST['Email'])     ||
   empty($_POST['Phone'])     ||
   empty($_POST['Subject'])     ||
   empty($_POST['Message'])   ||
   !filter_var($_POST['Email'],FILTER_VALIDATE_EMAIL))
   {
   echo "<script type=\"text/javascript\">" . "alert('Enter Valid Inputs');" . "window.location = 'contact.php';" . "</script>";   
   }
   
$name = strip_tags(htmlspecialchars($_POST['Name']));
$email_address = strip_tags(htmlspecialchars($_POST['Email']));
$sub = strip_tags(htmlspecialchars($_POST['Subject']));
$phone = strip_tags(htmlspecialchars($_POST['Phone']));
$message = strip_tags(htmlspecialchars($_POST['Message']));
   
// Create the email and send the message
$to = 'strail2018@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\n
Name: $name\n\n
Email: $email_address\n\n
Phone: $phone\n\n
Subject: $sub\n\n
Message: \n$message";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);
echo "<script type=\"text/javascript\">" . "alert('Your Message Sucessfully Sent');" . "window.location = 'contact.php';" . "</script>";          
?>
