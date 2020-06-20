<?php
session_start();
include_once '../inc/dbconfig.php';
?>
<?php if (isset($_SESSION['usr_id'])) {
$username=$_SESSION['usr_name'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add Parking Location | Smart-Trail Admin | Smart-Trail</title>
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
        <li class="active">
          <a href="addparking.php">
            <i class="fa fa-edit"></i><span>Add Parking</span>
          </a>
        </li>
		<li>
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
        Add Parking
        <small>Location</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Parking</li>
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
              <h3 class="box-title">Add Parking Location</h3>
            </div>
            
              <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" role="form">
			  <!-- /.box-header -->
              <div class="box-body">
                <!-- text input -->
                <div class="form-group col-md-6">
                  <label>Name</label>
                  <input type="text" class="form-control" placeholder="Enter Parking Name" name="pname">
                </div>
                <!-- textarea -->
                <div class="form-group col-md-6">
                  <label>Address</label>
                  <textarea class="form-control" rows="1" placeholder="Enter Address" name="paddress"></textarea>
                </div>
				
				<!-- City -->
				<div class="form-group col-md-3">
                  <label>City</label>
                  <input type="text" class="form-control" placeholder="Enter City" name="pcity">
                </div>

                <!-- select -->
                <div class="form-group col-md-3 ">
                  <label>District</label>
                  <select class="form-control" name="pdistrict">
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
				
				<!-- pincode -->
				<div class="form-group col-md-3">
                  <label>Pincode</label>
                  <input type="text" class="form-control" placeholder="Enter Pincode" name="ppin">
                </div>
				
				<!-- state -->
				<div class="form-group col-md-3">
                  <label>State</label>
                  <input type="text" class="form-control" value="Gujarat" name="pstate">
                </div>
				
				<!-- Latitude -->
				<div class="form-group col-md-6">
                  <label>Latitude</label>
                  <input type="text" class="form-control" placeholder="Enter Latitude" name="plat">
                </div>
				
				<!-- longitude -->
				<div class="form-group col-md-6">
                  <label>Longitude</label>
                  <input type="text" class="form-control" placeholder="Enter Longitude" name="plng">
                </div>
				
			  </div>
             <!-- /.box-body --> 
			 
			 <div class="box-footer text-center">
				<input type="submit" class="btn btn-info" value="Add Location" name="addlocation">
				<input type="reset" class="btn btn-default" value="Reset">
                </div>
<?php
				
				
			
if(isset($_POST['addlocation'])) 
{
	$lat=0;
	$lng=0;
	$name = mysqli_real_escape_string($conn, $_POST['pname']);
	$address = mysqli_real_escape_string($conn, $_POST['paddress']);
	$city = mysqli_real_escape_string($conn, $_POST['pcity']);
	$district = mysqli_real_escape_string($conn, $_POST['pdistrict']);
	$state = mysqli_real_escape_string($conn, $_POST['pstate']);
	$pincode = mysqli_real_escape_string($conn, $_POST['ppin']);
	$lat = mysqli_real_escape_string($conn, $_POST['plat']);
	$lng = mysqli_real_escape_string($conn, $_POST['plng']);
	if(empty($_POST['pname']) || empty($_POST['paddress']) || empty($_POST['pcity']) || empty($_POST['pdistrict']))
	{
		echo "<script type=\"text/javascript\">" . "alert('Enter All Required Field');" . "window.location = 'addparking.php';" . "</script>";
	}
	else
	{
	$address = $address . ", " . $city . ", " . $district . ", " . $state ." ".$pincode;
	$query="SELECT * FROM smart_admin WHERE sa_id= ". $_SESSION['usr_id'] ." ";
	$result = mysqli_query($conn,$query);
		$count = mysqli_num_rows($result);
		if($count>0){
		while($row = mysqli_fetch_array($result))
		  {
			$adminid = $row['sa_id'];
			$adminusername = $row['sa_username'];	
		  }
		}
	date_default_timezone_set('Asia/Kolkata');
	$date=date("Y-m-d H:i:s");
	$sql="INSERT INTO markers(name, address, date, admin_id, admin_username, lat, lng) VALUES ('$name', '$address', '$date', '$adminid', '$adminusername', '$lat', '$lng')";
	if(mysqli_query($conn,$sql))
	{
		include_once '../user/latlongstore.php';
		echo "<script type=\"text/javascript\">" . "alert('Successfully!!! Add Parking Location');" . "window.location = 'addparking.php';" . "</script>";
	}
	}
}
?>
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
