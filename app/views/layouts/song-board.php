<div class="container song-board bright-blurry">
    <?php
    if ( $tab == 1 ) {
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
    } else if ( $tab == 2 ) {
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
    } else {
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
    <br>
    <br>
    <!--				Call the songs display controller here.-->
    <?php
    if ( $tab == 1 ) {
        //A-Z
        $songPagList = $songsDisplayController->getPaginationAZ( $page, $entriesPerPage );
        $i = 0;
        $total = count( $songPagList );
        
        while ( $i < $total ) {
            $song = $songPagList[$i];
            $songID = $song->getSongID();
            $songTitle = $song->getSongTitle();
            $views = $song->getViews();
            $songImageLink = $song->getSongImageLink();
			$singer = $songsDisplayController->getOwnSinger($songID);
            $singerName = $singer->getSingerName();
            
            echo'
			<a class="single-song" href="music-player.php?tab='.$tab.'&page='.$page.'&entriesPerPage='.$entriesPerPage.'&index='.$i.'">
				  <div class="song-img-wrap">
					<!--     Song image -->
					<img class="img" src="images/'.$songImageLink.'" />
				  </div>
			  <div class="vr"></div>
			  <div class="title-and-views">
				<!--     Song title & views-->
				<div class="title">
				  <!--       Song title -->
				  '.$songTitle.'
				</div>
				<hr />
                <div class="artist">
                '.$singerName.'
                </div>
				<div class="view">
				  <!--       Views -->
					'.$views.'&nbsp views
				</div>
			  </div>
			</a>
		  ';
            $i++;
        }


    } else if ( $tab == 2 ) {
        //Latest
       $songPagList = $songsDisplayController->getPaginationLatest( $page, $entriesPerPage );
        $i = 0;
        $total = count( $songPagList );
        
        while ( $i < $total ) {
            $song = $songPagList[$i];
            $songID = $song->getSongID();
            $songTitle = $song->getSongTitle();
            $views = $song->getViews();
            $songImageLink = $song->getSongImageLink();
			$singer = $songsDisplayController->getOwnSinger($songID);
            $singerName = $singer->getSingerName();
            
            echo'
			<a class="single-song" href="music-player.php?tab='.$tab.'&page='.$page.'&entriesPerPage='.$entriesPerPage.'&index='.$i.'">
				  <div class="song-img-wrap">
					<!--     Song image -->
					<img class="img" src="images/'.$songImageLink.'" />
				  </div>
			  <div class="vr"></div>
			  <div class="title-and-views">
				<!--     Song title & views-->
				<div class="title">
				  <!--       Song title -->
				  '.$songTitle.'
				</div>
				<hr />
                <div class="artist">
                '.$singerName.'
                </div>
				<div class="view">
				  <!--       Views -->
					'.$views.'&nbsp views
				</div>
			  </div>
			</a>
		  ';
            $i++;
        }
    } else if ( $tab == 3 ) {
        //TopView
        $songPagList = $songsDisplayController->getPaginationTopViews( $page, $entriesPerPage );
        $i = 0;
        $total = count( $songPagList );
        
        while ( $i < $total ) {
            $song = $songPagList[$i];
            $songID = $song->getSongID();
            $songTitle = $song->getSongTitle();
            $views = $song->getViews();
            $songImageLink = $song->getSongImageLink();
			$singer = $songsDisplayController->getOwnSinger($songID);
            $singerName = $singer->getSingerName();
            
            echo'
			<a class="single-song" href="music-player.php?tab='.$tab.'&page='.$page.'&entriesPerPage='.$entriesPerPage.'&index='.$i.'">
				  <div class="song-img-wrap">
					<!--     Song image -->
					<img class="img" src="images/'.$songImageLink.'" />
				  </div>
			  <div class="vr"></div>
			  <div class="title-and-views">
				<!--     Song title & views-->
				<div class="title">
				  <!--       Song title -->
				  '.$songTitle.'
				</div>
				<hr />
                <div class="artist">
                '.$singerName.'
                </div>
				<div class="view">
				  <!--       Views -->
					'.$views.'&nbsp views
				</div>
			  </div>
			</a>
		  ';
            $i++;
        }
    }
    ?>
    <div class="flex-row-break"></div>
    <div class="pagebar">
        <?php
        $totalPages = $songsDisplayController->getNumberOfPages( $entriesPerPage );
        $displayRange = 3;

        if ( $page > 1 ) {
            echo "<a href='song-page.php?page=1 &tab=" . $tab . "'>&nbsp<<&nbsp</a>";

            echo "<a href='song-page.php?page=" . ( $page - 1 ) . "&tab=" . $tab . "'> < </a>";
        }

        for ( $i = $page - $displayRange; $i <= $page + $displayRange; $i++ ) {
            if ( $i > 0 && $i <= $totalPages ) {
                if ( $i == $page ) {
                    echo "<a class = \"chosen\" href='song-page.php?page=" . $i . "&tab=" . $tab . "'> " . $i . " </a>";
                } else {
                    echo "<a href='song-page.php?page=" . $i . "&tab=" . $tab . "'> " . $i . " </a>";
                }

            }
        }


        if ( $page < $totalPages ) {
            echo "<a href='song-page.php?page=" . ( $page + 1 ) . "&tab=" . $tab . "'> > </a>";
            echo "<a href='song-page.php?page=" . $totalPages . "&tab=" . $tab . "'>&nbsp>>&nbsp</a>";
        }
        ?>
    </div>
</div>
