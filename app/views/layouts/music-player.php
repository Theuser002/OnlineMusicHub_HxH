<?php
session_start();
?>
<?php
include_once( '../../controllers/songs-display.controller.php' );
if (!isset($_GET['tab'])){
    $tab = 1;
}else{
    $tab = $_GET[ 'tab' ];
}

if (!isset($_GET[ 'page' ])){
    $page = 1;
}else{
    $page = $_GET[ 'page' ];
}

if (!isset($_GET[ 'entriesPerPage' ])){
    $entriesPerPage = 1;
}else{
    $entriesPerPage = $_GET[ 'entriesPerPage' ];
}

if (!isset($_GET[ 'index' ])){
    $songIndex = 1;
}else{
    $songIndex = $_GET[ 'index' ];
}


$songsDisplayController = new SongsDisplayController();

if ( $tab == 1 ) {
    $songPagList = $songsDisplayController->getPaginationAZ( $page, $entriesPerPage );
} else if ( $tab == 2 ) {
    $songPagList = $songsDisplayController->getPaginationLatest( $page, $entriesPerPage );
} else {
    $songPagList = $songsDisplayController->getPaginationTopViews( $page, $entriesPerPage );
}

$total = count( $songPagList );

if ( $songIndex < 0 ) {
    $songIndex = $total - 1;
}

if ( $songIndex > $total - 1 ) {
    $songIndex = 0;
}

$song = $songPagList[ $songIndex ];


?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo $song->getSongTitle(); ?></title>
<link rel="icon" type="image/png" sizes="32x32" href="images/logo.png">
<link rel="stylesheet" type="text/css" href="css/music-player.css">
</head>
<body id="music-player-body">
<?php include('navbar.php') ?>
<header id="music-player-header">
    <?php
    echo '<h1>... Now playing ...</h1>';
    ?>
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li><a href="<?php echo 'song-page.php?tab='.$tab.'&page='.$page;?>">All songs</a></li>
    </ul>
</header>
<div class="content">
<!--    <div class="underlay-square left-up dark-blurry"></div>-->
    <div class="underlay-square right-down bright-blurry"></div>
    <div class="music-container" id="music-container">
        <a id="back-page" class="" href="<?php echo 'song-page.php?tab='.$tab.'&page='.$page;?>">
            <i class="fas fa-arrow-left"></i>
        </a>
        <a id="add-fav" class="" href="">
            <i class="far fa-bookmark"></i>
        </a>
        <div class="music-info shadow dark-blurry">
            <h4 id="title">
                <?php
                echo $song->getSongTitle();
                ?>
            </h4>
            <h6 id="views">
                <?php
                echo $song->getViews() . ' views';
                ?>
            </h6>
        </div>
        <audio src="<?php echo $song->getAudioLink(); ?>" id="audio" autoplay="true"></audio>
        <div class="img-container"><img src="<?php echo $song->getSongImageLink(); ?>" alt="music-cover" id="cover"></div>
        <div id="horizontal-bar"></div>
        <div class="navigation"><a id="prev" class="action-btn" href="<?php
                                                    echo 'music-player.php?tab='.$tab.'&page='.$page.'&entriesPerPage='.$entriesPerPage.'&index='.($songIndex-1);
                                                  ?>"><i class="fas fa-backward"></i></a><a id="play" class="action-btn action-btn-big"><i class="fas fa-play"></i></a><a id="next" class="action-btn" href="<?php
                                                    echo 'music-player.php?tab='.$tab.'&page='.$page.'&entriesPerPage='.$entriesPerPage.'&index='.($songIndex+1);
                                                  ?>"><i class="fas fa-forward"></i></a>
        </div>
        <div class="progress-container" id="progress-container">
            <div class="progress" id="progress"></div>
        </div>
    </div>
</div>
    
<script src="js/music-player.js"></script>
<?php include 'footer.php' ?>
