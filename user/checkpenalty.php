<?php
include_once '../inc/dbconfig.php';
$razor_api_key="rzp_test_Bb0Eaad3dTvl5v";
?>
<!DOCTYPE html>
<html>

<head>
	<title>Check Your Penalty | Smart-Trail</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content=" " />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<style>a.disabled {
	  /* Make the disabled links grayish*/
	  color: gray;
	  /* And disable the pointer events */
	  pointer-events: none;
	}</style>
	<!--//tags -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //for bootstrap working -->
	<link href="//fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700" rel="stylesheet">
	<link rel="icon" href="../fevicon.png" sizes="32x32" type="image/png">
		
</head>

<body>
	<!-- header -->
	<div class="header-1">
		<div class="content white agile-info">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
						<a class="navbar-brand" href="index.php">
							<h1>Smart-Trail</h1>
						</a>
					</div>
					<!--/.navbar-header-->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<nav class="link-effect-2" id="link-effect-2">
							<ul class="nav navbar-nav">
								<li><a href="index.php" class="effect-3">Home</a></li>
								<li><a href="about.php" class="effect-3">About</a></li>
								<li><a href="findparking.php" class="effect-3">Find Parking</a></li>
								<li  class="active"><a href="checkpenalty.php" class="effect-3">Check Penalty</a></li>
								<li><a href="contact.php" class="effect-3">Contact</a></li>
							</ul>
						</nav>
					</div>
					<!--/.navbar-collapse-->
					<!--/.navbar-->
				</div>
			</nav>
		</div>
	</div>
	<!-- //header -->
	<!-- about -->
	<div class="welcome">
		<div class="container">
		<h3 class="heading-agileinfo">Check Penalty</h3>
			<div class="w3ls_news_grids"> 
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-horizontal">
				  <div class="form-group">
					<div class="col-sm-offset-3 col-sm-4 mar">
					  <input type="text" class="form-control" name="userno" placeholder="Enter Your Vehicle no (Ex: GJ06AB1234)">
					</div>
				
					<div class="col-sm-2 mar">
					  <input type="submit" value="Search" name="search">
					</div>
				  </div>
				</form>	
			<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //about -->
<?php
  $data = '';
  if(isset($_POST['search']))
  {
	if(empty($_POST['userno']))
	{
		echo "<script type=\"text/javascript\">" . "alert('Please Enter Vehicle Number');" . "window.location = 'checkpenalty.php';" . "</script>";
	}
	$userno = $_POST['userno'];
	$userno = preg_replace("#[^0-9a-z]#i","",$userno);
	if (!preg_match("/^([A-Z|a-z]{2}\s{0}\d{2}\s{0}[A-Z|a-z]{1,2}\s{0}\d{1,4})?([A-Z|a-z]{3}\s{0}\d{1,4})?$/",$userno)) {
		 echo "<script type=\"text/javascript\">" . "alert('Vehicle Number Invalid');" . "window.location = 'checkpenalty.php';" . "</script>";
	}
	$userno = preg_replace("#[^0-9a-z]#i","",$userno);
	$query = "SELECT * FROM smart_penalty WHERE vehicle_no LIKE '%$userno%'";
	$result = mysqli_query($conn,$query);
	$count = mysqli_num_rows($result);
	if($count>0){
	while($row = mysqli_fetch_array($result))
	  {
		$name = $row['name'];
		$vehicleno = $row['vehicle_no'];
	  }
	}
	  else
	{
	  echo "<script type=\"text/javascript\">" . "alert('No Penalty Found');" . "window.location = 'checkpenalty.php';" . "</script>";
	}
?>
<div class="container">
  <div class="row">
		<div class="tabcaption">
          <h3 class="text-center">Find Your Penalty</h3>
        </div>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th class="" colspan="5">Name : <span class="tabinfo"><?php echo $name;?></span></th>
			  <th class="" colspan="2">Vehicle Number : <span class="tabinfo"><?php echo $vehicleno;?></span></th>
            </tr>
			<tr>
              <th class="text-center">No</th>
			  <th class="text-center">City</th>
			  <th class="text-center">Penalty(&#8377;)</th>
			  <th class="text-center">Paid Status</th>
			  <th class="text-center">Date</th>
			  <th class="text-center">Pay Now</th>
			  <th class="text-center">Show Images</th>
            </tr>
          </thead>
		  
          <tbody>
		  <?php
		    $query = "SELECT * FROM smart_penalty WHERE vehicle_no LIKE '%$vehicleno%'";
			$result = mysqli_query($conn,$query);
			$count = mysqli_num_rows($result);
		    if($count>0){
			  while($row = mysqli_fetch_array($result))
				  {	static $n=0;
					$PID = $row['pe_id'];
					$city = $row['city'];
					$penalty = $row['penalty'];
					$paidstatus = $row['paid_status'];
					$date = $row['date'];
					$n=$n+1;
			  
		  ?>
            <tr>
              <td class="text-center"><?php echo $n;?></td>
			  <td class="text-center"><?php echo $city;?></td>
			  <td class="text-center"><?php echo $penalty;?></td>
			  <td class="text-center"><?php echo $paidstatus;?></td>
			  <td class="text-center"><?php echo $date;?></td>
			  <td class="text-center"><a href="payment.php?PID=<?php echo $PID; ?>" class="<?php if($paidstatus=="Yes") {echo "disabled";} ?>">PAY NOW</a></td>
			  <td class="text-center"><a href="showimages.php?PID=<?php echo $PID; ?>" >Show</a></td>
            </tr>

		<?php } ?>
          </tbody>
        </table>
      </div>
  </div>
</div>
<?php
	  
  }
	  
  }  
?>
	<!-- footer -->
<div class="footer_top_agileits">
		<div class="container">
			<div class="col-md-4 footer_grid">
				<h3>About Us</h3>
				<p>Nam libero tempore cum vulputate id est id, pretium semper enim. Morbi viverra congue nisi vel pulvinar posuere sapien eros.
				</p>
			</div>
			<div class="col-md-4 footer_grid">
				<h3>Tags</h3>
				<ul class="footer_grid_list">
					<li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						<a href="findparking.php">Find Nearest Parking</a>
					</li>
					<li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						<a href="checkpenalty.php">Check Penalty</a>
					</li>
					<li><i class="fa fa-long-arrow-right"></i>
						<a href="../rto/index.php" aria-hidden="true">RTO Employee</a>
					</li>
					<li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						<a href="../smart-admin/index.php">Project Admin</a>
					</li>
					<li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						<a href="../rto-admin/index.php">RTO Admin</a>
					</li>
				</ul>
			</div>
			<div class="col-md-4 footer_grid">
				<h3>Contact Info</h3>
				<ul class="address">
					<li><i class="fa fa-map-marker" aria-hidden="true"></i>RTO-Gandhinagar<span>Gujarat, INDIA</span></li>
					<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:strail2018@gmail.com">strail2018@gmail.com</a></li>
					<li><i class="fa fa-phone" aria-hidden="true"></i>079 2324 0954</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="footer_w3ls">
		<div class="container">
					<div class="footer_bottom1">
						<p>© 2018 Smart-Trail. All rights reserved | Project by <a href="team.html">Group 7</a></p>
					</div>
		</div>
	</div>
	<!-- //footer -->
	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<!-- skills -->
	<script src="js/skill.bars.jquery.js"></script>
	<script>
		$(document).ready(function(){
			
			$('.skillbar').skillBars({
				from: 0,
				speed: 4000, 
				interval: 100,
				decimals: 0,
			});
			
		});
	</script>
<!-- //skills -->
</body>
</html>