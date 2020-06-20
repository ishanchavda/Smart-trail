<?php
session_start();

if(isset($_SESSION['rto_id']))
{	session_destroy();
	unset($_SESSION['rto_id']);
	unset($_SESSION['rto_name']);
	unset($_SESSION['rto_email']);
	header("Location: index.php");
}
else
{	header("Location: index.php");
}
?>
