<?php
session_start();
include_once '../inc/dbconfig.php';
?>
<?php
$id=$_SESSION['usr_id'];
$uname=$_SESSION['usr_name'];

if(isset($_POST['send']))
{	
	$to = mysqli_real_escape_string($conn,$_POST['to']);
	$sub = mysqli_real_escape_string($conn,$_POST['subject']);
	$msg = mysqli_real_escape_string($conn,$_POST['mailbody']);
	$file=$_FILES['file']['name'];
	
	if(empty($_POST['to']) || empty($_POST['subject']) || empty($_POST['mailbody']))
	{
	echo "<script type=\"text/javascript\">" . "alert('Enter All Required Field');" . "window.location = 'compose.php';" . "</script>";
	}
	
	else
	{
	$result=mysqli_query($conn,"SELECT * FROM smart_admin where sa_username='$to' OR sa_email='$to'");
	$row=mysqli_num_rows($result);
	if($row==1)
		{
		while($rows = mysqli_fetch_array($result))
		 {$rid = $rows['sa_id'];}
		mysqli_query($conn,"INSERT INTO smart_user_mail values('','$rid','$id','$sub','$msg','',sysdate(),'$to','$uname')");
		echo "<script type=\"text/javascript\">" . "alert('Message Sucuessfully Sent !!!');" . "window.location = 'compose.php';" . "</script>";
		}
	else
		{
		$result=mysqli_query($conn,"SELECT * FROM smart_rto_admin where ra_username='$to' OR ra_email='$to'");
		$row=mysqli_num_rows($result);
		if($row==1)
		{
		while($rows = mysqli_fetch_array($result))
		 {$rid = $rows['ra_id'];}
			mysqli_query($conn,"INSERT INTO smart_user_mail values('','$rid','$id','$sub','$msg','',sysdate(),'$uname','$to')");
			echo "<script type=\"text/javascript\">" . "alert('Message Sucuessfully Sent !!!');" . "window.location = 'compose.php';" . "</script>";
		}
		else
		{
			$result=mysqli_query($conn,"SELECT * FROM smart_rto_employee where username='$to' OR email='$to'");
			$row=mysqli_num_rows($result);
			if($row==1)
			{
				while($rows = mysqli_fetch_array($result))
		        {$rid = $rows['id'];}
				mysqli_query($conn,"INSERT INTO smart_user_mail values('','$rid','$id','$sub','$msg','',sysdate(),'$uname','$to')");
				echo "<script type=\"text/javascript\">" . "alert('Message Sucuessfully Sent !!!');" . "window.location = 'compose.php';" . "</script>";
			}
			else
			{
			echo "<script type=\"text/javascript\">" . "alert('Message Failed !!! This Email OR Ueername Not Found');" . "window.location = 'compose.php';" . "</script>";
			}
		}
		}	

	}
}
if(isset($_POST['draft']))
{
	$to = mysqli_real_escape_string($conn,$_POST['to']);
	$sub = mysqli_real_escape_string($conn,$_POST['subject']);
	$msg = mysqli_real_escape_string($conn,$_POST['mailbody']);
	$file=$_FILES['file']['name'];
	
	if(empty($_POST['subject']) || empty($_POST['mailbody']))
	{
	echo "<script type=\"text/javascript\">" . "alert('Enter All Required Field');" . "window.location = 'compose.php';" . "</script>";
	}
	else
	{
	$query="INSERT INTO smart_draft_mail values('','$id','$sub','$file','$msg',sysdate())";
	mysqli_query($conn,$query);
	echo "<script type=\"text/javascript\">" . "alert('Mail Sucessfully Saved....');" . "window.location = 'compose.php';" . "</script>";
	}
}	
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Smart-Trail | Compose Message</title>
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
              <span class="hidden-xs">Hello! &nbsp; Admin</span>
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
            <i class="fa fa-dashboard"></i><span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="addparking.php">
            <i class="fa fa-edit"></i> <span>Add Parking</span>
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
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
		  </a>
          <ul class="treeview-menu">
            <li>
              <a href="mailbox.php">Inbox
                <span class="pull-right-container">
                  <span class="label label-primary pull-right">13</span>
                </span>
              </a>
            </li>
            <li class="active"><a href="compose.php">Compose</a></li>
            <li><a href="read-mail.php">Read</a></li>
          </ul>
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
        Mailbox
        <small>13 new messages</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Mailbox</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="mailbox.php" class="btn btn-primary btn-block margin-bottom">Back to Inbox</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Folders</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="mailbox.html"><i class="fa fa-inbox"></i> Inbox
                  <span class="label label-primary pull-right">12</span></a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
                <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>
                <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a>
                </li>
                <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Labels</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>
                <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Compose New Message</h3>
            </div>
            <!-- /.box-header -->
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" class="box-body">
              <div class="form-group">
                <input class="form-control" placeholder="To:" name="to">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Subject:" name="subject">
              </div>
              <div class="form-group">
                    <textarea id="compose-textarea" class="form-control" style="height: 300px" name="mailbody">
                    </textarea>
              </div>
              <div class="form-group">
                <div class="btn btn-default btn-file">
                  <i class="fa fa-paperclip"></i> Attachment
                  <input type="file" name="file" >
                </div>
                <p class="help-block">Max. 32MB</p>
              </div>
            
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <button type="submit" class="btn btn-default" name="draft"><i class="fa fa-pencil"></i> Draft</button>
                <button type="submit" class="btn btn-primary" name="send"><i class="fa fa-envelope-o"></i> Send</button>
              </div>
              <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
            </div>
			</form>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
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
