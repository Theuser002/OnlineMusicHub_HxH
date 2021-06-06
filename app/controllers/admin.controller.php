<?php
include_once('../../models/mv.model.php');
include_once('../../models/singer.model.php');
include_once('../../models/mv.entity.php');
include_once('../../models/singer.entity.php');

class AdminController{
	function __construct(){}
	
	function invokeSong(){
		$model = new SongsDisplayController();
		$list = $model->getAllSongs();
		return $list;
	}
	
	function invokeMV(){
		$model = new Model_MV();
		$list = $model->getAllMV();
		return $list;
	}
	
	function invokeSinger(){
		$model = new SingerModel();
		$list = $model->getAllSinger();
		return $list;
	}
	
	function deleteMV($MVID){
		$model = new Model_MV();
		$model->deleteMV($MVID);
	}
	
	function deleteSinger($SingerID){
		$model = new SingerModel();
		$model->deleteSinger($SingerID);
	}
	
	function addMV($MVTitle,$MVImage,$MVLink,$SingerName){
		$model = new Model_MV();
		$model->insertMV($MVTitle,$MVImage,$MVLink,$SingerName);
	}
	
	function addSinger($SingerName,$Background,$SingerImage){
		$model = new SingerModel();
		$model->insertSinger($SingerName,$Background,$SingerImage);
	}
	
	function updateSinger($SingerName,$Background,$SingerImage,$SingerID){
		$model = new SingerModel();
		$model->updateSinger($SingerName,$Background,$SingerImage,$SingerID);
	}
	
	function updateMV($MVTitle,$MVImage,$MVLink,$MVID){
		$model = new Model_MV();
		$model->updateMV($MVTitle,$MVImage,$MVLink,$MVID);
	}

}
?>