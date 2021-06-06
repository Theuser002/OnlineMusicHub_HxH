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
}
?>