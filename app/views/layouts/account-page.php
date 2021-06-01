<?php
session_start();
?>
<!DOCTYPE HTML>
<!--Session has already been initialized when login-->
<html>
	<head>
		<title>Account</title>
		<link rel="icon" type="image/png" sizes="32x32" href="images/logo.png">
	</head>
	<body id="account-body">
		<?php require "navbar.php";	?>
		
		
		<header id="header-account">
			<div class="responsive-pic">
				<div class="responsive-box" id="profile-pic">
<!--					<img src="./images/ocean.jpg">-->
					<img src=<?php print("\"".$_SESSION['avatarLink']."\"")?>>
				</div>
			</div>
			<div id="profile-name">
				<?php print($_SESSION['username'])?>
			</div>
		</header>
		
		<section class="content">
			<div class="container" style="margin-top: 50px;">
				<h3 class="text-center"><br>My Songs<hr><br></h3><hr>
			</div>

			<div class="container" style="margin-top: 50px;">
				<h3 class="text-center"><br>My MVs<hr><br></h3><hr>
			</div>
		</section>
		
		<?php require 'footer.php' ?>
		