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
		
		<header id="account-header">
			<div class="responsive-pic">
				<div class="responsive-box" id="profile-pic">
<!--					<img src="./images/ocean.jpg">-->
					<img src=<?php print("\"".$_SESSION['avatarLink']."\"")?>>
				</div>
			</div>
			<div id="profile-name">
				<h1><?php print($_SESSION['username'])?></h1>
				
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
		