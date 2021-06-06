<?php
include_once('../../models/singer.model.php');
include_once('../../models/singer.entity.php');

class SingerController{
	function invoke(){
		$model = new SingerModel();
		$singerList = $model->getAllSinger();
		return $singerList;
	}
	
	function getASinger($singerID){
		$model = new SingerModel();
		return $model->getASinger($singerID);
	}
	
	function getSingerMV($singerID){
		$model = new SingerModel();
		$mvList = $model->getSingerMV($singerID);
		return $mvList;
	}
	
	function getSingerSong($singerID){
		$model = new SingerModel();
		$songList = $model->getSingerSong($singerID);
		return $songList;
	}
	
	function getPaginationSinger($pageNum, $resultPerPage){
		$model = new SingerModel();
		$list = $model->getPaginationSinger($pageNum, $resultPerPage);
		return $list;
	}
	
	function getPaginationMV($pageNum, $resultPerPage,$singerID){
		$model = new SingerModel();
		$List = $model->getPaginationMV($pageNum, $resultPerPage,$singerID);
		return $List;
	}
	
	function getPaginationSong($pageNum, $resultPerPage, $singerID){
		$model = new SingerModel();
		$List = $model->getPaginationSong($pageNum, $resultPerPage, $singerID);
		return $List;
	}
}
?>