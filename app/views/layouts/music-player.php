<?php
session_start();
?>
<?php
include_once( '../../controllers/songs-display.controller.php' );
$songID = $_GET['songID'];
$prevID = $_GET['prevID'];
$nextID = $_GET['nextID'];

$songsDisplayController = new SongsDisplayController();
$song = $songsDisplayController->getSongByID( $songID );
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
    <audio src="<?php echo $song->getAudioLink(); ?>" id="audio"></audio>
    <div class="img-container"><img src="<?php echo $song->getSongImageLink(); ?>" alt="music-cover" id="cover"></div>
    <div class="navigation">
        <a id="prev" class="action-btn" href="music-player.php?songID=<?php echo($prevID); ?>&prevID=<?php echo($prevID); ?>&nextID=<?php echo($nextID); ?>">
            <i class="fas fa-backward"></i>
        </a>
        
        <a id="play" class="action-btn action-btn-big">
            <i class="fas fa-play"></i>
        </a>
        
        <a id="next" class="action-btn" href="music-player.php?songID=<?php echo($nextID); ?>&prevID=<?php echo($prevID); ?>&nextID=<?php echo($nextID); ?>">
            <i class="fas fa-forward"></i>
        </a>
    </div>
    <?php
        include 'music-player.script.php';
        echo $songID;
        echo $prevID;
        echo $nextID;
    ?>
        
        
</div>
</div>
<?php include 'footer.php' ?>
