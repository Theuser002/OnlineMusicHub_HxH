<!--Fetch from DB and use loop to display the songs in the form of html via single-song.php-->

<?php
require '../../models/song.entity.php';
require '../../models/song.model.php';

class SongsDisplayController {
	function displaySingleSong( $songTitle, $views, $songImageLink ) {
		echo'
			<div class="single-song">
			  <div class="song-img-wrap">
				<!--     Song image -->
				<img class="img" src="'.$songImageLink.'" />
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
			</div>
		';
	}
	
	function displayAllSongs(){
		$songModel = new SongModel();
		$songList = $songModel->getAllSongs();
		$i = 0;
		while($i < count($songList)){
			$this->displaySingleSong($songList[$i]->getSongTitle(), $songList[$i]->getViews(), $songList[$i]->getSongImageLink());
			$i++;
		}
	}
	
	function displaySongPagAZ($entriesPerPage){
		$songModel = new SongModel();
		$songList = $songModel->getAllSongs();
		$listLength = count($songList);
		$numberOfPage = ceil($listLength/$entriesPerPage);
		
		$songPagList = $songModel->getPaginationAZ($pageNum, $entriesPerPage);
		
		$i = 0;
		while($i < count($songPagList)){
			$this->displaySingleSong($songPagList[$i]->getSongTitle(), $songPagList[$i]->getViews(), $songPagList[$i]->getSongImageLink());
			$i++;
		}
	}
	
	function displaySongPagTopViews($entriesPerPage){
		$songModel = new SongModel();
		$songList = $songModel->getAllSongs();
		$listLength = count($songList);
		$numberOfPage = ceil($listLength/$entriesPerPage);
		
		if(!isset($GET_['page'])){
			$pageNum = 1;
		}else{
			$pageNum = $_GET['page'];
		}
		
		$songPagList = $songModel->getPaginationTopViews($pageNum, $entriesPerPage);
		
		$i = 0;
		while($i < count($songPagList)){
			$this->displaySingleSong($songPagList[$i]->getSongTitle(), $songPagList[$i]->getViews(), $songPagList[$i]->getSongImageLink());
			$i++;
		}
	}
	
	function displaySongPagLatest($entriesPerPage){
		$songModel = new SongModel();
		$songList = $songModel->getAllSongs();
		$listLength = count($songList);
		$numberOfPage = ceil($listLength/$entriesPerPage);
		
		if(!isset($GET_['page'])){
			$pageNum = 1;
		}else{
			$pageNum = $_GET['page'];
		}
		
		$songPagList = $songModel->getPaginationLatest($pageNum, $entriesPerPage);
		
		$i = 0;
		while($i < count($songPagList)){
			$this->displaySingleSong($songPagList[$i]->getSongTitle(), $songPagList[$i]->getViews(), $songPagList[$i]->getSongImageLink());
			$i++;
		}
	}
}

?>