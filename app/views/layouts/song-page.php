<?php
session_start();
?>
<?php
	if(!isset($_GET['tab'])){
		$tab = 1;
	}else{
		$tab = $_GET['tab'];
	}
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
					<a class="sort-button" href="song-page.php?tab=1">
						A-Z
					</a>
					<a class="sort-button" href="song-page.php?tab=2">
						Latest
					</a>
					<a class="sort-button" href="song-page.php?tab=3">
						Top
					</a>
				</div>
				<br><br><br>
<!--				Call the songs display controller here.-->
				<?php 
					include_once('../../controllers/songs-display.controller.php');
					$songDisplayController = new SongsDisplayController(); 
					if($tab==1){
						$songDisplayController->displaySongPagAZ(5);
					}else if ($tab==2){
						$songDisplayController->displaySongPagLatest(5);
					}else if ($tab==3){
						$songDisplayController->displaySongPagTopViews(5);
					}
				?>
				
				<div class="pagebar">
					
				</div>
			</div>
		</section>
		
		<?php
			require "footer.php";
		?>