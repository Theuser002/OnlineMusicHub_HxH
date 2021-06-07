<?php
session_start();
?>

<?php
    include_once('../../controllers/singer.controller.php');
	
    if(!isset($_GET['tab']) || $_GET['tab'] < 1 || $_GET['tab'] > 2){ //Find on the URL
		$tab = 1;
	}else{
		$tab = $_GET['tab'];
	}

    if(isset($singerID)){
        $singerID = $_GET['singerID'];
    }else{
        $singerID = 1;
    }

    //determine which page number visitor is currently on  
    if(!isset($_GET['page'])){
        $page = 1;
    }else{
        $page = $_GET['page'];
    }

    $c = new SingerController();
    $singer = $c->getASinger($singerID);
    $singerName = $singer->getSingerName();
    $singerBackground = $singer->getBackground();

    
    
    if($tab == 1){
        $songlist = $c->getSingerSong($_GET['singerID']);
        $listlen = count($songlist);
        //define total number of results you want per page
        $result_per_page = 5;
        $SongPagList = $c->getPaginationSong($page, $result_per_page, $singerID);
    }else {
        $mvlist = $c->getSingerMV($_GET['singerID']);
        $listlen = count($mvlist);
        //define total number of results you want per page
        $result_per_page = 8;
        $MVPagList = $c->getPaginationMV($page, $result_per_page, $singerID);
    }
    //determine the total number of pages available  
    $number_of_page = ceil($listlen/$result_per_page);
?>

<!DOCTYPE HTML>
<head>
    <title><?php ?></title>
	<link rel="icon" type="image/png" sizes="32x32" href="images/logo.png">
</head>
<body id="single-singer-body">
    <?php
        require "navbar.php";
    ?>
    <style>
        .mv-title{
            text-align: left;
        }

        .mv-view{
            text-align: right;
        }
        a.active{
            background-color: #C8C8C8; 
        }
    </style>
    
    <header id="single-singer-header">
        <h1><?php $singerName ?></h1>
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php">Artists</a></li>
        </ul>
    </header>
    <div class="content">
        <?php
            include_once('single-singer-board.php');
        ?>
    </div>
<script src="js/ajax.js"></script>
<?php
    require 'footer.php';
?>