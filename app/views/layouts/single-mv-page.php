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
    <header id="song-header">
        <h1>...Now watching...</h1>
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
        </ul>
    </header>
    <div class="container single-mv-board">
<!--        <div class="container iframe-wrap">-->
        <iframe width="100%" height="500px" src="<?php echo $mv->getMVLink(); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
        </iframe>
<!--        </div>-->
        <div class="single-mv-title-and-views">
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
                
            <div class="single-mv-title">
                <?php echo $mv->getMVTitle(); ?>
            </div>
            <div class="single-mv-artist">
                <?php echo $singer->getSingerName(); ?>
            </div>
            <div>
                <?php echo $mv->getMVView() ?>
            </div>

        </div>
        <div class="relate-video"><br>
            <?php
            foreach ($relateList as $data) { ?>
                <div class="relate-video-item">
                    <a href="single-mv-page.php?MVID=<?php echo $data->getMVID() ?>" onClick="updateMVView(<?php echo $data->getMVID() ?>)">
                        <img class="relate-img" src="images/<?php echo $data->getMVImage() ?>">
                    </a>
                    <?php echo $data->getMVTitle() ?><br><?php echo $data->getMVView().' views' ?>
                </div>
                <br>
            <?php } ?>
        </div>
    </div>
    
    <script src="js/ajax.js"></script>
    <?php
    require 'footer.php';
    ?>