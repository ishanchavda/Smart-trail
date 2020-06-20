<?php
session_start();
include_once '../inc/dbconfig.php';
?>
<?php if (isset($_SESSION['usr_id'])) {
$username=$_SESSION['usr_name'];
?>
<?php
$error=false;
if(isset($_POST['addadmin'])) 
{

	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$adtype = mysqli_real_escape_string($conn, $_POST['adtype']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uname = mysqli_real_escape_string($conn, $_POST['uname']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$repassword = mysqli_real_escape_string($conn, $_POST['repassword']);

	if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['uname']) || empty($_POST['password']) || empty($_POST['repassword']))
	{
		echo "<script type=\"text/javascript\">" . "alert('Enter All Required Field');" . "window.location = 'addadmin.php';" . "</script>";
	}
	else
	{
	
	if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		$error=true;
		$nameerror="Name must contain only alphabets and space";
	}
	
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error=true;
		$emailerror="Please Enter Valid Email ID";
	}
	if(empty($adtype)){
		$error=true;
		$adtypeerror="Select Type";
	}
	if($adtype== "smart_admin")
	{
		$query="SELECT * FROM smart_admin WHERE sa_username= '". $uname ."' ";
		$result = mysqli_query($conn,$query);
		$count = mysqli_num_rows($result);
		if($count==1){
			$error=true;
			$usernameerror="Enter Unique Username";
			}
	}
	if($adtype== "smart_rto_admin")
	{
		$query="SELECT * FROM smart_rto_admin WHERE ra_username= '". $uname ."' ";
		$result = mysqli_query($conn,$query);
		$count = mysqli_num_rows($result);
		if($count==1){
			$error=true;
			$usernameerror="Enter Unique Username";
			}
	}
	if(strlen($password) < 6) {
		$error=true;
		$passworderror="Password must be minimum of 6 characters";
	}
	if($password != $repassword) {
		$error=true;
		$cpassworserror="Password and Confirm Password does not match";
	}

    if(!$error)
	{
	$sql="INSERT INTO $adtype VALUES ('', '$email', '$uname', '$password', '$name')";
	if(mysqli_query($conn,$sql))
	{
		$usr_name=$_SESSION['usr_name'];
		// Create the email and send the message
		$to = $email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
		$email_subject = "Your Useris and Password";
		$email_body = "Mail From Project Admin of Smart-Trail \n\n\n\n Your Username And Password Generator \n\n\n"."Name: $name\n Email: $email\n Username: $uname\n Password=$password\n Login : https://smart-trail.com/ \n\n\n\n Thank YOU\n $usr_name\n Smart-Trail Project Admin";
		$headers = "From: noreply@yourdomain.com\n";
		$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
		$headers .= "Reply-To: $email";   
		mail($to,$email_subject,$email_body,$headers);
		//close Email
		//start sms
		echo "<script type=\"text/javascript\">" . "alert('Successfully!!! Add Admin');" . "window.location = 'addparking.php';" . "</script>";
	}
	}
	
	else{$errormsg = "Error in registering...Please try again later!";}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add Admin | Smart-Trail Admin | Smart-Trail</title>
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>T</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Smart</b>-Trail</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#">			
              <span class="hidden-xs">Hello! &nbsp; <?php echo $username;?></span>
            </a>
          </li>
		  
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="logout.php"><i class="fa fa-fw fa-sign-out"></i> Sign out</a>
          </li>
		  
        </ul>
      </div>
    </nav>
  </header>
  
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="addparking.php">
            <i class="fa fa-edit"></i><span>Add Parking</span>
          </a>
        </li>
		<li class="active">
          <a href="addadmin.php">
            <i class="fa fa-edit"></i><span>Add Admin</span>
          </a>
        </li>
        <li>
          <a href="tables.php">
            <i class="fa fa-table"></i> <span>Tables</span>
          </a>
        </li>
        <li>
          <a href="calendar.php">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
          </a>
        </li>
        <li><a href="history.php"><i class="fa fa-book"></i> <span>History</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add 
        <small>Admin</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Admin</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
	   <!-- right column -->
        <div class="col-md-12">
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border text-center">
              <h3 class="box-title">Add Admin</h3>
            </div>
            <!-- /.box-header -->
			<span class="text-danger text-center"><h5><?php if (isset($errormsg)) { echo $errormsg; } ?></h5></span>
              <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" role="form">
			   <div class="box-body">
                <!-- text input -->
                <div class="form-group col-md-6">
                  <label>Full Name</label> <span class="text-danger"><?php if (isset($nameerror)) { echo $nameerror; } ?></span>
                  <input type="text" class="form-control" placeholder="Enter Full Name" name="name" >
                </div>
                <!-- textarea -->
                <div class="form-group col-md-6">
                  <label>Admin Type</label> <span class="text-danger"><?php if (isset($adtypeerror)) { echo $adtypeerror; } ?></span>
                  <select class="form-control" name="adtype" >
                    <option value="" selected>Select Admin Type</option>
                    <option value="smart_admin">Project Admin</option>
					<option value="smart_rto_admin">RTO Admin</option>
				  </select>
                </div>
				
				<!-- City -->
				<div class="form-group col-md-6">
                  <label>Email</label> <span class="text-danger"><?php if (isset($emailerror)) { echo $emailerror; } ?></span>
                  <input type="email" class="form-control" placeholder="Enter Email" name="email" >
                </div>
				
				<!-- City -->
				<div class="form-group col-md-6">
                  <label>Username</label> <span class="text-danger"><?php if (isset($usernameerror)) { echo $usernameerror; } ?></span>
                  <input type="text" class="form-control" placeholder="Enter Username" name="uname" >
                </div>
				
				<!-- City -->
				<div class="form-group col-md-6">
                  <label>Password</label> <span class="text-danger"><?php if (isset($passworderror)) { echo $passworderror; } ?></span>
                  <input type="password" class="form-control" placeholder="Enter Password" name="password" >
                </div>
				
				<!-- City -->
				<div class="form-group col-md-6">
                  <label> Confirm Password</label> <span class="text-danger"><?php if (isset($cpassworserror)) { echo $cpassworserror; } ?></span>
                  <input type="password" class="form-control" placeholder="Enter Confirm Password" name="repassword" >
                </div>
			    </div>
                <!-- /.box-body -->

				<div class="box-footer text-center">
				<input type="submit" class="btn btn-info" value="Add Admin" name="addadmin">
				<input type="reset" class="btn btn-default" value="Reset">
                </div>
              </form>

          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Project by <a href="../user/team.html">Group 7</a></b>
    </div>
    <strong>© 2018 <a href="../user">Smart-Trail</a>.</strong> All rights reserved.
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Page Script -->
<script>
  $(function () {
    //Add text editor
    $("#compose-textarea").wysihtml5();
  });
</script>
</body>
</html>
<?php } else { 
	header("Location: login.php");
	 } ?>
