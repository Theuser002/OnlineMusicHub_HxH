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
	
	function displaySongPagAZ($page, $entriesPerPage){
		if($entriesPerPage == 0){
			$entriesPerPage = 1;
		}
		
		$songModel = new SongModel();
		$songList = $songModel->getAllSongs();
		$listLength = count($songList);
		$numberOfPages = ceil($listLength/$entriesPerPage);
		
		$songPagList = $songModel->getPaginationAZ($page, $entriesPerPage);
		
		$i = 0;
		while($i < count($songPagList)){
			$this->displaySingleSong($songPagList[$i]->getSongTitle(), $songPagList[$i]->getViews(), $songPagList[$i]->getSongImageLink());
			$i++;
		}
	}
	
	function displaySongPagTopViews($page, $entriesPerPage){
		if($entriesPerPage == 0){
			$entriesPerPage = 1;
		}
		
		$songModel = new SongModel();
		$songList = $songModel->getAllSongs();
		$listLength = count($songList);
		$numberOfPages = ceil($listLength/$entriesPerPage);
		
		$songPagList = $songModel->getPaginationTopViews($page, $entriesPerPage);
		
		$i = 0;
		while($i < count($songPagList)){
			$this->displaySingleSong($songPagList[$i]->getSongTitle(), $songPagList[$i]->getViews(), $songPagList[$i]->getSongImageLink());
			$i++;
		}
	}
	
	function displaySongPagLatest($page, $entriesPerPage){
		if($entriesPerPage == 0){
			$entriesPerPage = 1;
		}
		
		$songModel = new SongModel();
		$songList = $songModel->getAllSongs();
		$listLength = count($songList);
		$numberOfPages = ceil($listLength/$entriesPerPage);
	
		$songPagList = $songModel->getPaginationLatest($page, $entriesPerPage);
		
		$i = 0;
		while($i < count($songPagList)){
			$this->displaySingleSong($songPagList[$i]->getSongTitle(), $songPagList[$i]->getViews(), $songPagList[$i]->getSongImageLink());
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