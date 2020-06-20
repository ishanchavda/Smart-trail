<?php
session_start();

if(isset($_SESSION['emp_id']))
{	session_destroy();
	unset($_SESSION['emp_id']);
	unset($_SESSION['emp_name']);
	unset($_SESSION['emp_email']);
	header("Location: index.php");
}
else
{	header("Location: index.php");
}
?>
