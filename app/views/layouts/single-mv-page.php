<?php
session_start();
?>

<?php
include_once('../../controllers/mv.controller.php');

if (isset($_GET['MVID'])) {
    $MVID = $_GET['MVID'];
} else {
    include_once('error.php');
    die();
}

$c = new Ctrl_MV();
$mv = $c->getSingleMV($MVID);
$singer = $c->getOwnSinger($MVID);
$title = $mv->getMVTitle();
$relateList =  $c->getRelateVideo($MVID);

if (isset($_SESSION['accountID'])){
    $accountID = $_SESSION['accountID'];
    $isFav = $c->isFavMV($MVID, $accountID);
}else{
    $isFav = 0;
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>
            <?php echo $title ?>
        </title>
        <link rel="icon" type="image/png" sizes="32x32" href="images/logo.png">
        <link rel="stylesheet" type="text/css" href="css/single-mv-page.css">
    </head>
    <body id="single-mv-body">
    <?php
    require "navbar.php";
    ?>
        <style>
            .single-mv-board{
/*                position: relative;*/
                width: 100%;
                height: 100%;
            }
            
            .mv-holder{
                width: 70%;
                height: 100%;
                float: left;
                margin-right: 1%;
                border-radius: 25px;
            }
            .relate-video{
                width: 29%;
                height: inherit;
                float: left;
            }
            .relate-img{
                float: left;
                width: 40%;
                max-height: 100%;
                margin-right: 5px;
            }
            .relate-video-holder{
                display: block;
                height: 80px;
                border-radius: 15px;
            }
            .iframe-wrap{
                padding: 10px;
                margin: 5%;
            }
            
            .single-mv-title-and-views{
                position: relative;
                padding: 15px;
            }
            
            .relate-img{
                border-radius: 15px 0 0 15px;
            }
            
            .single-mv-title-and-views{
                color: gray;
            }
            
            .single-mv-title-and-views .title{
                color: #B54143;
                font-size: 30px;
            }
        </style>
     <header id="song-header">
        <h1>...Now watching...</h1>
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
        </ul>
    </header>
    <div class="container single-mv-board">
        <div class="mv-holder dark-blurry shadow">
            <div class="iframe-wrap">
                <iframe width="100%" height="500px" src="<?php echo $mv->getMVLink();?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="container single-mv-title-and-views">
                <?php
                echo "<div class='title'>".$mv->getMVTitle()."</div>"."<br>".$singer->getSingerName()."<br>".$mv->getMVView()." views"; 
                ?>	
                <?php
                    if(isset($accountID)){
                        if($isFav){
                            echo '<a id="remove-fav" onclick=removeFavMV('.$MVID.')>
                                <i class="fas fa-heart"></i>
                            </a>';
                        }else{
                            echo '<a id="add-fav" onclick=addFavMV('.$MVID.')>
                                <i class="far fa-heart"></i>
                            </a>';
                        }
                    }
                ?>
            </div>
        </div>
        <div class="container relate-video light-blurry"><br>
            <?php
            foreach($relateList as $data){ ?>
            <div class="relate-video-holder dark-blurry"><a href="single-mv-page.php?MVID=<?php echo $data->getMVID() ?>" onClick="updateMVView(<?php echo $data->getMVID() ?>)"><img class="relate-img" src="images/<?php echo $data->getMVImage() ?>"></a><?php echo $data->getMVTitle() ?><?php echo $data->getMVView().' views' ?></div><div class="clearfix"></div><br>
            <?php } ?>
        </div>
    </div>
    <div class="clearfix"></div>
    <script src="js/ajax.js"></script>
<?php
require 'footer.php';
?>
