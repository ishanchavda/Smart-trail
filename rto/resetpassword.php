<?php
include_once '../inc/dbconfig.php';

if (isset($_POST['change'])) 
{
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$repassword = mysqli_real_escape_string($conn, $_POST['repassword']);
	$sql="SELECT * FROM smart_rto_employee WHERE (email = '" . $email. "' OR username = '".$email. "')";
	$result = mysqli_query($conn,$sql);
	$count = mysqli_num_rows($result);
	if($count==1)
	{ $error=false;
		if($row = mysqli_fetch_array($result))
		  {
			$id = $row['ra_id'];	
		  }

		if(strlen($password) < 6) 
		{
			$error = true;
			$password_error = "Password must be minimum of 6 characters";
		}
		if($password != $repassword) 
		{
			$error = true;
			$repassword_error = "Password and Confirm Password doesn't match";
		}
		if (!$error) 
		{
			if(mysqli_query($conn, "UPDATE smart_rto_employee SET password='$password' WHERE id='$id'"))
			{
				echo "<script type=\"text/javascript\">" . "alert('successfully Password Updated');" . "window.location = 'login.php';" . "</script>";
			} 	
			else 
			{
				$errormsg = "Error in Updating...Please try again later!";
			}
		}
	}
	else
	{
		$errormsg = "This Username OR Email is Not Found !!!";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Reset Password | Smart-Trail RTO Employee | Smart-Trail</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Smart</b>-Trail</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Reset Your Password</p>	
	<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Email or Username" name="email" id='username'>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Reset Password" name="password" id="pass">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
      </div>
	  <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Confirm Password" name="repassword" id="repass">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		<span class="text-danger"><?php if (isset($repassword_error)) echo $repassword_error; ?></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-offset-7 col-xs-5">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="change">Reset Password</button>
        </div>


        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
</body>
</html>
