<?php
include_once('../../../configs/connection.php');
include_once('../../models/mv.model.php');
include_once('../../models/song.model.php');
class Ctrl_Search{
	function __construct(){}
	
	function getSearch($key){
		$songModel = new SongModel();
		$songList = $songModel->searchSong($key);
		if(count($songList)!=0){
			echo '<div style="background-color: #C8C8C8"><h5>Song</h5></div>';
		}
		foreach($songList as $data){
			echo '<div class="suggestbox"><a href="single-song-page.php?SongID='.$data->getSongID().'"><img src="images/'.$data->getSongImageLink().'">'.$data->getSongTitle().'</a></div>';
		}
		
		$mvModel = new Model_MV();
		$mvList = $mvModel->searchMV($key);
		if(count($mvList)!=0){
			echo '<div style="background-color: #C8C8C8"><h5>MV</h5></div>';
		}
		foreach($mvList as $data){
			echo '<div class="suggestbox"><a href="single-mv-page.php?MVID='.$data->getMVID().'"><img src="images/'.$data->getMVImage().'">'.$data->getMVTitle().'</a></div>';
		}
	}
}

?>