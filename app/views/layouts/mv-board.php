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