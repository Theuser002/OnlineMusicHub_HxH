<?php
include_once('../../models/mv.model.php');
include_once('../../models/singer.model.php');
include_once('../../models/mv.entity.php');
include_once('../../models/singer.entity.php');

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
		$model = new Model_MV();
		$mvlist = $model->getRelateVideo($MVID);
		return $mvlist;
	}
    
    function isFavMV($MVID, $accID){
        $model = new Model_MV();
        return $model->isInFav($MVID, $accID);
    }
	
	function addFavMV($MVID,$accID){
		$modelMV = new Model_MV();
		if($modelMV->checkFavMVList($MVID, $accID)==1){
            $modelMV->addFavMV($MVID,$accID);
            echo 'success';
		}else{
			echo 'fail';
		}
	}
	
    function removeFavMV($MVID, $accID){
        $modelMV = new Model_MV();
		if($modelMV->checkFavMVList($MVID, $accID)==1){
            $modelMV->removeFavMV($MVID,$accID);
            echo 'success';
		}else{
			echo 'fail';
		}
    }
    
	function getOwnSinger($MVID){
		$model = new SingerModel();
		$singer = $model->getOwnSingerMV($MVID);
		return $singer;
	}
    
    function getFavMVList($accID){
		$modelMV = new Model_MV();
		$list = $modelMV->getFavMVList($accID);
		return $list;
	}

}

//$c = new Ctrl_MV();
//$list = $c->invoke();
//echo $list[0]->getMVID();
?>