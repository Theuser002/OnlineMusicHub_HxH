<?php
    session_start();
?>
<?php
    include_once( '../../controllers/songs-display.controller.php' );
    include_once('../../controllers/singer.controller.php');
?>

<?php
    
//    option: where does the user choose to play music (1: from account page; 2: from singer page (artist page)) 

    if(isset($_GET['option'])){
        $option = $_GET['option'];
    }else{
        $option = 1;
    }
    
    
    if(isset($_GET['index'])){
        $songIndex =  $_GET['index'];
    }else{
        $songIndex = 0;
    }

     
    
    $songsDisplayController = new SongsDisplayController();
    
    if($option == 1){
        //option = 1
             //total: total number of songs.
            if(isset($_GET['total'])){
                $totalSongs= $_GET['total'];
            }else{
                $totalSongs= 1;
            }  
        
            if($songIndex < 0){
                $songIndex = $total-1;
            }

            if ($songIndex > $totalSongs-1){
                $songIndex = 0;
            }
        
        $songList = $songsDisplayController->getFavSongList( $_SESSION[ 'accountID' ] );
    }else if($option == 2){
        //option = 2
        $singerID = $_GET['singerID'];
        $page = $_GET['page'];
        $entriesPerPage = $_GET['entriesPerPage'];
        
        $singerController = new SingerController();
        $totalSongs = count($singerController->getSingerSong($singerID));
        $songList = $singerController->getPaginationSong($page, $entriesPerPage, $singerID);
        $songsOfPage = count($songList);
        $totalPages = ceil($totalSongs/$entriesPerPage);
        
        //the case of the last page can have $songsOfPage < $entriesPerPage
        if ( $songIndex > $songsOfPage - 1 ) {
            $songIndex = $songsOfPage-1;
        }

        if ($page < 1){
            $page = $totalPages;
        }else if($page > $totalPages){
            $page = 1;
        }
    }
    
    $song = $songList[$songIndex];
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
        <li><a href="index.php">Home</a></li>'
        <?php  if($option == 1){
                echo'<li><a href="account-page.php">Account</a></li>';
            }else if ($option ==2){
                echo '<li><a href="singer-page.php">Artists</a></li>';
            }
        ?>
    </ul>
</header>
<div class="content">
<!--    <div class="underlay-square left-up dark-blurry"></div>-->
    <div class="underlay-square right-down light-blurry"></div>
    <div class="music-container" id="music-container">
        <a id="back-page" class="" href="<?php if($option==1) {echo 'account-page.php';} else if ($option==2) {echo 'single-singer-page.php?singerID='.$singerID.'&page='.$page;}?>">
            <i class="fas fa-arrow-left"></i>
        </a>
        <?php
            if (isset($_SESSION['accountID'])){
                $accountID = $_SESSION['accountID'];
                $isFav = $songsDisplayController->isFavSong($accountID, $songID);
            }else{
                $isFav = 0;
            }
            if(isset($accountID)){
                if($isFav){
                    echo '<a id="remove-fav" onclick=removeFavSong('.$songID.')>
                        <i class="fas fa-heart"></i>
                    </a>';
                }else{
                    echo '<a id="add-fav" onclick=addFavSong('.$songID.')>
                        <i class="far fa-heart"></i>
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
                    if($option == 1){
                        echo 'music-player-2.php?total='.$totalSongs.'&index='.($songIndex-1).'&option=1';
                    }else if($option == 2){
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
                        }else{
                            $songIndex--;
                        }
                        echo 'music-player-2.php?page='.$page.'&index='.$songIndex.'&singerID='.$singerID.'&entriesPerPage='.$entriesPerPage.'&option='.$option;
                    }
                ?>"><i class="fas fa-backward"></i>
            </a>
            
            <a id="play" class="action-btn action-btn-big"><i class="fas fa-play"></i></a>
            
            <a id="next" class="action-btn" href="
                <?php
                    if($option == 1){
                        echo 'music-player-2.php?total='.$totalSongs.'&index='.($songIndex+1).'&option=1';
                    }else if($option == 2){
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
                        echo 'music-player-2.php?page='.$page.'&index='.$songIndex.'&singerID='.$singerID.'&entriesPerPage='.$entriesPerPage.'&option='.$option;
                    }
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
