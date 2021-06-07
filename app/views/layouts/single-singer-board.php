<div class="container single-singer-board">
    <?php
        if ( $tab == 1 ) {
            echo '
                <div id="sortbar">
                    <a class="sort-button focus" href="single-singer-page.php?singerID='.$singerID.'&tab=1">
                        Songs
                    </a>
                    <a class="sort-button" href="single-singer-page.php?singerID='.$singerID.'&tab=2">
                        MVs
                    </a>
                </div>';
        } else {
            echo '
                <div id="sortbar">
                    <a class="sort-button" href="single-singer-page.php?singerID='.$singerID.'&tab=1">
                        Songs
                    </a>
                    <a class="sort-button focus" href="single-singer-page.php?singerID='.$singerID.'&tab=2">
                        MVs
                    </a>
                </div>';
        }
    ?>
    <br>
    <br>
    <!--				Call the songs display controller here.-->
    <?php
    if ( $tab == 1 ) {
        for($i=0;$i<count($SongPagList);$i++){ ?>
            <a class="single-song" href="music-player.php?tab=1&page=1&entriesPerPage=5&index=0">
              <div class="song-img-wrap">
                <!--     Song image -->
                <img class="img" src="images/<?php echo $SongPagList[$i]->getSongImageLink() ?>" />
              </div>
                <div class="vr"></div>
                <div class="title-and-views">
                <!--     Song title & views-->
                <div class="title">
                  <!--       Song title -->
                  <?php echo $SongPagList[$i]->getSongTitle() ?>
                </div>
                <hr />
                <div class="view">
                  <!--       Views -->
                    <?php echo $SongPagList[$i]->getViews() ?>&nbsp; views
                </div>
              </div>
            </a>
        <?php }
        } else if ( $tab == 2 ) {
            for($i=0;$i<count($MVPagList);$i++){
                echo "<div class=\"d-flex flex-column\">";
                echo "<a href=\"single-mv-page.php?MVID=".$MVPagList[$i]->getMVID()."\" onclick=\"updateMVView(".$MVPagList[$i]->getMVID().")\"><img src=\"images/".$MVPagList[$i]->getMVImage()."\" class=\"img-fluid\"></a>
                <div class=\"container\">
                <h5 class=\"mv-title\">".$MVPagList[$i]->getMVTitle()." #".($i)."</h5><h6 class=\"mv-view\">View: ".$MVPagList[$i]->getMVView()."</h6>
                </div>";
                echo "</div>";
           }
        }
    ?>
    <div class="flex-row-break"></div>
    <div class="pagebar">
        <?php
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