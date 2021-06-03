<?php
include_once('../../models/mv.model.php');
include_once('../../models/mv.entity.php');

class Ctrl_MV{
	function invoke(){
		$modelMV = new Model_MV();
		$MVList = $modelMV->getAllMV();
		return $MVList;
	}
	
	function insert($MVID,$MVTitle,$MVImage,$MVLink){
		$modelMV = new Model_MV();
		$modelMV->insertMV($MVID,$MVTitle,$MVImage,$MVLink);
	}
	
	function getPaginationAZ($pageNum, $resultPerPage){
		$modelMV = new Model_MV();
		$MVList = $modelMV->getPaginationAZ($pageNum, $resultPerPage);
		return $MVList;
	}
	
	function getPaginationLatest($pageNum, $resultPerPage){
		$modelMV = new Model_MV();
		$MVList = $modelMV->getPaginationLatest($pageNum, $resultPerPage);
		return $MVList;
	}
	
	function getPaginationView($pageNum, $resultPerPage){
		$modelMV = new Model_MV();
		$MVList = $modelMV->getPaginationView($pageNum, $resultPerPage);
		return $MVList;
	}
	
	public function getSingleMV($MVID){
		$modelMV = new Model_MV();
		$mv = $modelMV->getMVbyID($MVID);
		return $mv;
	}
	
	function updateView($MVID){
		$modelMV = new Model_MV();
		$mv = $modelMV->getMVbyID($MVID);
		$oldView = $mv->getMVView();
		$newView = $oldView+1;
		$modelMV->updateMVView($newView,$MVID);
	}
	
	function getRelateVideo($MVID){
		
	}
	
	function addFavMV($MVID,$accID){
		$modelMV = new Model_MV();
		$modelMV->addFavMV($MVID,$accID);
	}

}

//$c = new Ctrl_MV();
//$list = $c->invoke();
//echo $list[0]->getMVID();
?>