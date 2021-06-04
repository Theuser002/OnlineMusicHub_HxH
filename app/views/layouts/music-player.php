<?php
session_start();
?>
<?php
include_once( '../../controllers/songs-display.controller.php' );
$tab = $_GET['tab'];
$page = $_GET['page'];
$entriesPerPage = $_GET['entriesPerPage'];
$songIndex = $_GET['index'];

$songsDisplayController = new SongsDisplayController();

if($tab==1){
    $songPagList = $songsDisplayController->getPaginationAZ( $page, $entriesPerPage );
}else if($tab==2){
    $songPagList = $songsDisplayController->getPaginationLatest( $page, $entriesPerPage );
}else{
    $songPagList = $songsDisplayController->getPaginationTopViews( $page, $entriesPerPage );
}

$total = count($songPagList);

if($songIndex < 0){
    $songIndex = $total-1;
}

if($songIndex > $total-1){
    $songIndex = 0;
}

$song = $songPagList[$songIndex];


?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/music-player.css">
</head>
<body id="music-player-body">
<?php include('navbar.php') ?>
<header class="song-header">
    <?php 
       echo '<h1>All Songs</h1>';
    ?>
</header>
<div class="content">
    <div class="music-container" id="music-container">
    <div class="music-info">
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
        <div class="progress-container" id="progress-container">
            <div class="progress" id="progress"></div>
        </div>
    </div>
    <audio src="<?php echo $song->getAudioLink(); ?>" id="audio" autoplay="true"></audio>
    <div class="img-container"><img src="<?php echo $song->getSongImageLink(); ?>" alt="music-cover" id="cover"></div>
    <div class="navigation">
        <a id="prev" class="action-btn" href="<?php
                                                echo 'music-player.php?tab='.$tab.'&page='.$page.'&entriesPerPage='.$entriesPerPage.'&index='.($songIndex-1);
                                              ?>">
            <i class="fas fa-backward"></i>
        </a>
        
        <a id="play" class="action-btn action-btn-big">
            <i class="fas fa-play"></i>
        </a>
        
        <a id="next" class="action-btn" href="<?php
                                                echo 'music-player.php?tab='.$tab.'&page='.$page.'&entriesPerPage='.$entriesPerPage.'&index='.($songIndex+1);
                                              ?>">
            <i class="fas fa-forward"></i>
        </a>
    </div>
    <?php
        include 'music-player.script.php';
        echo $songIndex+1;
        echo $song->getSongID();
    ?>
        
        
</div>
</div>
<?php include 'footer.php' ?>
