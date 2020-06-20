<?php
session_start();
include_once '../inc/dbconfig.php';
?>
<?php if (isset($_SESSION['usr_id'])) {
$userid=$_SESSION['usr_id'];
$username=$_SESSION['usr_name'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Tables | Smart-Trail Admin | Smart-Trail</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
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
            <i class="fa fa-edit"></i> <span>Add Parking</span>
          </a>
        </li>
		<li>
          <a href="addadmin.php">
            <i class="fa fa-edit"></i><span>Add Admin</span>
          </a>
        </li>
        <li class="active">
          <a href="tables.php">
            <i class="fa fa-table"></i><span>Tables</span>
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
        Tables
        <small>Smart-Trail</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tables</li>
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
              <h3 class="box-title">Show Tables</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" role="form">
                <!-- select -->
                <div class="form-group col-md-offset-2 col-md-6 ">
                  <select class="form-control" name="tablename" >
                    <option value="" selected> Select Table</option>
                    <option value="smart_admin"> Project Admin</option>
                    <option value="smart_admin_visitor" >Project Admin Visitor</option>
                    <option value="events" >Calendar Events</option>
                    <option value="markers" >Parking Location</option>
                    <option value="smart_penalty">Penalty</option>
					<option value="smart_rto_admin">RTO Admin</option>
					<option value="smart_rto_admin_visitor">RTO Admin Visitor</option>
					<option value="smart_rto_employee">RTO Employee</option>
                  </select>
                </div>
								
				<div class="form-group col-md-3 ">
				<input type="submit" class="btn btn-info" value="Search" name="searchtable">
                </div>
              </form>   
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        
		
<?php
if(isset($_POST['searchtable'])) 
{
	
	$tablename = mysqli_real_escape_string($conn, $_POST['tablename']);

	if(empty($_POST['tablename']))
	{
		echo "<script type=\"text/javascript\">" . "alert('Select Table Name !!!');" . "window.location = 'tables.php';" . "</script>";
	}
	else
	{
	$sql="SELECT * FROM " . $tablename ." ";

	if($tablename=="smart_admin")
	{?>
		    <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo " Table Name: Project Admin ( ".$tablename." )";?></h3>		  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Admin ID</th>
                  <th>Admin Username</th>
                  <th>Admin Password</th>
                  <th>Admin Email</th>
                </tr>
                </thead>
                <tbody>
<?php
	if($result=mysqli_query($conn,$sql))
	{
		while ($row=mysqli_fetch_array($result))
			{
			 static $no=0;
			 $adminid=$row['sa_id'];
			 $adminusername=$row['sa_username'];
			 $adminpassword=$row['sa_password'];
			 $adminemail=$row['sa_email'];
			 $no=$no+1;
?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $adminid; ?></td>
                  <td><?php echo $adminusername; ?></td>
                  <td><?php echo $adminpassword; ?></td>
                  <td><?php echo $adminemail; ?></td>

                </tr>
<?php
	        }
	}?>
				</tbody>
				<tfoot>
                <tr>
                  <th>No</th>
                  <th>Admin ID</th>
                  <th>Admin Username</th>
                  <th>Admin Password</th>
                  <th>Admin Email</th>
                </tr>
                </tfoot>
              </table>
			</div>
            <!-- /.box-body -->
            </div>
          <!-- /.box -->
<?php
	}
	if($tablename=="smart_admin_visitor")
	{?>
		    <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo " Table Name: Project Admin Visitor ( ".$tablename." )";?></h3>		  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Admin ID</th>
                  <th>Admin Username</th>
                  <th>Login Date</th>
                  <th>IP</th>
                </tr>
                </thead>
                <tbody>
<?php
		if($result=mysqli_query($conn,$sql))
	{
		while ($row=mysqli_fetch_array($result))
			{
			 static $no=0;
			 $adminid=$row['admin_id'];
			 $adminusername=$row['admin_username'];
			 $logindate=$row['date'];
			 $adminip=$row['ip'];
			 $no=$no+1;
?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $adminid; ?></td>
                  <td><?php echo $adminusername; ?></td>
                  <td><?php echo $logindate; ?></td>
                  <td><?php echo $adminip; ?></td>
                </tr>
<?php
	        }
	}?>
				</tbody>
				<tfoot>
                <tr>
                  <th>No</th>
                  <th>Admin ID</th>
                  <th>Admin Username</th>
                  <th>Login Date</th>
                  <th>IP</th>
                </tr>
                </tfoot>
              </table>
			</div>
            <!-- /.box-body -->
            </div>
          <!-- /.box -->
<?php
	}
	if($tablename=="smart_rto_admin_visitor")
	{?>
		    <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo " Table Name: RTO Admin Visitor ( ".$tablename." )";?></h3>		  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Admin ID</th>
                  <th>Admin Username</th>
                  <th>Login Date</th>
                  <th>IP</th>
                </tr>
                </thead>
                <tbody>
<?php
		if($result=mysqli_query($conn,$sql))
	{
		while ($row=mysqli_fetch_array($result))
			{
			 static $no=0;
			 $adminid=$row['admin_id'];
			 $adminusername=$row['admin_username'];
			 $logindate=$row['date'];
			 $adminip=$row['ip'];
			 $no=$no+1;
?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $adminid; ?></td>
                  <td><?php echo $adminusername; ?></td>
                  <td><?php echo $logindate; ?></td>
                  <td><?php echo $adminip; ?></td>
                </tr>
<?php
	        }
	}?>
				</tbody>
				<tfoot>
                <tr>
                  <th>No</th>
                  <th>Admin ID</th>
                  <th>Admin Username</th>
                  <th>Login Date</th>
                  <th>IP</th>
                </tr>
                </tfoot>
              </table>
			</div>
            <!-- /.box-body -->
            </div>
          <!-- /.box -->
<?php
	}
	if($tablename=="smart_rto_admin")
	{?>
		    <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo " Table Name: RTO Admin ( ".$tablename." )";?></h3>		  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Admin ID</th>
                  <th>Admin Username</th>
                  <th>Admin Password</th>
                  <th>Admin Email</th>
                </tr>
                </thead>
                <tbody>
<?php
	if($result=mysqli_query($conn,$sql))
	{
		while ($row=mysqli_fetch_array($result))
			{
			 static $no=0;
			 $adminid=$row['ra_id'];
			 $adminusername=$row['ra_username'];
			 $adminpassword=$row['ra_password'];
			 $adminemail=$row['ra_email'];			 
			 $no=$no+1;
?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $adminid; ?></td>
                  <td><?php echo $adminusername; ?></td>
                  <td><?php echo $adminpassword; ?></td>
                  <td><?php echo $adminemail; ?></td>
                </tr>
<?php
	        }
	}?>
				</tbody>
				<tfoot>
                <tr>
                  <th>No</th>
                  <th>Admin ID</th>
                  <th>Admin Username</th>
                  <th>Admin Password</th>
                  <th>Admin Email</th>
                </tr>
                </tfoot>
              </table>
			</div>
            <!-- /.box-body -->
            </div>
          <!-- /.box -->
<?php
	}
	if($tablename=="smart_penalty")
	{?>
		    <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo " Table Name: Penalty ( ".$tablename." )";?></h3>		  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Vehicle No</th>
                  <th>Penalty</th>
                  <th>Paid Status</th>
                  <th>Date</th>
                  <th>City</th>
                  <th>Emp id</th>
                </tr>
                </thead>
                <tbody>
<?php
	if($result=mysqli_query($conn,$sql))
	{
		while ($row=mysqli_fetch_array($result))
		{
			 static $no=0;
			 $name=$row['name'];
			 $vehicle=$row['vehicle_no'];
			 $penalty=$row['penalty'];
			 $paid=$row['paid_status'];
			 $date=$row['date'];
			 $city=$row['city'];
			 $empid=$row['emp_id'];
			 $no=$no+1;
?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $name; ?></td>
                  <td><?php echo $vehicle; ?></td>
                  <td><?php echo $penalty; ?></td>
                  <td><?php echo $paid; ?></td>
                  <td><?php echo $date; ?></td>
                  <td><?php echo $city; ?></td>
                  <td><?php echo $empid; ?></td>
                </tr>
<?php
	    }
	}?>
				</tbody>
				<tfoot>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Vehicle No</th>
                  <th>Penalty</th>
                  <th>Paid Status</th>
                  <th>Date</th>
                  <th>City</th>
                  <th>Emp id</th>
                </tr>
                </tfoot>
              </table>
			</div>
            <!-- /.box-body -->
            </div>
          <!-- /.box -->
<?php
	}
	if($tablename=="events")
	{?>
		    <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo " Table Name: Calendar Events ( ".$tablename." )";?></h3>		  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>User Name</th>
                  <th>User ID</th>
                  <th>Title</th>
                  <th>Start Event</th>
                  <th>End Event</th>
                </tr>
                </thead>
                <tbody>
<?php
	if($result=mysqli_query($conn,$sql))
	{
		while ($row=mysqli_fetch_array($result))
		{
			 static $no=0;
			 $username=$row['users_name'];
			 $userid=$row['users_id'];
			 $title=$row['title'];
			 $start=$row['start'];
			 $end=$row['end'];

			 $no=$no+1;
?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $username; ?></td>
                  <td><?php echo $userid; ?></td>
                  <td><?php echo $title; ?></td>
                  <td><?php echo $start; ?></td>
                  <td><?php echo $end; ?></td>
                </tr>
<?php
	    }
	}?>
				</tbody>
				<tfoot>
                <tr>
                  <th>No</th>
                  <th>User Name</th>
                  <th>User ID</th>
                  <th>Title</th>
                  <th>Start Event</th>
                  <th>End Event</th>
                </tr>
                </tfoot>
              </table>
			</div>
            <!-- /.box-body -->
            </div>
          <!-- /.box -->
<?php
	}
	if($tablename=="markers")
	{?>
		    <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo " Table Name: Parking Location ( ".$tablename." )";?></h3>		  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Latitude</th>
                  <th>Longitude</th>
                  <th>Date</th>
                  <th>Admin ID</th>
                  <th>Admin Username</th>
                </tr>
                </thead>
                <tbody>
<?php
	if($result=mysqli_query($conn,$sql))
	{
		while ($row=mysqli_fetch_array($result))
		{
			 static $no=0;
			 $name=$row['name'];
			 $adr=$row['address'];
			 $lat=$row['lat'];
			 $lng=$row['lng'];
			 $date=$row['date'];
			 $adid=$row['admin_id'];
			 $adun=$row['admin_username'];

			 $no=$no+1;
?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $name; ?></td>
                  <td><?php echo $adr; ?></td>
                  <td><?php echo $lat; ?></td>
                  <td><?php echo $lng; ?></td>
                  <td><?php echo $date; ?></td>
                  <td><?php echo $adid; ?></td>
                  <td><?php echo $adun; ?></td>
                </tr>
<?php
	    }
	}?>
				</tbody>
				<tfoot>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Latitude</th>
                  <th>Longitude</th>
                  <th>Date</th>
                  <th>Admin ID</th>
                  <th>Admin Username</th>
                </tr>
                </tfoot>
              </table>
			</div>
            <!-- /.box-body -->
            </div>
          <!-- /.box -->
<?php
	}
	if($tablename=="smart_rto_employee")
	{?>
		    <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo " Table Name: RTO Employee ( ".$tablename." )";?></h3>		  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Emp ID</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Contact</th>
                  <th>Email</th>                 
                  <th>Admin ID</th>
                  <th>Admin Username</th>
				  <th>Register Date</th>
                </tr>
                </thead>
                <tbody>
<?php
	if($result=mysqli_query($conn,$sql))
	{
		while ($row=mysqli_fetch_array($result))
		{
			 static $no=0;
			 $name=$row['name'];
			 $eid=$row['id'];
			 $un=$row['username'];
			 $psd=$row['password'];
			 $mo=$row['mobileno'];
			 $email=$row['email'];
			 $adid=$row['adminid'];
			 $adun=$row['adminusername'];
			 $date=$row['register_date'];

			 $no=$no+1;
?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $name; ?></td>
                  <td><?php echo $eid; ?></td>
                  <td><?php echo $un; ?></td>
                  <td><?php echo $psd; ?></td>
                  <td><?php echo $mo; ?></td>
                  <td><?php echo $email; ?></td>
                  <td><?php echo $adid; ?></td>
                  <td><?php echo $adun; ?></td>
				  <td><?php echo $date; ?></td>
                </tr>
<?php
	    }
	}?>
				</tbody>
				<tfoot>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Contact</th>
                  <th>Email</th>                 
                  <th>Admin ID</th>
                  <th>Admin Username</th>
				  <th>Register Date</th>
                </tr>
                </tfoot>
              </table>
			</div>
            <!-- /.box-body -->
            </div>
          <!-- /.box -->
<?php
	}
	}
?>

<?php
}
?> 

		
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
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
	//Add text editor

    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
<?php } else { 
	header("Location: login.php");
	 } ?>
