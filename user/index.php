<?php
include_once '../inc/dbconfig.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome To Smart-Trail | Home</title>
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
	<!--//tags -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/owl.theme.css" type="text/css" media="all">
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //for bootstrap working -->
	<link href="//fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700" rel="stylesheet">
	<link rel="icon" href="../fevicon.png" sizes="32x32" type="image/png">
	<style type="text/css">
	
	#preloader  {
     position: fixed;
     top: 0;
     left: 0;
     right: 0;
     bottom: 0;
     background-color: #fff;
     z-index: 99;
    height: 100%;
 }

#status  {
     width: 200px;
     height: 200px;
     position: absolute;
     left: 50%;
     top: 50%;
     background-image: url(../preload.gif);
     background-repeat: no-repeat;
     background-position: center;
     margin: -100px 0 0 -100px;
 }

	</style>
</head>
<?php
include_once 'visitor.php';
?>
<body>
<div id="preloader">
  <div id="status"></div>
</div>

	<!-- header -->
	<div class="header" id="top">
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
								<li class="active"><a href="index.php" class="effect-3">Home</a></li>
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
	<!-- banner -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<div class="container">
					<div class="carousel-caption">
						<h3>Welcome To<span> Smart-Trail</span></h3>
						<p>Any successful career starts with good education. Together with us you will have deeper knowledge of the subjects</p>
						<div class="agileits-button top_ban_agile">
							<a class="btn btn-primary btn-lg" href="#about">Read More »</a>
						</div>
					</div>
				</div>
			</div>
			<div class="item item2">
				<div class="container">
					<div class="carousel-caption">
						<h3>Find Nearest<span> Parking.</span></h3>
						<p>Any successful career starts with good education. Together with us you will have deeper knowledge of the subjects</p>
						<div class="agileits-button top_ban_agile">
							<a class="btn btn-primary btn-lg" href="findparking.php">Read More »</a>
						</div>
					</div>
				</div>
			</div>
			<div class="item item3">
				<div class="container">
					<div class="carousel-caption">
						<h3>Check Your<span> Penalty.</span></h3>
						<p>Any successful career starts with good education. Together with us you will have deeper knowledge of the subjects</p>
						<div class="agileits-button top_ban_agile">
							<a class="btn btn-primary btn-lg" href="checkpenalty.php">Read More »</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			
			<span class="sr-only">Next</span>
		</a>
		<!-- The Modal -->
	</div>
	<!--//banner -->
	<!-- about -->
	<div class="agile-about w3ls-section text-center" id="about">
		<div class="container">
		<h3 class="heading-agileinfo">Welcome To Smart-Trail</h3>
			<div class="agileits-about-grid">
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
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


	<a href="#top" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

	<script type="text/javascript" src="js/bootstrap.js"></script>
	<!-- stats -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.countup.js"></script>
	<script>
		$('.counter').countUp();
	</script>
	<!-- //stats -->
	<!-- owl carousel -->
	<script src="js/owl.carousel.js"></script>
	<script>
	// makes sure the whole site is loaded
	jQuery(window).load(function() {
        // will first fade out the loading animation
    jQuery("#status").delay(700).fadeOut();
        // will fade out the whole DIV that covers the website.
    jQuery("#preloader").delay(600).fadeOut(700);
})
		$(document).ready(function () {
			$("#owl-demo").owlCarousel({

				autoPlay: 3000, //Set AutoPlay to 3 seconds
				autoPlay: true,
				items: 3,
				itemsDesktop: [991, 2],
				itemsDesktopSmall: [414, 4]

			});
		}); 
	</script>
	<!-- //owl carousel -->


</body>

</html>