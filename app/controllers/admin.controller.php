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
	
	function deleteMV($MVID){
		$model = new Model_MV();
		$model->deleteMV($MVID);
	}
	
	function addMV($MVTitle,$MVImage,$MVLink,$SingerName){
		$model = new Model_MV();
		$model->insertMV($MVTitle,$MVImage,$MVLink,$SingerName);
		echo 'add MV success';
	}

}
?>