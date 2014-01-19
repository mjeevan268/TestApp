<?php 
session_save_path("/home/content/28/10504428/html");
session_start();
if(isset($_SESSION['email'])) {
	header("location: user_home.php");
}
?>
<?php
if($_GET['registerFailed']) {
	if($_GET['reason'] == "nofields") {
		echo "<script type=\"text/javascript\">
		alert('Please fill the required fields.');
		</script>";
	}
	else if($_GET['reason'] == "password") {
		echo "<script type=\"text/javascript\">
		alert('The passwords entered do not match.');
		</script>";
	}
	else if($_GET['reason'] == "existing") {
		echo "<script type=\"text/javascript\">
		alert('The email entered already exists.');
		</script>";
	}
	else if($_GET['reason'] == "noreference") {
		echo "<script type=\"text/javascript\">
		alert('Reference email id not found.');
		</script>";	
	}
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
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
		<style>
			.body {
				background-color:#E8E8E8;
				height: 500px;
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
					<li><a id="test" href="whatwedo.html">What We Do</a></li>
					<li><a id="test" href="getinvolved.html">Get Involved</a></li>
					<li><a id="test"  href="services.html">Services</a></li>
					<li><a id="test" href="donateus.html">Donate</a></li>
					<li><a id="test" href="contactus.html">Contact Us</a></li>
				</ul>
				<!--Login/Rgeister-->
				<p style="color:white;left:1000px;position:absolute;top:8px;">
				<a href="register.php">Register</a>/<a href="login.php">Login</a>
				</p>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container -->
		</nav>

		<!--===================Main Content=====================-->
		
		<div class="body">
			<div class="maincontent">
				<div id="apDiv1">
					<form id="register" method="post" action="checkregister.php">
						<table>
							<tr>
								<td>First Name:</td>
								<td><input type="text" id="firstname" name="firstname" required></input></td>
								<td>Max 30 chars</td>
							</tr>
							<tr>
								<td>Last Name:</td>
								<td><input type="text" id="lastname" name="lastname" required></input></td>
								<td>Max 30 chars</td>
							</tr>
							<tr>
								<td>Birth Date:</td>
								<td><input type="text" id="datepicker" name="datepicker" required></input></td>
								<td>(YYYY-MM-DD)</td>
							</tr>
							<tr>
								<td>Institution/ Organization Name:</td>
								<td><input type="text" id="insorgname" name="insorgname" required></input></td>
								<td>Max 100 chars</td>
							</tr>
							<tr>
								<td>Blood Group:</td>
								<td>
									<select name="bloodgroup">
  									  <option value="apos">A+</option>
									  <option value="aneg">A-</option>
									  <option value="bpos">B+</option>
									  <option value="bneg">B-</option>
  									  <option value="abpos">AB+</option>
									  <option value="abneg">AB-</option>
									  <option value="opos">O+</option>
									  <option value="oneg">O-</option>
									  <option value="default">Don't Know</option>
								  	</select>
							  	</td>
								<td></td>
							</tr>
							<tr>
								<td>Phone Number:</td>
								<td><input type="text" id="phone" name="phone" required></input></td>
								<td></td>
							</tr>
							<tr>
								<td>Location:</td>
								<td><input type="text" id="location" name="location" required></input></td>
								<td>(City/Town)</td>
							</tr>
							<tr>
								<td>Email-id:</td>
								<td><input type="email" id="email" name="email" required></input></td>
								<td>Max 50 chars</td>
							</tr>
							<tr>
								<td>Password:</td>
								<td><input type="password" id="password" name="password" required></input></td>
								<td>Max 20 chars</td>
							</tr>
							<tr>
								<td>Confirm Password:</td>
								<td><input type="password" id="confirmpassword" name="confirmpassword" required></input></td>
								<td>Max 20 chars</td>
							</tr>
							<tr>
								<td>Referrenced By(Email-id):</td>
								<td><input type="text" id="reference" name="reference" required></input></td>
								<td>Max 50 chars</td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" value="Register" id="finishRegister"></input></td>
								<td></td>
							</tr>
						</table>
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