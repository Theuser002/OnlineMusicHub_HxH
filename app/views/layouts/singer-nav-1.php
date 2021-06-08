<div class="container song-board">
    <?php
        echo '
            <div id="sortbar">
                <a class="sort-button focus" href="single-singer-page.php?singerID=' . $singerID . '&tab=1">
                    Songs
                </a>
                <a class="sort-button" href="single-singer-page.php?singerID=' . $singerID . '&tab=2">
                    MVs
                </a>
            </div>'; 
    ?>
    <?php for ( $i = 0; $i < count( $SongPagList ); $i++ ) { ?>
        <a class="single-song" href="music-player-2.php?index=<?php echo $i?>&total=<?php echo $listlen ?>&singerID=<?php echo $singerID ?>&option=2">
            <div class="song-img-wrap"> 
                <!--     Song image --> 
                <img class="img" src="images/<?php echo $SongPagList[$i]->getSongImageLink() ?>" /> </div>
            <div class="vr"></div>
            <div class="title-and-views"> 
                <!--     Song title & views-->
                <div class="title"> 
                    <!--       Song title --> 
                    <?php echo $SongPagList[$i]->getSongTitle() ?> </div>
                <hr />
                <div class="view"> 
                    <!--       Views --> 
                    <?php echo $SongPagList[$i]->getViews() ?>&nbsp; views </div>
            </div>
        </a>
    <?php } ?>
</div>