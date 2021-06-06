<?php
include_once('../../models/mv.model.php');
include_once('../../models/singer.model.php');
include_once('../../models/mv.entity.php');
include_once('../../models/singer.entity.php');

class AdminController{
	function __construct(){}
	
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

}
?>