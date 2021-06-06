<?php
    session_start();
?>
<?php
    require "navbar.php";
?>
<?php
    include_once( '../../controllers/mv.controller.php' );

    if ( !isset( $_GET[ 'tab' ] ) || $_GET[ 'tab' ] < 1 || $_GET[ 'tab' ] > 3 ) { //Find on the URL
        $tab = 1;
    } else {
        $tab = $_GET[ 'tab' ];
    }

    if ( !isset( $_GET[ 'page' ] ) || $_GET[ 'page' ] < 1 ) { //Find on the URL
        $page = 1;
    } else {
        $page = $_GET[ 'page' ];
    }

    $c = new Ctrl_MV();
    $mvlist = $c->invoke();
    $listlen = count($mvlist);
    //define total number of results you want per page
    $result_per_page = 8;

    //determine the total number of pages available  
    $totalPages = ceil($listlen/$result_per_page);
?>