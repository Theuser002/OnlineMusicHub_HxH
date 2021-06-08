<?php
session_start();
?>
<!DOCTYPE HTML>
<!--Session has already been initialized when login-->
<html>
<head>
<title>Account</title>
<link rel="icon" type="image/png" sizes="32x32" href="images/logo.png">
</head>
<body id="account-body">
<?php require "navbar.php";	?>

<style>
.content {
    margin-top: 10vh;
}
#profile-pic {
    transform: translateY(-20%);
}
#profile-name {
    color: white;
    font-size: 3vh;
    transform: translateY(100%);
}
h3{
    color: white;
}
hr{
    color: white;
}
</style>
<?php
include_once( '../../controllers/songs-display.controller.php' );
include_once( '../../controllers/mv.controller.php' );
    $c1 = new SongsDisplayController();
    $c2 = new Ctrl_MV();
?>
<header id="account-header">
    <div class="responsive-pic">
        <div class="responsive-box" id="profile-pic">
            <!--					<img class="img" src="./images/ocean.jpg">-->
            <img class= "img" src=<?php print("\"".$_SESSION['avatarLink']."\"")?>></div>
    </div>
    <div id="profile-name">
        <h1><?php print($_SESSION['username'])?></h1>
    </div>
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
    </ul>
</header>
<section class="content">
    <div class="container song-board" style="margin-top: 50px;">
        <h3 class="text-center">
            My Songs
            <hr>
        </h3>
        <div class="flex-row-break"></div>
        <?php
            
            $mySong = $c1->getFavSongList( $_SESSION[ 'accountID' ] );
            $total = count($mySong);    
            
            for ( $i = 0; $i < $total; $i++ ) {
                $song = $mySong[ $i ];
                $songID = $song->getSongID();
                $songTitle = $song->getSongTitle();
                $views = $song->getViews();
                $songImageLink = $song->getSongImageLink();
                $singer = $c1->getOwnSinger( $songID );
                $singerName = $singer->getSingerName();
                
                echo'
                    <a class="single-song" href="music-player-2.php?index='.$i.'&total='.$total.'&option=1">
                          <div class="song-img-wrap">
                            <!--     Song image -->
                            <img class="img" src="images/'.$songImageLink.'" />
                          </div>
                      <div class="vr"></div>
                      <div class="title-and-views">
                        <!--     Song title & views-->
                        <div class="title">
                          <!--       Song title -->
                          '.$songTitle.'
                        </div>
                        <hr />
                        <div class="artist">
                        '.$singerName.'
                        </div>
                        <div class="view">
                          <!--       Views -->
                            '.$views.'&nbsp views
                        </div>
                      </div>
                    </a>
                ';
            }
        ?>
    </div>
    <div class="container mv-board" style="margin-top: 50px;">
        <h3 class="text-center"><br>
            My MVs
            <hr>
        </h3>
        <div class="flex-row-break"></div>
        <?php
        $myMV = $c2->getFavMVList( $_SESSION[ 'accountID' ] );
        echo count($myMV);
        for ( $i = 0; $i < count( $myMV ); $i++ ) {
            $MVID = $myMV[ $i ]->getMVID();
            $MVImage = $myMV[ $i ]->getMVImage();
            $MVTitle = $myMV[ $i ]->getMVTitle();
            $MVViews = $myMV[ $i ]->getMVView();
            $singer = $c2->getOwnSinger($MVID);
            $singerName = $singer->getSingerName();
            echo '
                    <a class="single-mv" href="single-mv-page.php?MVID=' . $MVID . '" onclick="updateMVView(' . $MVID . ')">
                        <div class="mv-image-wrap">
                            <img class="mv-img" src="images/' . $MVImage . '">
                        </div>
                        <div class="mv-title-and-views">
                            <div class="mv-title">' . $MVTitle . '</div>
                            <div class="mv-artist">'. $singerName .'</div>
                            <div class="mv-view">' . $MVViews . ' views </div>
                            <div class="play-btn">
                                <i class="far fa-play-circle"></i>
                            </div>
                        </div>
                    </a>
                ';
        }?>
        </div>
    </div>
</section>
<?php require 'footer.php' ?>
