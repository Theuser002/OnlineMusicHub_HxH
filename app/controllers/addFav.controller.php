<?php
include_once('../../models/mv.model.php');
include_once('../../models/mv.entity.php');

class Ctrl_MV{
	function getFavMVList($accID){
		$modelMV = new Model_MV();
		$list = $modelMV->getFavMVList($accID);
		return $list;
	}

}

?>