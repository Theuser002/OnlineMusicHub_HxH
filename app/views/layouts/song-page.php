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
/*				width: 50em;*/
				margin-top: 50px;
				padding: 10px;
				display: flex;
				flex-flow: row wrap;
				justify-content: center;
			}
			
			#sortbar{
				width: 80%;
				display: flex;
				justify-content: center;
				align-items: center;
			}
			
			.sort-button{
				width: 20%;
				text-align: center;
/*				border: 1px solid black;*/
				color: white;
				margin: 5px;
				background-color: black;
				border-radius: 10px;
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
				cursor: pointer;
				border: none;
				
			}
			
			.sort-button:hover{
				background-color: white;
				color: black;
				border-radius: 10px;
			}
			
			.sort-button:active{
				border-radius: 10px;
				background-color: white;
				color: black;
				box-shadow: 0 0px 0px 0 rgba(0, 0, 0, 0.2), 0 0px 0px 0 rgba(0, 0, 0, 0.19);
			}
			.sort-button:focus{
				background-color: #7d7d7d;
				color: white;
				outline: none;
			}
			
			.searchbar{
				width: 80%;
				height: 2em;
				background-color: transparent;
				border: 2px solid black;
				color: black;
				border-radius: 25px;
				padding: 5px;
			}
			
			.searchbar:focus{
				outline: none;
			}
			
			.search-button{
				background-color:#c95d5d;
				width: 10%;
			}
			
			.search-button:hover{
				background-color:#c95d5d;
			}
			
			.search-button:focus{
				background-color:#c95d5d;
			}
		</style>
		
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
		
		<?php
			require "footer.php";
		?>