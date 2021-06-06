<?php
session_start();
?>
<?php
	include_once('../../controllers/songs-display.controller.php');

	if(!isset($_GET['tab']) || $_GET['tab'] < 1 || $_GET['tab'] > 3){ //Find on the URL
		$tab = 1;
	}else{
		$tab = $_GET['tab'];
	}

	if(!isset($_GET['page']) || $_GET['page'] < 1){ //Find on the URL
		$page = 1;
	}else{
		$page = $_GET['page'];
	}

	$songDisplayController = new SongsDisplayController(); //is used in song-board.php
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
			<?php 
               echo '<h1>All Songs</h1>';
            ?>
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
            </ul>
		</header>
		
		<section class="content">
			<?php
				include_once('song-board.php');
			?>
		</section>
        <script src="js/songs.js"></script>
		<?php
			require "footer.php";
		?>