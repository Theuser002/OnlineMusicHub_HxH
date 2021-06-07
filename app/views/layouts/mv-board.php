<div class="container mv-board">
    <?php
    if ( $tab == 1 ) {
        echo '
						<div id="sortbar">
							<a class="sort-button focus" href="mv-page.php?tab=1">
								A-Z
							</a>
							<a class="sort-button" href="mv-page.php?tab=2">
								Latest
							</a>
							<a class="sort-button" href="mv-page.php?tab=3">
								Top
							</a>
						</div>';
    } else if ( $tab == 2 ) {
        echo '
						<div id="sortbar">
							<a class="sort-button" href="mv-page.php?tab=1">
								A-Z
							</a>
							<a class="sort-button focus" href="mv-page.php?tab=2">
								Latest
							</a>
							<a class="sort-button" href="mv-page.php?tab=3">
								Top
							</a>
						</div>';
    } else {
        echo '
						<div id="sortbar">
							<a class="sort-button" href="mv-page.php?tab=1">
								A-Z
							</a>
							<a class="sort-button" href="mv-page.php?tab=2">
								Latest
							</a>
							<a class="sort-button focus" href="mv-page.php?tab=3">
								Top
							</a>
						</div>';
    }
    ?>
    <br>
    <br>
    <div class="flex-row-break" style="height: 50px;"></div>
    <?php
    if ( $tab == 1 ) {
        //A-Z
        $MVPagList = $c->getPaginationAZ( $page, $result_per_page );
        for ( $i = 0; $i < count( $MVPagList ); $i++ ) {
            echo '
                    <a class="single-mv" href="single-mv-page.php?MVID=' . $MVPagList[ $i ]->getMVID() . '" onclick="updateMVView(' . $MVPagList[ $i ]->getMVID() . ')">
                        <div class="mv-image-wrap">
                            <img class="mv-img" src="images/' . $MVPagList[ $i ]->getMVImage() . '">
                        </div>
                        <div class="mv-title-and-views">
                            <div class="mv-title">' . $MVPagList[ $i ]->getMVTitle() . '</div>
                            <div class="mv-view">' . $MVPagList[ $i ]->getMVView() . ' views </div>
                            <div class="play-btn">
                                <i class="far fa-play-circle"></i>
                            </div>
                        </div>
                    </a>
                ';
        }
    } else if ( $tab == 2 ) {
        //Latest
        $MVPagList = $c->getPaginationLatest( $page, $result_per_page );
        for ( $i = 0; $i < count( $MVPagList ); $i++ ) {
            echo '
                    <a class="single-mv" href="single-mv-page.php?MVID=' . $MVPagList[ $i ]->getMVID() . '" onclick="updateMVView(' . $MVPagList[ $i ]->getMVID() . ')">
                        <div class="mv-image-wrap">
                            <img class="mv-img" src="images/' . $MVPagList[ $i ]->getMVImage() . '">
                        </div>
                        <div class="mv-title-and-views">
                            <div class="mv-title">' . $MVPagList[ $i ]->getMVTitle() . '</div>
                            <div class="mv-view">' . $MVPagList[ $i ]->getMVView() . ' views </div>
                            <div class="play-btn">
                                <i class="far fa-play-circle"></i>
                            </div>
                        </div>
                    </a>
                ';
        }
    } else if ( $tab == 3 ) {
        //TopView
        $MVPagList = $c->getPaginationView( $page, $result_per_page );
        for ( $i = 0; $i < count( $MVPagList ); $i++ ) {
            echo '
                    <a class="single-mv" href="single-mv-page.php?MVID=' . $MVPagList[ $i ]->getMVID() . '" onclick="updateMVView(' . $MVPagList[ $i ]->getMVID() . ')">
                        <div class="mv-image-wrap">
                            <img class="mv-img" src="images/' . $MVPagList[ $i ]->getMVImage() . '">
                        </div>
                        <div class="mv-title-and-views">
                            <div class="mv-title">' . $MVPagList[ $i ]->getMVTitle() . '</div>
                            <div class="mv-view">' . $MVPagList[ $i ]->getMVView() . ' views </div>
                            <div class="play-btn">
                                <i class="far fa-play-circle"></i>
                            </div>
                        </div>
                    </a>
                ';
        }
    }
    ?>
    <div class="flex-row-break"></div>
    <br>
    <br>
    <div class="pagebar">
        <?php
        $displayRange = 3;

        if ( $page > 1 ) {
            echo "<a href='mv-page.php?page=1 &tab=" . $tab . "'>&nbsp<<&nbsp</a>";

            echo "<a href='mv-page.php?page=" . ( $page - 1 ) . "&tab=" . $tab . "'> < </a>";
        }

        for ( $i = $page - $displayRange; $i <= $page + $displayRange; $i++ ) {
            if ( $i > 0 && $i <= $totalPages ) {
                if ( $i == $page ) {
                    echo "<a class = \"chosen\" href='mv-page.php?page=" . $i . "&tab=" . $tab . "'> " . $i . " </a>";
                } else {
                    echo "<a href='mv-page.php?page=" . $i . "&tab=" . $tab . "'> " . $i . " </a>";
                }

            }
        }


        if ( $page < $totalPages ) {
            echo "<a href='mv-page.php?page=" . ( $page + 1 ) . "&tab=" . $tab . "'> > </a>";
            echo "<a href='mv-page.php?page=" . $totalPages . "&tab=" . $tab . "'>&nbsp>>&nbsp</a>";
        }
        ?>
    </div>
</div>