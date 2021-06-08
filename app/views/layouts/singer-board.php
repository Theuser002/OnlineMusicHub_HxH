<div class="container singer-board">
    <div class="flex-row-break" style="height: 30px"></div>
    <?php
        for($i=0;$i<count($singerPagList);$i++){?>
            <div class="single-singer">
                <a href="single-singer-page.php?singerID=<?php echo $singerPagList[$i]->getSingerID(); ?>" class="singer-image-wrap onhover">
                    <img src="images/<?php echo $singerPagList[$i]->getSingerImage(); ?>" class="singer-image">
                </a>
                <div class="hide">
                    <h5 class="singer-name">
                        <?php echo $singerPagList[$i]->getSingerName(); ?>
                    </h5>
                    <?php echo $singerPagList[$i]->getBackground(); ?>
                </div>
            </div>
    <?php	}?>
    
    <div class="flex-row-break"></div>
    <div class="pagebar">
        <?php
        $displayRange = 3;

        if ( $page > 1 ) {
            echo "<a href='singer-page.php?page=1'>&nbsp<<&nbsp</a>";

            echo "<a href='singer-page.php?page=" . ( $page - 1 ) . "'> < </a>";
        }

        