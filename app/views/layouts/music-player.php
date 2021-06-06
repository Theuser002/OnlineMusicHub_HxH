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
    $songIndex = 0;
}else{
    $songIndex = $_GET[ 'index' ];
}


$songsDisplayController = new SongsDisplayController();
$totalSongs = $songsDisplayController->getNumberOfSongs();
$totalPages = ceil($totalSongs/$entriesPerPage);

if ( $tab == 1 ) {
    $songPagList = $songsDisplayController->getPaginationAZ( $page, $entriesPerPage );
} else if ( $tab == 2 ) {
    $songPagList = $songsDisplayController->getPaginationLatest( $page, $entriesPerPage );
} else {
    $songPagList = $songsDisplayController->getPaginationTopViews( $page, $entriesPerPage );
}

$songsOfPage = count( $songPagList );


if ( $songIndex < 0 ) {
    $songIndex = $totalSongs - 1;
}

if ( $songIndex > $songsOfPage - 1 ) {
    $songIndex = $songsOfPage -1;
}

if ($page < 1){
    $page = $totalPages;
}

if($page > $totalPages){
    $page = 1;
}

$song = $songPagList[ $songIndex ];
$songID = $song->getSongID();
$songTitle = $song->getSongTitle();
$songAudioLink = $song->getAudioLink();
$songImageLink = $song->getSongImageLink();
$songViews = $song->getViews();

if (isset($_SESSION['accountID'])){
    $accountID = $_SESSION['accountID'];
    $isFav = $songsDisplayController->isFavSong($accountID, $songID);
}else{
    $isFav = 0;
}

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
            <h6 id="views">
                <?php
                echo $songViews . ' views';
                ?>
            </h6>
        </div>
        <audio src="<?php echo $songAudioLink ?>" id="audio" autoplay="true"></audio>
        
        <div class="img-container"><img src="songs/<?php echo $songImageLink ?>" alt="music-cover" id="cover"></div>
        <div id="horizontal-bar"></div>
        <div class="navigation">
            <a id="prev" class="action-btn" href="
                <?php
                    $songIndexTmp = $songIndex;
                    $pageTmp = $page;
                    //first song of a page
                    if($songIndex == 0){
                        $page--;
                        //If the page is the first page -> go to last song of last page
                        if($page < 1){
                            $page = $totalPages;
                        }
                        $songIndex = $entriesPerPage-1;
                        //because if the last page may has less song than other pages. If $songIndex = $songsOfPage - 1 then from song[0] of the last page we will not go to song[songsOfPage-1] of the page before it, but will go to song[<songsOfPage of last page -1>] of it, apparently not the last song of that page. And for the pages that are not last page, songsOfPage = EntriesPerPage - 1;
                    }else{
                        $songIndex--;
                    }
                    echo 'music-player.php?tab='.$tab.'&page='.$page.'&entriesPerPage='.$entriesPerPage.'&index='.$songIndex;
                ?>"><i class="fas fa-backward"></i>
            </a>
            
            <a id="play" class="action-btn action-btn-big"><i class="fas fa-play"></i></a>
            
            <a id="next" class="action-btn" href="
                <?php
                    $songIndex = $songIndexTmp;
                    $page = $pageTmp;
                    //last song of a page 
                    if($songIndex == ($songsOfPage - 1)){
                        $page++;
                        //If the page is the last page -> go to first song of first page
                        if($page > $totalPages){
                            $page = 1;
                        }
                        $songIndex = 0;
                    }else{
                        $songIndex++;
                    }
                    echo 'music-player.php?tab='.$tab.'&page='.$page.'&entriesPerPage='.$entriesPerPage.'&index='.$songIndex;
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
