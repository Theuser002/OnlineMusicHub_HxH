<?php
session_start();
?>
<?php
    include_once('../../controllers/singer.controller.php');
    $c = new SingerController();
    $singerList = $c->invoke();
    $listlen = count($singerList);
    //define total number of results you want per page
    $result_per_page = 8;

    //determine the total number of pages available  
    $number_of_page = ceil($listlen/$result_per_page);

    //determine which page number visitor is currently on  
    if(!isset($_GET['page'])){
        $page = 1;
    }else{
        $page = $_GET['page'];
    }
    $singerPagList = $c->getPaginationSinger($page, $result_per_page);
?>

<!DOCTYPE HTML>
<html>

    <head>
        <title>All artists</title>
        <link href="css/pagination.css" rel="stylesheet" type="text/css">
        <link rel="icon" type="image/png" sizes="32x32" href="images/logo.png">
    </head>

    <style>
        
    </style>
<body id="singer-body">
    <?php
        require "navbar.php";
    ?>
    <header id="singer-header">
        <h1>Artists</h1>
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
        </ul>
    </header>
    <section class="content">
        <?php
            include_once('singer-board.php');
        ?>
    </section>
    <?php
    require "footer.php";
    ?>