<?php
include_once('../../models/mv.model.php');
include_once('../../models/mv.entity.php');

class Ctrl_MV{
	public function invoke(){
		$modelMV = new Model_MV();
		$MVList = $modelMV->getAllMV();
//		include_once('View/mv-page-test.php');
		return $MVList;
	}
	
	public function insert($MVID,$MVTitle,$MVImage,$MVLink){
		$modelMV = new Model_MV();
		$modelMV->insertMV($MVID,$MVTitle,$MVImage,$MVLink);
	}
	
	public function getPaginationResult($pageNum, $resultPerPage){
		$modelMV = new Model_MV();
		$MVList = $modelMV->getPaginationPage($pageNum, $resultPerPage);
		return $MVList;
	}
	
	public function getSingleMV($MVID){
		$modelMV = new Model_MV();
		$mv = $modelMV->getMVbyID($MVID);
		return $mv;
	}
}

//$c = new Ctrl_MV();
//$list = $c->invoke();
//echo $list[0]->getMVID();
?>