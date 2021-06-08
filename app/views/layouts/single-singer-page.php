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

    if(isset($_GET['singerID'])){
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

 