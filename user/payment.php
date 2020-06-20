<?php
session_start();
include_once '../inc/dbconfig.php';

$razor_api_key="rzp_test_Bb0Eaad3dTvl5v";
$peid=$_GET['PID'];

$query = "SELECT * FROM smart_penalty WHERE pe_id LIKE '%$peid%'";
	$result = mysqli_query($conn,$query);
	$count = mysqli_num_rows($result);
	if($count>0){
	if($row = mysqli_fetch_array($result))
	  {
		$name = $row['name'];
		$vehicleno = $row['vehicle_no'];
		$penalty = $row['penalty'];
		$_SESSION['peid']=$row['pe_id'];
	  }
	  $pen=$penalty*100;
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pay Penalty | Smart-Trail</title>
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
  
  <style>
  .razorpay-payment-button
  {
	  border-radius:0;
	  box-shadow:none;
	  boarder-width:1px;
	  display:block;
	  width:100%;
	  background-color:#3c8dbc;
	  boarder-color:#367fa9;
	  color:#fff;
	  border:none;
	  height:35px;
  }

  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Smart</b>-Trail</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
  
    <p class="login-box-msg">Pay To Smart-Trail</p>	
	  <form action="update.php" method="POST">
	  <div class="form-group row" >
        <label class="col-sm-3 control-label">PenaltyId</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="inputEmail3" name="pid" value="<?php echo $peid;?>" disabled="">
        </div>
      </div>
	  <div class="form-group row">
        <label class="col-sm-3 control-label">Name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="inputEmail3" value="<?php echo $name;?>" disabled="">
        </div>
      </div>
	  <div class="form-group row">
        <label class="col-sm-3 control-label">Amount</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="inputEmail3" value="<?php echo $penalty; ?>" disabled="">
        </div>
      </div>
	  
<!-- Note that the amount is in paise = 50 INR -->
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $razor_api_key; ?>"
    data-amount="<?php echo $pen;?>"
    data-buttontext="Pay with Razorpay"
    data-name="Smart Trail"
    data-description="Pay Penalty"
    data-image="../fevicon.png"
    data-prefill.name="<?php echo $name;?>"
    data-prefill.email="support@razorpay.com"
    data-theme.color="#3c8dbc"
></script>
<input type="hidden" value="Hidden Element" name="hidden">
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
