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
				<br><br>
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