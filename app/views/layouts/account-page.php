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
		<style>
		
			.responsive-pic{
				position: absolute;
				height: 20vh;
				width: 25vh;
				display: flex;
				justify-content: center;
				align-items: center;
			}
			
			.responsive-box {
				position: absolute;
				width: 13vh;
			}
			.responsive-box:after {
				content: "";
				display: block;
				padding-bottom: 100%; /* The padding depends on the width, not on the height, so with a padding-bottom of 100% you will get a square */
			}

			.responsive-box img {
				position: absolute; /* Take your picture out of the flow */
				top: 0;
				bottom: 0;
				left: 0;
				right: 0; /* Make the picture taking the size of it's parent */
				width: 100%; /* This if for the object-fit */
				height: 100%; /* This if for the object-fit */
				object-fit: cover; /* Equivalent of the background-size: cover; of a background-image */
				object-position: center;
				border-radius: 50%;
			}
			
			.content{
				margin-top: 10vh;
			}
			
			#profile-pic{
				transform: translateY(60%);
			}
			
			#profile-name{
				color: white;
				font-size: 3vh;
				transform: translateY(-50%);
			}
		</style>
	
<?php
include_once('../../controllers/addFav.controller.php');
$c = new Ctrl_MV();
?>
		
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
				<h3 class="text-center"><br>My MVs<hr><br></h3>
				<?php
				$myMV =$c->getFavMVList($_SESSION['accountID']);
				?>
				<div class="d-flex flex-row flex-wrap justify-content-center">
				<?php
				for($i=0;$i<count($myMV);$i++){
					echo '<div class="d-flex flex-column">
				<img src="images/'.$myMV[$i]->getMVImage().'" class="img-fluid">
			  </div>';
				}?>
			</div>
			</div>
		</section>
		
		<?php require 'footer.php' ?>
		