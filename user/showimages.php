<?php
include_once '../inc/dbconfig.php';
?>
<?php
  $data = '';
  $peid=$_GET['PID'];

   $query = "SELECT * FROM smart_penalty WHERE pe_id LIKE '%$peid%'";
	$result = mysqli_query($conn,$query);
	$count = mysqli_num_rows($result);
	if($count>0)
	{
	if($row = mysqli_fetch_array($result))
	  {
		$name = $row['name'];
		$vehicleno = $row['vehicle_no'];
		$penalty = $row['penalty'];
		$paidstatus = $row['paid_status'];
		$date = $row['date'];
		$_SESSION['peid']=$row['pe_id'];
	  }
	}
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
	}
	.img-fluid
	{
		width:100%;
	}
	.imgpaddding
	{
		padding:0;
	}
	</style>
	<!--//tags -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" rel="stylesheet">
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
								<li><a href="checkpenalty.php" class="effect-3">Check Penalty</a></li>
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
		<h3 class="heading-agileinfo">Show Images</h3>
			<div class="w3ls_news_grids"> 
			<div class="row">
			<div class="tabcaption">
        </div>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th class="text-center" >Name</th>
			  <th class="text-center" >Vehicle Number</th>
              <th class="text-center" >Penalty ID</th>
			  <th class="text-center" >Penalty RS</th>
			  <th class="text-center" >Pay Now</th>
            </tr>
			<tr>
              <td class="text-center" ><span class="tabinfo"><?php echo $name;?></span></td>
			  <td class="text-center" ><span class="tabinfo"><?php echo $vehicleno;?></span></td>
              <td class="text-center" ><span class="tabinfo"><?php echo $peid;?></span></td>
			  <td class="text-center" ><span class="tabinfo"><?php echo $penalty;?>(&#8377;)</span></td>
			  <td class="text-center"><a href="payment.php?PID=<?php echo $peid; ?>" class="<?php if($paidstatus=="Yes") {echo "disabled";} ?>">PAY NOW</a></td>
            </tr>
        </table>
      </div>
	   </div>

	   
	   
<div class="row justify-content-center">
 <?php   
  $img_fldr= "../rto/penalty/$date/$vehicleno";
  static $count=0;
  //$images = scandir($img_fldr);
  if(is_dir($img_fldr))
  {$images = scandir($img_fldr);
  foreach ( $images as $key => $filename ) 
  { if ( $key > 1 ) 
    {  //ignores the first two values which refer to the current and parent directory
     ?><a href="<?php echo "$img_fldr/$filename"; ?>" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4" style="padding:10px 5px;">
        <img src="<?php echo "$img_fldr/$filename"; ?>" class="img-fluid">
     </a>
	 <?php
	 $count=$count+1;
    }	
  }
  if($count==0){echo "<span class='text-danger'>Sorry No Images!!!</span>";}
  }
 else
  {
	  echo "<span class='text-danger'>Sorry No Images!!!</span>";
  }
 ?>		

</div>
	   
	   
	   
	   
	   
</div>
			<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //about -->

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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
	<script>
		$(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
	</script>
<!-- //skills -->
</body>
</html>

<?php
/*$your_folder= '../rto/penalty/2018-03-19/GJ23AB1234';
  $images = scandir($your_folder);
  foreach ( $images as $key => $filename ) {
    if ( $key > 1 ) {  //ignores the first two values which refer to the current and parent directory
     echo '<img data-lightbox="love" src="'.$your_folder."/".$filename.'" /><br />';
   }    
  } */
  ?>