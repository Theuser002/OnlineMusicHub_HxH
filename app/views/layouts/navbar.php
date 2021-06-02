<!DOCTYPE html>
<html lang="en">
	<head>
		<!--favicon-->
		<title>Nav-bar</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<!--style.css document-->
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<!--font-awesome-->
		<link rel="stylesheet" href="css/bootstrap.css">
		<!--bootstrap-->
		<script src="js/jquery.js"></script>
		<!--googleapis jquery-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!--font-awesome-->
		<script src="js/slim.js"></script>
		<!--bootstrap-->
		<script src="js/popper.js"></script>
		<!--bootstrap-->
		<script src="js/bootstrap.js"></script>
		<!--bootstrap-->
	</head>
	<style>
		.flex-column {
			max-width: 260px;
		}

		.container {
			background: #f9f9f9;
			border-radius: 25px;
		}

		.logo img {
			width: 250px;
			height: 250px;
			margin-top: 90px;
			margin-bottom: 40px;
		}

		.intro-img {
			width: 500px;
			height: 400px;
	/*        margin-left: 20px;*/
		}

		.img-fluid {
			width: 250px;
			height: 250px;
			margin: 3px;
		}

		hr .hr1 {
			border-top: 1px solid white;
			width: 50%;
			margin-left: auto;
			margin-right: auto;
		}
		.carousel-item img {
			width: 100%
		}
		ul {
			list-style-position: inside;
		}
	</style>

	<body>
		<!---AUTO-CHANGING NAVBAR--->
		<nav class="navbar navbar-expand-md navbar-light fixed-top">
			<div class="container">
	<!--			//In the header, if you click to logo you'll always go back to the home page (index.php)-->
				<a class="navbar-brand" href="index.php">
					<strong><em>Music Hub</em></strong>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navi">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navi">
					<ul class="navbar-nav mr-auto">

						<!--auto change based on login status-->
						<?php
							//set navigation bar when logged in
							if (isset($_SESSION['accountID'])) {
							//set navigation bar when logged in and role of admin
								if ($_SESSION['isAdmin'] == 1) {
									echo '
										<li class="nav-item">
											<a class="nav-link" href="song-page.php" >Songs</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="mv-page.php" >MVs</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="artist-page.php" >Artists</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="news-page.php" >News</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="account-page.php" >Account</a>
										</li>
										<li class="nav-item">';
										include_once('searchbar.php');
									echo '</li>';
								}
								else
								{
									 echo '
										<li class="nav-item">
											<a class="nav-link" href="song-page.php" >Songs</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="mv-page.php" >MVs</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="artist-page.php" >Artists</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="news-page.php" >News</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="account-page.php" >Account</a>
										</li>
										<li class="nav-item">';
										include_once('searchbar.php');
									echo '</li>';
								}	
							}	
							//main page not logged in navigation bar
							else 
							{
								echo '
									<li class="nav-item">
										<a class="nav-link" href="#intro">Introduction</a>
									</li>
									<li class="nav-item">
									<a class="nav-link" href="#gallery">Gallery</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#about-us">About us</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#footer">Contact us</a>
									</li>
									';
							}
						?>
						

					</ul>

					<?php
					//logout button when user is logged in
					if (isset($_SESSION['accountID'])) {
						echo '
						<form class="navbar-form navbar-right" action="../../controllers/logout.controller.php" method="post">
							<button type="submit" name="logout-submit" class="btn btn-outline-dark">Logout</button>
						</form>';
					} else {
						echo '
						<div>
							<ul class="navbar-nav ml-auto">
								<li><a class="nav-link fa fa-sign-in" data-toggle="modal" data-target="#myModal_signup">&nbsp;Sign Up</a></li>
								<li><a class="nav-link fa fa-user-plus" data-toggle="modal" data-target="#myModal_login">&nbsp;Log In</a></li>
							</ul> 
						</div>
						';
					}
					?>

				</div>
			</div>
		</nav>

	<!--MY MODEL LOGIN-->
		<div class="container">
			<!-- The Modal -->
			<div class="modal fade" id="myModal_login">
				<div class="modal-dialog">
					<div class="modal-content">

						<!-- Modal Header -->
						<div class="modal-header">
							<h4 class="modal-title">Log In</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

						<!-- Modal body -->
						<div class="modal-body">

							<?php
							if (isset($_GET['error1'])) {
								//script for modal to re-appear when error (to allow user to keep entering if they made a mistake) 
								echo '  
								<script>
									$(document).ready(function(){
										$("#myModal_login").modal("show");
									});
								</script> ';


								//error handling of log in
								if ($_GET['error1'] == "loginfailed") {
									echo '<h5 class="text-danger text-center">Wrong username or password, Please try again!</h5>';
								}
							}
							echo '<br>';
							?>

							<div class="signin-form">
								<form action="../../controllers/login.controller.php" method="post">
									<p class="hint-text">If you have already an account please log in.</p>
									<div class="form-group">
										<input type="text" class="form-control" name="username" placeholder="Username" required="required">
									</div>
									<div class="form-group">
										<input type="password" class="form-control" name="password" placeholder="Password" required="required">
									</div>
									<div class="form-group">
										<button type="submit" name="login-submit" class="btn btn-dark btn-lg btn-block">Log In</button>
										<button type="reset" name="login-reset" class="btn btn-secondary btn-lg btn-block">Clear
										</button>
									</div>
								</form>
							</div>
						</div>
						<!-- Modal footer -->
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>

	<!--MY MODEL REGISTER-->
		<div class="container">
			<!-- The Modal -->
			<div class="modal fade" id="myModal_signup">
				<div class="modal-dialog">
					<div class="modal-content">
						<!-- Modal Header -->
						<div class="modal-header">
							<h4 class="modal-title">Sign Up</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<!-- Modal body -->
						<div class="modal-body">

							<?php
							if (isset($_GET['error'])) {
								//script for modal to appear when error 
								echo '  
								<script>
									$(document).ready(function(){
										$("#myModal_signup").modal("show");
									});
								</script> ';


								//error handling for errors and success --sign up form

								if ($_GET['error'] == "emptyfields") {
									echo '<h5 class="bg-danger text-center">Fill all fields, Please try again!</h5>';
								} else if ($_GET['error'] == "invalidusername") {
									echo '<h5 class="bg-danger text-center">Invalid Username, Please try again!</h5>';
								} else if ($_GET['error'] == "invalidpassword") {
									echo '<h5 class="bg-danger text-center">Invalid password, Please try again!</h5>';
								} else if ($_GET['error'] == "passworddontmatch") {
									echo '<h5 class="bg-danger text-center">Password must match, Please try again!</h5>';
								} else if ($_GET['error'] == "usernametaken") {
									echo '<h5 class="bg-danger text-center">Username taken, please choose another one.</h5>';
								} else if ($_GET['error'] == "unknownerror") {
									echo '<h5 class="bg-danger text-center">Error Occured, Try again!</h5>';
								}
							}
							if (isset($_GET['signup'])) {
								//script for modal to appear when success
								echo '  
									<script>
										$(document).ready(function(){
										$("#myModal_signup").modal("show");
										});
									</script> ';

								if ($_GET['signup'] == "success") {
									echo '<h5 class="bg-success text-center">Sign up was successfull! Please Log in!</h5>';
								}
							}
							echo '<br>';
							?>
							<!---sign up form -->
							<div class="signup-form">
								<form action="../../controllers/signup.controller.php" method="post">
									<p class="hint-text">Create your account. It's free and only takes a minute.</p>
									<div class="form-group">
										<input type="text" class="form-control" name="username" placeholder="Username" required="required">
										<small class="form-text text-muted">Username must be between 4-15 characters long. Can only contain letters and numbers</small>
									</div>
									<div class="form-group">
										<input type="password" class="form-control" name="password" placeholder="Password" required="required">
										<small class="form-text text-muted">Password must be between 4 - 20 charaters long</small>
									</div>
									<div class="form-group">
										<input type="password" class="form-control" name="password-repeat" placeholder="Confirm Password" required="required">
									</div>
									<div class="form-group">
										<button type="submit" name="signup-submit" class="btn btn-dark btn-lg btn-block">Sign Up</button>
										<button type="reset" name="signup-clear" class="btn btn-secondary btn-lg btn-block">Clear</button>
									</div>
								</form>
							</div>
						</div>
						<!-- Modal footer -->
						<div class="modal-footer">

							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>