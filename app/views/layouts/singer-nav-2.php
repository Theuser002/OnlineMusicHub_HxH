<div class="container mv-board">
    <?php
        echo '
            <div id="sortbar">
                <a class="sort-button" href="single-singer-page.php?singerID=' . $singerID . '&tab=1">
                    Songs
                </a>
                <a class="sort-button focus" href="single-singer-page.php?singerID=' . $singerID . '&tab=2">
                    MVs
                </a>
            </div>';
    ?>
    <?php
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
    ?>
    <div class="flex-row-break"></div>
    <div class="pagebar">
        <?php
        $displayRange = 3;

        if ( $page > 1 ) {
            echo "<a href='single-singer-page.php?page=1 &singerID=" . $singerID . "&tab=" . $tab . "'>&nbsp<<&nbsp</a>";

            echo "<a href='single-singer-page.php?page=" . ( $page - 1 ) . "&singerID=" . $singerID . "&tab=" . $tab . "'> < </a>";
        }

        for ( $i = $page - $displayRange; $i <= $page + $displayRange; $i++ ) {
            if ( $i > 0 && $i <= $number_of_page ) {
                if ( $i == $page ) {
                    echo "<a class = \"chosen\" href='single-singer-page.php?page=" . $i . "&singerID=" . $singerID . "&tab=" . $tab . "'> " . $i . " </a>";
                } else {
                    echo "<a href='single-singer-page.php?page=" . $i . "&singerID=" . $singerID . "&tab=" . $tab . "'> " . $i . " </a>";
                }

            }
        }


        if ( $page < $number_of_page ) {
            echo "<a href='single-singer-page.php?page=" . ( $page + 1 ) . "&singerID=" . $singerID . "&tab=" . $tab . "'> > </a>";
            echo "<a href='single-singer-page.php?page=" . $number_of_page . "&singerID=" . $singerID . "&tab=" . $tab . "'>&nbsp>>&nbsp</a>";
        }
        ?>
    </div>
</div>