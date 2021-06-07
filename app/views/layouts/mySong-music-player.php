<?php
session_start();
?>
<?php
    include_once( '../../controllers/songs-display.controller.php' );
?>

<?php
    $songsDisplayController = new SongsDisplayController();
    $mySong = $songsDisplayController->getFavSongList( $_SESSION[ 'accountID' ] );

    if(isset($_GET['index'])){
        $songIndex =  $_GET['index'];
    }else{
        $songIndex = 0;
    }

    if(isset($_GET['total'])){
        $total = $_GET['total'];
    }else{
        $total = 1;
    }

    if($songIndex < 0){
        $songIndex = $total-1;
    }

    if ($songIndex > $total -1){
        $songIndex = 0;
    }
    
    $song = $mySong[$songIndex];
    $songID = $song->getSongID();
    $songTitle = $song->getSongTitle();
    $songAudioLink = $song->getAudioLink();
    $songImageLink = $song->getSongImageLink();
    $songViews = $song->getViews();
    $singer = $songsDisplayController->getOwnSinger($songID);
    $singerName = $singer->getSingerName();
    

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
        <li><a href="account-page.php">Account</a></li>
    </ul>
</header>
<div class="content">
<!--    <div class="underlay-square left-up dark-blurry"></div>-->
    <div class="underlay-square right-down bright-blurry"></div>
    <div class="music-container" id="music-container">
        <a id="back-page" class="" href="<?php echo ''?>">
            <i class="fas fa-arrow-left"></i>
        </a>
        <?php
            if(isset($accountID)){
                if($isFav){
                    echo '<a id="remove-fav" onclick=removeFavSong('.$songID.')>
                        <i class="fas fa-bookmark"></i>
                    </a>';
                }else{
                    echo '<a id="add-fav" onclick=addFavSong('.$songID.')>
                        <i class="far fa-bookmark"></i>
                    </a>';
                }
            }
        ?>
        <a id="download" class="" href="songs/<?php echo $songAudioLink ?>" download="<?php echo $songTitle ?>">
            <i class="fas fa-arrow-down"></i>
        </a>
        <div class="music-info shadow dark-blurry">
            <h4 id="title">
                <?php
                echo $songTitle;
                ?>
            </h4>
            <h6 id="artist">
                <?php
                    echo $singerName;
                ?>
            </h6>
            <h6 id="views">
                <?php
                echo $songViews . ' views';
                ?>
            </h6>
        </div>
        <audio src="songs/<?php echo $songAudioLink ?>" id="audio" autoplay="true"></audio>
        
        <div class="img-container"><img src="images//<?php echo $songImageLink ?>" alt="music-cover" id="cover"></div>
        <div id="horizontal-bar"></div>
        <div class="navigation">
            <a id="prev" class="action-btn" href="
                <?php
                    echo 'mySong-music-player.php?total='.$total.'&index='.($songIndex-1);
                ?>"><i class="fas fa-backward"></i>
            </a>
            
            <a id="play" class="action-btn action-btn-big"><i class="fas fa-play"></i></a>
            
            <a id="next" class="action-btn" href="
                <?php
                    echo 'mySong-music-player.php?total='.$total.'&index='.($songIndex+1);
                ?>" onclick = "updateSongViews(<?php echo $songID ?>)"><i class="fas fa-forward"></i>
            </a>
        </div>
        <div class="progress-container" id="progress-container">
            <div class="progress" id="progress"></div>
        </div>
    </div>
</div>
    
<script src="js/music-player.js"></script>
<script src="js/songs.js"></script>
<?php include 'footer.php' ?>
