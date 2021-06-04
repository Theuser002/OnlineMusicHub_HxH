<!--Fetch from DB and use loop to display the songs in the form of html via single-song.php-->

<?php
require '../../models/song.entity.php';
require '../../models/song.model.php';

class SongsDisplayController {
    
    function getSongByID ($songID){
        $songModel = new SongModel();
        return $songModel->getSongByID($songID);
    }
    
    function getNumberOfSongs (){
        $songModel = new SongModel();
        return count($songModel->getAllSongs());
    }
    
	function displaySingleSong($songID, $prevID, $nextID) {
        $song = $this->getSongByID($songID);
        $songImageLink = $song->getSongImageLink();
        $songTitle = $song->getSongTitle();
        $views = $song->getViews();
        
		echo'
			<a class="single-song" href="music-player.php?songID='.$songID.'&prevID='.$prevID.'&nextID='.$nextID.'">
				  <div class="song-img-wrap">
					<!--     Song image -->
					<!-- <img class="img" src="'.$songImageLink.'" /> -->
						<img class="img" src="./images/ocean.jpg">
				  </div>
			  <div class="vr"></div>
			  <div class="title-and-views">
				<!--     Song title & views-->
				<div class="title">
				  <!--       Song title -->
				  '.$songTitle.'
				</div>
				<hr />
				<div class="view">
				  <!--       Views -->
					'.$views.'&nbsp views
				</div>
			  </div>
			</a>
		';
	}
	
	function displayAllSongs(){
		$songModel = new SongModel();
		$songList = $songModel->getAllSongs();
		$i = 0;
		while($i < count($songList)){
			$this->displaySingleSong($songList[$i]->getSongID());
			$i++;
		}
	}
	
    function getPaginationAZ($page, $entriesPerPage){
        if($entriesPerPage == 0){
			$entriesPerPage = 1;
		}
		
		$songModel = new SongModel();
		$songList = $songModel->getAllSongs();
		$listLength = count($songList);
		$numberOfPages = ceil($listLength/$entriesPerPage);
		
		$songPagList = $songModel->getPaginationAZ($page, $entriesPerPage);
        return $songPagList;
    }
    
    function getPaginationTopViews($page, $entriesPerPage){
        if($entriesPerPage == 0){
			$entriesPerPage = 1;
		}
		
		$songModel = new SongModel();
		$songList = $songModel->getAllSongs();
		$listLength = count($songList);
		$numberOfPages = ceil($listLength/$entriesPerPage);
		
		$songPagList = $songModel->getPaginationTopViews($page, $entriesPerPage);
        
        return $songPagList;
    }
    
    function getPaginationLatest($page, $entriesPerPage){
        if($entriesPerPage == 0){
			$entriesPerPage = 1;
		}
		
		$songModel = new SongModel();
		$songList = $songModel->getAllSongs();
		$listLength = count($songList);
		$numberOfPages = ceil($listLength/$entriesPerPage);
	
		$songPagList = $songModel->getPaginationLatest($page, $entriesPerPage);
        
        return $songPagList;
    }
    
	function displaySongPagAZ($page, $entriesPerPage){
		$songPagList = $this->getPaginationAZ($page, $entriesPerPage);
		$i = 0;
        $total = count($songPagList);
        
		while($i < $total){
            if($i == 0){
                $prevIndex = $total-1;
            }else{
                $prevIndex = $i - 1;
            }
            if($i == $total-1){
                $nextIndex = 0;
            }else{
                $nextIndex = $i + 1;
            }
            
			$this->displaySingleSong($songPagList[$i]->getSongID(), $songPagList[$prevIndex]->getSongID(), $songPagList[$nextIndex]->getSongID());
			$i++;
		}
	}
	
	function displaySongPagTopViews($page, $entriesPerPage){
		$songPagList = $this->getPaginationTopViews($page, $entriesPerPage);
		$i = 0;
        $total = count($songPagList);
        
		while($i < $total){
            if($i == 0){
                $prevIndex = $total-1;
            }else{
                $prevIndex = $i - 1;
            }
            if($i == $total-1){
                $nextIndex = 0;
            }else{
                $nextIndex = $i + 1;
            }
            
			$this->displaySingleSong($songPagList[$i]->getSongID(), $songPagList[$prevIndex]->getSongID(), $songPagList[$nextIndex]->getSongID());
			$i++;
		}
	}
	
	function displaySongPagLatest($page, $entriesPerPage){
		$songPagList = $this->getPaginationLatest($page, $entriesPerPage);
		$i = 0;
        $total = count($songPagList);
        
		while($i < $total){
            if($i == 0){
                $prevIndex = $total-1;
            }else{
                $prevIndex = $i - 1;
            }
            if($i == $total-1){
                $nextIndex = 0;
            }else{
                $nextIndex = $i + 1;
            }
            
			$this->displaySingleSong($songPagList[$i]->getSongID(), $songPagList[$prevIndex]->getSongID(), $songPagList[$nextIndex]->getSongID());
			$i++;
		}
	}
	
	function getNumberOfPages($entriesPerPage){
		if($entriesPerPage == 0){
			$entriesPerPage = 1;
		}
		
		$songModel = new SongModel();
		$totalSongs = count($songModel->getAllSongs());
		$numberOfPages = ceil($totalSongs/$entriesPerPage);
		return $numberOfPages;
	}
}

?>