<!--Fetch from DB and use loop to display the songs in the form of html via single-song.php-->

<?php
include_once '../../models/song.entity.php';
include_once '../../models/song.model.php';

class SongsDisplayController {
    function __construct(){}
	
    function getSongByID ($songID){
        $songModel = new SongModel();
        return $songModel->getSongByID($songID);
    }
    
	function getAllSongs(){
		$model = new SongModel();
		$list = $model->getAllSongs();
		return $list;
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
    
    function updateViews($songID){
        $songModel = new SongModel();
        $song = $songModel->getSongByID($songID);
        $currentViews = $song->getViews();
        $updatedViews = $currentViews+1;
        $songModel->updateSongViews($songID, $updatedViews);
    }
    
    function isFavSong($accountID, $songID){
        $songModel = new SongModel();
        return $songModel->isInFav($accountID, $songID);
    }
    
    function addFavSong($accountID, $songID){
        $songModel = new SongModel();
        $songModel->addFavSong($accountID, $songID);
    }
    
    function removeFavSong($accountID, $songID){
        $songModel = new SongModel();
        $songModel->removeFavSong($accountID, $songID);
    }
	
	function getOwnSinger($SongID){
		$model = new SingerModel();
		$singer = $model->getOwnSingerSong($SongID);
		return $singer;
	}
}

?>