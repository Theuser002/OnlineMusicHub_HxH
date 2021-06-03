<?php
session_start();
?>
<?php
	include_once('../../controllers/songs-display.controller.php');

	if(!isset($_GET['tab'])){ //Find on the URL
		$tab = 1;
	}else{
		$tab = $_GET['tab'];
	}

	if(!isset($_GET['page'])){ //Find on the URL
		$page = 1;
	}else{
		$page = $_GET['page'];
	}

	if(!isset($_GET['isPlaying'])){
		$isPlaying = false;
	}else{
		$isPlaying = $_GET['isPlaying'];
	}

	$songDisplayController = new SongsDisplayController(); 
	$entriesPerPage = 5;
?>
<!DOCTYPE HTML>
<html>
	<head>
	<title>All songs</title>
	<link rel="icon" type="image/png" sizes="32x32" href="images/logo.png">
	<!--		<link rel="stylesheet" href="css/style.css" type="text/css">-->
		</head>
	<body id="song-body">
		<?php 
			require "navbar.php";
		?>
		
		<style>
			h1{
				color: white;
			}
			
			.pagebar{
				background-color: #e0e0e0;
				border-radius: 20px;
				padding: 0px 10px;
			}
			
			.pagebar > a{
				color: black;
				font-size: 20px;
				justify-content: center;
			}
			
			.chosen{
				color: white !important;
				background-color: #6aba99;
				border-radius: 30%;
			}
		</style>
		
		<header id="song-header">
			<h1>All Songs</h1>
		</header>
		
		<section class="content">
			<?php
			
//				include_once('song-board.php');
			
				if($isPlaying == false){
					include_once('song-board.php');
//					echo $isPlaying;
				}else{
//					echo $isPlaying;
					include ('music-player.php');
				}
					
			?>
		</section>
		
		<?php
			require "footer.php";
		?>