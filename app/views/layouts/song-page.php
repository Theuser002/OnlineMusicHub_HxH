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
		<header id="song-header">
			<h1>All Songs</h1>
		</header>
		
		<section class="content">
			<div class="container song-board">
				<br>
				<div class="flex-row-break"></div> 
				<input class="searchbar" type="text" placeholder="Search song name...">
				
				<div class="flex-row-break"></div> 
				<button class="sort-button search-button">
					Search
				</button>
				<div class="flex-row-break"></div> 
				
				<div id="sortbar">
					<button class="sort-button">
						A-Z
					</button>
					<button class="sort-button">
						Latest
					</button>
					<button class="sort-button">
						Top
					</button>
				</div>
				<br><br><br>
<!--				Call the songs display controller here.-->
				<?php require_once '../../controllers/songs-display.controller.php'; 
					$songsDisplay = new SongsDisplayController();
					$songsDisplay->displayAllSongs();
				?>			
			</div>
		</section>