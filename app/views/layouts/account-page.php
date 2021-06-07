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
</style>
<?php
include_once( '../../controllers/addFav.controller.php' );
include_once( '../../controllers/songs-display.controller.php' );
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
    <div class="container song-board bright-blurry" style="margin-top: 50px;">
        <h3 class="text-center">
            <br>
            My Songs
            <hr>
            <br>
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
                    <a class="single-song" href="mySong-music-player.php?index='.$i.'&total='.$total.'">
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
    <div class="container" style="margin-top: 50px;">
        <h3 class="text-center"><br>
            My MVs
            <hr>
            <br>
        </h3>
        <?php
        $myMV = $c2->getFavMVList( $_SESSION[ 'accountID' ] );
        ?>
        <div class="d-flex flex-row flex-wrap justify-content-center">
            <?php
            for ( $i = 0; $i < count( $myMV ); $i++ ) {
                ?>
            <div class="d-flex flex-column"><a href="single-mv-page.php?MVID=<?php echo $myMV[$i]->getMVID() ?>" onClick="updateMVView(<?php echo $myMV[$i]->getMVID() ?>)"><img src="images/<?php echo $myMV[$i]->getMVImage() ?>" class="img-fluid"></a>
                <h5><?php echo $myMV[$i]->getMVTitle() ?></h5>
            </div>
            <?php	}?>
        </div>
    </div>
</section>
<?php require 'footer.php' ?>
