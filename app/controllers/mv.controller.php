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
	
	public function getPaginationAZ($pageNum, $resultPerPage){
		$modelMV = new Model_MV();
		$MVList = $modelMV->getPaginationAZ($pageNum, $resultPerPage);
		return $MVList;
	}
	
	public function getSingleMV($MVID){
		$modelMV = new Model_MV();
		$mv = $modelMV->getMVbyID($MVID);
		return $mv;
	}
	
	public function getAZList(){
		$modelMV = new Model_MV();
		$list = $modelMV->getMVbyAZ();
		return $list;
	}
}

//$c = new Ctrl_MV();
//$list = $c->invoke();
//echo $list[0]->getMVID();
?>