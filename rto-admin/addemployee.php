<?php
session_start();
include_once '../inc/dbconfig.php';
?>
<?php if (isset($_SESSION['rto_id'])) { 
?>
<?php
$error=false;
if(isset($_POST['addemployee'])) 
{
	$name = mysqli_real_escape_string($conn, $_POST['ename']);
	$gender = mysqli_real_escape_string($conn, $_POST['egender']);
	$dob = mysqli_real_escape_string($conn, $_POST['edob']);
	$address = mysqli_real_escape_string($conn, $_POST['eaddress']);
	$state = mysqli_real_escape_string($conn, $_POST['estate']);
	$aadhar = mysqli_real_escape_string($conn, $_POST['eaadhar']);
	$driving = mysqli_real_escape_string($conn, $_POST['edriving']);
	$username = mysqli_real_escape_string($conn, $_POST['eusername']);
	$password = mysqli_real_escape_string($conn, $_POST['epassword']);
	$mobileno = mysqli_real_escape_string($conn, $_POST['emono']);
	$alternative_no = mysqli_real_escape_string($conn, $_POST['ealno']);
	$pincode = mysqli_real_escape_string($conn, $_POST['epin']);
	$email = mysqli_real_escape_string($conn, $_POST['eemail']);
	date_default_timezone_set('Asia/Kolkata');
	$date=date("Y-m-d H:i:s");

	$qry="SELECT * FROM smart_rto_employee WHERE username = '". $username ." ' ";
	$result = mysqli_query($conn,$qry);
	$count = mysqli_num_rows($result);
	
	if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		$error=true;
		$nameerror="Name Must Contain only Alphabets and Space";
	}
	if (empty($dob) || $dob > $date) {
		$error=true;
		$doberror="Correct Birthdate";
	}
	if (strlen($aadhar) != 12) {
		$error=true;
		$aadharerror="Aadhar No Must be 12 Digits";	
	}
	else if (!preg_match("/^\d{4}\s{0}\d{4}\s{0}\d{4}$/",$aadhar)) {
		$error=true;
		$aadharerror="Aadhar No Must Contain only Digits";
	}
	if (!preg_match("/^(?<intro>[A-Z]{2})(?<numeric>\d{2})(?<year>\d{4})(?<tail>\d{7})$/",$driving)) {
		$error=true;
		$drivingerror="Enter Valid Licence Number";
	}
	if($count==1){
		$error=true;
		$usernameerror="Enter Unqiue Username";
	}
	else if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/",$username)){
		$error=true;
		$usernameerror="Minimum Six Characters, At least One Letter and One Number";
	}
	if(strlen($password) < 6) {
		$error=true;
		$passworderror="Password Must be Minimum Six Characters";
	}
	else if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/",$password)) {
		$error=true;
		$passworderror="At least One Letter and One Number";
	}	
	if(!preg_match("/^[6789]\d{9}$/",$mobileno)) {
		$error=true;
		$mobilerror="Enter Correct Number";
	}
	if(!preg_match("/^[6789]\d{9}$/",$alternative_no) && $alternative_no!="") {
		$error=true;
		$almobilerror="Enter Correct Number";
	}
	if(!preg_match("/^[1-9][0-9]{5}$/",$pincode)) {
		$error=true;
		$pincoderror="Valid Pincode";
	}
	
	if(!$error)
	{
	$address = $address . ", " . $state ;
	$query="SELECT * FROM smart_rto_admin WHERE ra_id= ". $_SESSION['rto_id'] ." ";
	$result = mysqli_query($conn,$query);
		$count = mysqli_num_rows($result);
		if($count>0){
		while($row = mysqli_fetch_array($result))
		  {
			$adminid = $row['ra_id'];
			$adminusername = $row['ra_username'];	
		  }
		}

	$sql="INSERT INTO smart_rto_employee(name, gender, dob, address, pincode, aadharno, driving_licence_no, username, password, mobileno, alternative_no, adminid, adminusername, register_date, email) VALUES ('$name', '$gender', '$dob', '$address', '$pincode', '$aadhar', '$driving', '$username', '$password', '$mobileno', '$alternative_no', '$adminid', '$adminusername', '$date', '$email' )";
	if(mysqli_query($conn,$sql))
	{	$usr_name=$_SESSION['rto_name'];
		// Create the email and send the message
		$to = $email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
		$email_subject = "Your Useris and Password";
		$email_body = "Mail From RTO Admin of Smart-Trail \n\n\n\n Your Username And Password Generator \n\n\n"."Name: $name\n Email: $email\n Username: $username\n Password=$password\n Login : https://smart-trail.com/rto \n\n\n\n Thank YOU\n $usr_name\n Smart-Trail RTO Admin";
		$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
		$headers .= "Reply-To: $email";   
		mail($to,$email_subject,$email_body,$headers);
		//close Email
		
		//start sms
		$mno = "9979004778";
		$message =  "Now You are Employee of Smart-Trail. Your username:$username and Password:$password . Login : https://smart-trail.com/rto";
		if(preg_match( '/^[A-Z0-9]{10}$/', $mno) && !empty($message)) {
			$ch = curl_init();
			$user="strail2018@gmail.com:smart2018";
			$receipientno= $mobileno;
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
				echo "<script type=\"text/javascript\">" . "alert('Successfully!!! Add Employee');" . "window.location = 'addemployee.php';" . "</script>";
			} 
			curl_close($ch);
		} else {
			echo "<script type=\"text/javascript\">" . "alert('Not Valid Information');" . "window.location = 'addemployee.php';" . "</script>";
		}
	
	}
	else 
	{		$errormsg = "Error in registering...Please try again later!";
	}
	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add RTO Employee | RTO Admin | Smart-Trail</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

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
              <span class="hidden-xs">Hello! &nbsp; <?php echo $_SESSION['rto_name'];?></span>
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
          <a href="addvehicle.php">
            <i class="fa fa-edit"></i> <span>Add Vehicle Detail</span>
          </a>
        </li>
        <li class="active">
          <a href="addemployee.php">
            <i class="fa fa-edit"></i><span>Add Employee</span>
          </a>
        </li>
        <li>
          <a href="penalty.php">
            <i class="fa fa-table"></i> <span>Penalty</span>
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
        Add RTO
        <small>employee</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Employee</li>
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
              <h3 class="box-title">Add RTO Employee</h3>
            </div>
            <!-- /.box-header -->
            <span class="text-danger text-center"><h5><?php if (isset($errormsg)) { echo $errormsg; } ?></h5></span>
              <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" role="form">
                <!-- text input -->
            <div class="box-body">
				<div class="form-group col-md-6">
                  <label>Name</label> <span class="text-danger"><?php if (isset($nameerror)) { echo $nameerror; } ?></span>
                  <input type="text" class="form-control" placeholder="Enter Full Name" name="ename">
                </div>
                
				<!-- gender -->
                <div class="form-group col-md-3">
                  <label>Gender</label>
                  <select class="form-control" name="egender">
                    <option value="Male" selected>Male</option>
					<option value="Female">Female</option>
				  </select>
				</div>
				
				<!-- Date -->
                <div class="form-group col-md-3">
                <label>Birth Date:</label> <span class="text-danger"><?php if (isset($doberror)) { echo $doberror; } ?></span>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker" name="edob" >
                </div>
                <!-- /.input group -->
                </div>
				
				<!-- aadharno -->
				<div class="form-group col-md-6">
                  <label>Aadhar No</label> <span class="text-danger"><?php if (isset($aadharerror)) { echo $aadharerror; } ?></span>
                  <input type="text" class="form-control" placeholder="Enter Aadhar No" name="eaadhar" >
                </div>
				
				<!-- licence -->
				<div class="form-group col-md-6">
                  <label>Driving Licence No</label> <span class="text-danger"><?php if (isset($drivingerror)) { echo $drivingerror; } ?></span>
                  <input type="text" class="form-control" placeholder="Enter Driving Licence No (ex: GJ0120120014306)" name="edriving">
				  
                </div>
				
				<!-- username -->
				<div class="form-group col-md-6">
                  <label>Username</label> <span class="text-danger"><?php if (isset($usernameerror)) { echo $usernameerror; } ?></span>
                  <input type="text" class="form-control" placeholder="Enter Username" name="eusername">
                </div>
				
				<!-- password -->
				<div class="form-group col-md-6">
                  <label>Password</label> <span class="text-danger"><?php if (isset($passworderror)) { echo $passworderror; } ?></span>
                  <input type="password" class="form-control" placeholder="Enter Password" name="epassword" >
                </div>
				
				<!-- contact no --> 
				<div class="form-group col-md-6">
                  <label>Mobile Number</label> <span class="text-danger"><?php if (isset($mobilerror)) { echo $mobilerror; } ?></span>
                  <input type="text" class="form-control" placeholder="Enter Mobile No" name="emono">
                </div>
				
				<!-- alternative no -->
				<div class="form-group col-md-6">
                  <label>Alternative Contact Number</label> <span class="text-danger"><?php if (isset($almobilerror)) { echo $almobilerror; } ?></span>
                  <input type="text" class="form-control" placeholder="Enter Alternative No" name="ealno">	  
                </div>
				
				<div class="form-group col-md-6">
                  <label>Email</label>
                  <input type="email" class="form-control" placeholder="Enter Mobile Email" name="eemail" >
                </div>
				
				<!-- alternative no -->
				<div class="form-group col-md-6">
                  <label>Alternative Email</label>
                  <input type="email" class="form-control" placeholder="Enter Alternative Email" name="eaemail">
                </div>
				
				<!-- textarea -->
                <div class="form-group col-md-6">
                  <label>Address</label>
                  <textarea class="form-control" rows="1" placeholder="Enter Address" name="eaddress" ></textarea>
                </div>
				
				<!-- pincode -->
				<div class="form-group col-md-3">
                  <label>Pincode</label> <span class="text-danger"><?php if (isset($pincoderror)) { echo $pincoderror; } ?></span>
                  <input type="text" class="form-control" placeholder="Enter Pincode" name="epin" >		  
                </div>
				
				<!-- state -->
				<div class="form-group col-md-3">
                  <label>State</label>
                  <input type="text" class="form-control" name="estate" value="Gujarat" >
                </div>
			</div>
        <!-- /.box-body -->
				<div class="box-footer text-center">
				<input type="submit" class="btn btn-info" value="Add Employee" name="addemployee">
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
<!-- Select2 -->
<script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'DD/MM/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
	$('#datepicker').inputmask('yyyy-mm-dd', { 'placeholder': 'yyyy-mm-dd' })
    $('#datepicker').datepicker({
      format: 'yyyy-mm-dd',
	  autoclose: true
    })
	

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
</body>
</html>
<?php } else { 
	header("Location: login.php");
	 } ?>