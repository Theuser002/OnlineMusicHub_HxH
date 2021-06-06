<?php
    session_start();
?>
<?php
    require "navbar.php";
?>
<?php
    include_once( '../../controllers/mv.controller.php' );

    

    $c = new Ctrl_MV();
    $mvlist = $c->invoke();
    $listlen = count($mvlist);
    //define total number of results you want per page
    $result_per_page = 8;

    //determine the total number of pages available  
    $totalPages = ceil($listlen/$result_per_page);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <link rel="icon" type="image/png" sizes="32x32" href="images/logo.png">
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body id="mv-body">
        <style>
            .mv-title {
                text-align: left;
            }
            .mv-view {
                text-align: right;
            }
            a.active {
                background-color: #C8C8C8;
            }
        </style>
        
        <section class="content">
           
            <script src="js/ajax.js"></script> 
        </section>
    <?php
    require 'footer.php';
    ?>
