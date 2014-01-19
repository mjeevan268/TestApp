<?php 
session_save_path("/home/content/28/10504428/html");
session_start();
if(!isset($_SESSION['email'])) {
	echo "<script type=\"text/javascript\">
	alert('You need to login to see this page.');
	window.location.href='index.html';
	</script>";
	header("location: login.php");
}
?>
<?php
if(isset($_POST['logoutbutton'])) {
	session_start();
	session_destroy();
	echo "<script type=\"text/javascript\">
	alert('Successfully logged out.');
	window.location.href='index.html';
	</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Aadhaar Foundation | Home</title>
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="styles.css" rel="stylesheet" type="text/css">
		<link href='http://fonts.googleapis.com/css?family=Oleo+Script+Swash+Caps' rel='stylesheet' type='text/css'>
		<!-- Add custom CSS here -->
		<link href="css/full-slider.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Wellfleet' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Mouse+Memoirs' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
		<link rel="stylesheet" type="text/css" href="styles_getinvolved.css" />
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
		  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		  <link rel="stylesheet" href="/resources/demos/style.css">
		  <script>
		  $(function() {
		    $( "#datepicker" ).datepicker();
		  });
		  </script>
		<style>
			.body {
				background-color:#E8E8E8;
				height: 1000px;
				width:100%;
			}
			#apDiv1 {
				position: absolute;
				left: 125px;
				top: 75px;
				width: 1100px;
				height: 296px;
				background-color: inherit;
			}
			#apDiv2 {
				position: relative;
				left: 125px;
				top: 381px;
				width: 1103px;
				height: 1163px;
				background-color:yellow;
			}
			#apDiv3 {
				position: absolute;
				left: 136px;
				top: 392px;
				width: 252px;
				height: 941px;
				
			}
			#apDiv4 {
				position: absolute;
				left: 404px;
				top: 392px;
				width: 817px;
				height: 1200px;
				background-color:yellow;
			}
			#font4
			{
				font-family: 'Wellfleet', cursive;
				font-size:18px;
				color:#CC0033;
			}
			
		</style>
		<link href='http://fonts.googleapis.com/css?family=Wellfleet' rel='stylesheet' type='text/css'>
		<link href="styles_ourvision.css" rel="stylesheet" type="text/css">

	</head>
	<body>
		<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.html" style="">Aadhaar Foundation</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div id="test" class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li><a id="test" href="ourvisionandaim.html">Our Vision & Aim</a></li>
					<li><a id="test" href="#whatwedo">What We Do</a></li>
					<li><a id="test" href="#getinvolved">Get Involved</a></li>
					<li><a id="test"  href="#services">Services</a></li>
					<li><a id="test" gref="#Donate">Donate</a></li>
					<li><a id="test" href="#contact">Contact Us</a></li>
				</ul>
				<!--Login/Rgeister-->
				<p style="color:white;left:1000px;position:absolute;top:8px;">
				<a href="#register">Register</a>/<a href="#login">Login</a>
				</p>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container -->
		</nav>

		<!--===================Main Content=====================-->
		
		<div class="body">
			<div class="maincontent">
				<div id="apDiv1">
					<h1>Welcome <?php echo $_SESSION['firstname'];?>.</h1>
					<?php
					include "connect_to_mysql.php";
					$searchbloodgroup = $_POST['bloodgroup'];
					$searchlocation = $_POST['location'];
					$searchlocation= preg_replace('#[^A-Za-z0-9]#i', '', $searchlocation);
					$searchlocation = strtolower($searchlocation);
					$sql = mysql_query("SELECT * FROM users WHERE bloodgroup='$searchbloodgroup' AND location='$searchlocation'");
					echo "Details of people with blood group " . $searchbloodgroup . " and living in " . $searchlocation . " are: <br />";
					echo "<table cellpadding='10' border='2'>";
					echo "<tr>";
					echo "<td>Name</td><td>Email</td><td>Phone</td>";
					echo "</tr>";
					while($row = mysql_fetch_array($sql)){
						echo "<tr>";
						echo "<td>" . $row['firstname'] . "</td><td>" . $row['email'] . "</td><td>" . $row['phone'] . "</td>";
						echo "</tr>";
					}
					echo "</table>";
					?>
				    <form id="logoutform" method="post">
				    <input type="submit" id="logoutbutton" name="logoutbutton" value="Log Out" />
				    </form>
				</div>
			</div>
		</div>
		
		
		<!--================Main Content Ends Here==============-->
		
		<footer style="background-color:#D8D8D8;">
		<div id="socialfooter" class="footer-global">
			<center>
				<div class="layout-inner layout-outer">
					<div class="social-col twitter">
						<h3>
							<span></span>
									<a href="#https://twitter.com/aadhaar" target=:_blank">Follow Us On Twitter
									</a>

								</h3>
							</div>
							<div class="social-col facebook">
								<h3>
									<span></span>
									<a href="#https://facebook.com/aadhaar" target="_blank">Join Us On Facebook
									</a>
								</h3>
								<div class="content">
									<button><h4>like</h4></button>
								</div>
							</div>
							<div class="social-col youtube">
								<h3>
									<span></span>
									<a href="#https://yotube.com/aadhaar" target="_blank">View VIdeos On Youtube
									</a>
								</h3>
								<div class="content">
									<p>You ca watch all our live updates like medical camps,providing shelter etc..
									</p>
								</div>
							</div>
							<div class="social-col pinterest">
								<h3>
									<span></span>
									<a href="#https://pinterest.com/aadhaar" target="_blank">aadhaar
									</a>

								</h3>
								<div class="content">
									<p>
									content to be added..it's a saple text for testing ..pls ignore..
									</p>
								</div>

							</div>


						</div>
					</center>
				</div>
				<center><hr color="red"></center>
				<center>
					<div class="row">
						<div class="col-lg-12">
							<p>Copyright &copy; Aadhaar Foundation 2013 &middot; Facebook &middot; Twitter &middot; Google+</p>
							<p>Designed with Recycled pixels by <a href="http://www.facebook.com/g1.8.jeevan">Jeevan Chowdary</a></p>
						</div>
					</div>
				</center>
				<div style="text-align:center;"><script type="text/javascript" src="http://services.webestools.com/cpt_pages_views/6253-16-9.js"></script></div>
				</footer>

			</div><!-- /.container -->
		</div>

		<!-- Bootstrap core JavaScript -->
		<!-- Placed at the end of the document so the pages load faster -->
		<!-- Make sure to add jQuery - download the most recent version at http://jquery.com/ -->
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
	</body>
</html>