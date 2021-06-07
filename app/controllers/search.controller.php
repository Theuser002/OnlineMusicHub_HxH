<?php
include_once('../../../configs/connection.php');
include_once('../../models/mv.model.php');
include_once('../../models/song.model.php');
include_once('../../models/singer.model.php');
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
			echo '<div class="suggestbox"><a href="single-mv-page.php?MVID='.$data->getMVID().'" onclick=\"updateMVView("'.$data->getMVID().'><img src="images/'.$data->getMVImage().'">'.$data->getMVTitle().'</a></div>';
		}
		
		$singerModel = new SingerModel();
		$singerList = $singerModel->searchSinger($key);
		if(count($singerList)!=0){
			echo '<div style="background-color: #C8C8C8"><h5>Artist</h5></div>';
		}
		foreach($singerList as $data){
			echo '<div class="suggestbox"><a href="single-singer-page.php?singerID='.$data->getSingerID().'"><img src="images/'.$data->getSingerImage().'">'.$data->getSingerName().'</a></div>';
		}
	}
}

?>