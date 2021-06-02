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
			<div class="container song-board">
<!--
				<br>
				<div class="flex-row-break"></div> 
				<input class="searchbar" type="text" placeholder="Search song name...">
				
				<div class="flex-row-break"></div> 
				<button class="sort-button search-button">
					Search
				</button>
				<div class="flex-row-break"></div> 
-->
				
				<?php
					if ($tab==1){
						echo '
						<div id="sortbar">
							<a class="sort-button focus" href="song-page.php?tab=1">
								A-Z
							</a>
							<a class="sort-button" href="song-page.php?tab=2">
								Latest
							</a>
							<a class="sort-button" href="song-page.php?tab=3">
								Top
							</a>
						</div>';
					}else if ($tab==2){
						echo '
						<div id="sortbar">
							<a class="sort-button" href="song-page.php?tab=1">
								A-Z
							</a>
							<a class="sort-button focus" href="song-page.php?tab=2">
								Latest
							</a>
							<a class="sort-button" href="song-page.php?tab=3">
								Top
							</a>
						</div>';
					}else{
						echo '
						<div id="sortbar">
							<a class="sort-button" href="song-page.php?tab=1">
								A-Z
							</a>
							<a class="sort-button" href="song-page.php?tab=2">
								Latest
							</a>
							<a class="sort-button focus" href="song-page.php?tab=3">
								Top
							</a>
						</div>';
					}
				?>
				<br><br><br>
<!--				Call the songs display controller here.-->
				<?php 
					if($tab==1){
						$songDisplayController->displaySongPagAZ($page, $entriesPerPage);
					}else if ($tab==2){
						$songDisplayController->displaySongPagLatest($page, $entriesPerPage);
					}else if ($tab==3){
						$songDisplayController->displaySongPagTopViews($page, $entriesPerPage);
					}
				?>
				
				<div class="flex-row-break"></div> 
				<br><br>
				<div class="pagebar">
					<?php
						$totalPages = $songDisplayController->getNumberOfPages($entriesPerPage);
						$displayRange = 3;
					
						if($page > 1){
							echo "<a href='song-page.php?page=1 &tab=".$tab."'>&nbsp<<&nbsp</a>"; 
							
							echo "<a href='song-page.php?page=".($page-1)."&tab=".$tab."'> < </a>";   
						}
						
						for($i=$page-$displayRange; $i <= $page+$displayRange; $i++){
							if($i > 0 && $i <= $totalPages){
								if ($i == $page){
									echo "<a class = \"chosen\" href='song-page.php?page=".$i."&tab=".$tab."'> ".$i." </a>"; 	
								}else{
									echo "<a href='song-page.php?page=".$i."&tab=".$tab."'> ".$i." </a>"; 
								}
								  
							}
						}
						
					
						if($page < $totalPages){
							echo "<a href='song-page.php?page=".($page+1)."&tab=".$tab."'> > </a>"; 
							echo "<a href='song-page.php?page=".$totalPages."&tab=".$tab."'>&nbsp>>&nbsp</a>"; 
						}
					?>
				</div>
			</div>
		</section>
		
		<?php
			require "footer.php";
		?>