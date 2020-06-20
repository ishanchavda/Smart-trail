<?php
session_start();
include_once '../inc/dbconfig.php';
?>
<?php if (isset($_SESSION['emp_id'])) { 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add Penalty | RTO Employee | Smart-Trail</title>
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
  <style>
  


.input-group-btn:last-child > .btn, .input-group-btn:last-child > .btn-group {

    color: white;
    background: #00c0ef;	
}
  </style>
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
              <span class="hidden-xs">Hello! &nbsp; <?php echo $_SESSION['emp_name'];?></span>
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
                <button type="submit" name="search" id="search-btn" class="btn btn-flat" style="color:#999;background: #374850;"><i class="fa fa-search"></i>
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
        <li class="active">
          <a href="addpenalty.php">
            <i class="fa fa-edit"></i><span>Add Penalty</span>
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
        Add Penalty
        <small>Smart-Trail</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Penalty</li>
      </ol>
    </section>

    <!-- Main content -->
	
    <section class="content">
      <div class="row">
	   <!-- right column -->
        <div class="col-md-12">
          <!-- general form elements disabled -->
          <div class="box">
            <div class="box-header with-border text-center">
              <h3 class="box-title">Add Penalty</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" role="form" enctype="multipart/form-data">
				
				<div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Vehicle No</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Vehicle NO (ex:GJ23AB1234)" name="vehicleno" required>
                </div>
				
				<div class="form-group col-md-6">
                  <label for="exampleInputFile">Select Images</label>
                  <input type="file" id="BSbtninfo" data-btnClass="btn-primary" name="files[]" multiple />
                </div>
				
				<div class="form-group col-md-6">
                  <label for="exampleInputEmail1">City</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter City Name" name="city" required>
                </div>
				
				<div class="form-group col-md-6">
                  <label>District</label>
                  <select class="form-control" name="distict">
                    <option value="Ahmedabad" selected>Ahmedabad</option>
					<option value="Amreli">Amreli</option>
					<option value="Anand">Anand</option>
					<option value="Aravalli">Aravalli</option>
					<option value="Banaskantha">Banaskantha</option>
					<option value="Bharuch">Bharuch</option>
					<option value="Bhavnagar">Bhavnagar</option>
					<option value="Botad">Botad</option>
					<option value="Chhota Udaipur">Chhota Udaipur</option>
					<option value="Dahod">Dahod</option>
					<option value="Dang">Dang</option>
					<option value="Devbhoomi Dwarka">Devbhoomi Dwarka</option>
					<option value="Gandhinagar">Gandhinagar</option>
					<option value="Gir Somnath">Gir Somnath</option>
					<option value="Jamnagar">Jamnagar</option>
					<option value="Junagadh">Junagadh</option>
					<option value="Kachchh">Kachchh</option>
					<option value="Kheda">Kheda</option>
					<option value="Mahisagar">Mahisagar</option>
					<option value="Mehsana">Mehsana</option>
					<option value="Morbi">Morbi</option>
					<option value="Narmada">Narmada</option>
					<option value="Navsari">Navsari</option>
					<option value="Panchmahal">Panchmahal</option>
					<option value="Patan">Patan</option>
					<option value="Porbandar">Porbandar</option>
					<option value="Rajkot">Rajkot</option>
					<option value="Sabarkantha">Sabarkantha</option>
					<option value="Surat">Surat</option>
					<option value="Surendranagar">Surendranagar</option>
					<option value="Tapi">Tapi</option>
					<option value="Vadodara">Vadodara</option>
					<option value="Valsad">Valsad</option>
                  </select>
                </div>
								
				<div class="box-footer text-center" style="border:none;">
				<input type="submit" class="btn btn-info" value="Add Penalty" name="addpenalty">
				<input type="reset" class="btn btn-default" value="Reset">
                </div>

              </form>   
            </div>
            <!-- /.box-body -->
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

<?php
if(isset($_POST['addpenalty']))
{
	$vehicleno= mysqli_real_escape_string($conn, $_POST['vehicleno']);
	$vehicleno= strtoupper($vehicleno);
	$distict= mysqli_real_escape_string($conn, $_POST['distict']);
	$city= mysqli_real_escape_string($conn, $_POST['city']);
	
	$qry="SELECT * FROM smart_vehicle WHERE vehicle_no = '". $vehicleno ."'";
	$result = mysqli_query($conn,$qry);
	$count = mysqli_num_rows($result);
	if($count==1)
	{
		
		$date=date("Y-m-d");
		$emp_id=$_SESSION['emp_id'];
		while($row = mysqli_fetch_array($result))
		  {
			$veid = $row['vehicle_id'];
			$veno = $row['vehicle_no'];			
			$vewh = $row['vehicle_wheels'];	
			$ownno = $row['owner_con_no'];	
			$owname = $row['vehicle_owner'];
			$email = $row['email'];
		  }
	$errors= array();
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name )
	{
		$file_name = $key;
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];	
        if($file_size > 2097152){
			$errors[]='File size must be less than 2 MB';
        }		
        $desired_dir="penalty/$date/$veno";
        if(empty($errors)==true)
		{
            if(is_dir($desired_dir)==false)
			{
                mkdir("$desired_dir", 0700, true);		// Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false)
			{
                move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
            }else
			{									// rename the file if another one exist
                $new_dir="$desired_dir/".$file_name.time();
                 rename($file_tmp,$new_dir) ;				
            }
		// mysql_query($query);			
        }
		else
		{
				echo "<script type=\"text/javascript\">" . "alert('$errors');" . "window.location = 'addpenalty.php';" . "</script>";
        }
    }
	if(empty($error))
	{
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
		{/*
		$usr_name=$_SESSION['emp_name'];
		// Create the email and send the message
		$to = $email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
		$email_subject = "Your Useris and Password";
		$email_body = "Mail From RTO Employee of Smart-Trail \n\n\n\n "."Dear,$owname Your Vehicle Which Vehicle no:$veno is Trailed. It ie requested to reach $city policestation, $distict. check:https://smart-trail.com/user/checkpenalty.php \n\n\n\n Thank YOU\n $usr_name\n Smart-Trail RTO Employee";
		$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
		$headers .= "Reply-To: $email";   
		mail($to,$email_subject,$email_body,$headers);*/
		//close Email
		/*/start sms
		$mno ="9979004778";
		$message ="Dear,$owname Your Vehicle Which Vehicle no:$veno is Trailed. It ie requested to reach $city policestation, $distict. check:https://smart-trail.com/user/checkpenalty.php";
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
				//echo $buffer;
				echo "<script type=\"text/javascript\">" . "alert('Sucessfully Add !!!');" . "window.location = 'addpenalty.php';" . "</script>";
			} 
			curl_close($ch);
		} else {
			echo "<script type=\"text/javascript\">" . "alert('Not Valid Information !!!');" . "window.location = 'addpenalty.php';" . "</script>";
		}*/	
		echo "<script type=\"text/javascript\">" . "alert('Sucessfully Add !!!');" . "window.location = 'addpenalty.php';" . "</script>";
		}
else
	{
		echo "<script type=\"text/javascript\">" . "alert('This No Not add');" . "window.location = 'addpenalty.php';" . "</script>";
	}		
	}
		
	}
	else
	{
		echo "<script type=\"text/javascript\">" . "alert('This Vehicle No Not Found');" . "window.location = 'addpenalty.php';" . "</script>";
	}
}
?>
  
  
  
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
<script type="text/javascript" src="../bower_components/bootstrap/js/bootstrap-filestyle.min.js"> </script>
<!-- Page script -->
<script>
			$('#BSbtndanger').filestyle({
				buttonName : 'btn-danger',
                buttonText : ' File selection'
			});
			$('#BSbtnsuccess').filestyle({
				buttonName : 'btn-success',
                buttonText : ' Open'
			});
			$('#BSbtninfo').filestyle({
				buttonName : 'btn-info',
                buttonText : ' Select a File',
				buttonColor: '#31b0d5'
			});                        
</script>
</body>
</html>
<?php } else { 
	header("Location: login.php");
	 } ?>