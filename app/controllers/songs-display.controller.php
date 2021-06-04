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