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
    
</div>