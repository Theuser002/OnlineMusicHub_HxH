<?php
session_start();
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
			
			.song-board{
				position:relative;
				width: 50em;
				margin-top: 50px;
				padding: 10px;
				display: flex;
				flex-wrap: wrap;
				justify-content: center;
			}
		</style>
		
		<header id="song-header">
			<h1>All Songs</h1>
		</header>
		
		<section class="content">
			<div class="container song-board">
<!--				Call the songs display controller here.-->
				<?php require '../../controllers/songs-display.controller.php'; 
					$songsDisplay = new SongsDisplayController();
					$songsDisplay->displayAllSongs();
				?>			
			</div>
		</section>
		
		<?php
			require "footer.php";
		?>