<div class="flex-row-break"></div>
    <div class="pagebar">
        <?php
        $displayRange = 3;

        if ( $page > 1 ) {
            echo "<a href='single-singer-page.php?page=1 &singerID=".$singerID."&tab=" . $tab . "'>&nbsp<<&nbsp</a>";

            echo "<a href='single-singer-page.php?page=" . ( $page - 1 ) . "&singerID=".$singerID."&tab=" . $tab . "'> < </a>";
        }



        if ( $page < $number_of_page ) {
            echo "<a href='single-singer-page.php?page=" . ( $page + 1 ) . "&singerID=".$singerID."&tab=" . $tab . "'> > </a>";
            echo "<a href='single-singer-page.php?page=" . $number_of_page . "&singerID=".$singerID."&tab=" . $tab . "'>&nbsp>>&nbsp</a>";
        }
        ?>
    </div>
</div>