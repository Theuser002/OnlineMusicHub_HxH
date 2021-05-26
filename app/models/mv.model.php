<?php
include_once ('mv.entity.php');
include_once ('../../../configs/connection.php');

class Model_MV{
	function __construct(){}
	
	function getAllMV(){
		$db = DB::getInstance();
		$stmt = $db->prepare('Select * from MV');
		$result = $stmt->execute(); //$result = 1 means execute successfully
		$MVList = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ //to fetch result of each row in table
			
			array_push($MVList, new Entity_MV($row['MVID'],$row['MVTitle'],$row['MVImage'],$row['MVLink'],$row['MVView']));
		}
		return $MVList; //return an object list
	}
	
	function getPaginationAZ($pageNum, $resultPerPage){
		$db = DB::getInstance();
		$stmt = $db->prepare('DECLARE @PageNumber AS INT
								DECLARE @RowsOfPage AS INT
								SET @PageNumber=?
								SET @RowsOfPage=?
								SELECT * FROM MV
								ORDER BY MVTitle
								OFFSET (@PageNumber-1)*@RowsOfPage ROWS
								FETCH NEXT @RowsOfPage ROWS ONLY');
		$result = $stmt->execute(array($pageNum, $resultPerPage)); //$result = 1 means execute successfully
		$MVList = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ //to fetch result of each row in table
			
			array_push($MVList, new Entity_MV($row['MVID'],$row['MVTitle'],$row['MVImage'],$row['MVLink'],$row['MVView']));
		}
		return $MVList; //return an object list
	}
	
	function getPaginationLatest($pageNum, $resultPerPage){
		$db = DB::getInstance();
		$stmt = $db->prepare('DECLARE @PageNumber AS INT
								DECLARE @RowsOfPage AS INT
								SET @PageNumber=?
								SET @RowsOfPage=?
								SELECT * FROM MV
								ORDER BY MVID desc
								OFFSET (@PageNumber-1)*@RowsOfPage ROWS
								FETCH NEXT @RowsOfPage ROWS ONLY');
		$result = $stmt->execute(array($pageNum, $resultPerPage)); //$result = 1 means execute successfully
		$MVList = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ //to fetch result of each row in table
			
			array_push($MVList, new Entity_MV($row['MVID'],$row['MVTitle'],$row['MVImage'],$row['MVLink'],$row['MVView']));
		}
		return $MVList; //return an object list
	}
	
	function insertMV($MVTitle, $MVImage, $MVLink){
		$db = DB::getInstance();
		$stmt1 = $db->prepare('select top 1 MVID +1 as MVID from MV order by MVID desc');
		$result = $stmt1->execute();
		$row = $stmt1->fetch(PDO::FETCH_ASSOC);
		$MVID = $row['MVID'];
		$stmt = $db->prepare('insert into MV(MVID,MVTitle,MVImage,MVLink,MVView) values (?,?,?,?,0)');
		$result = $stmt->execute(array($MVID, $MVTitle, $MVImage, $MVLink));
	}
	
	function deleteMV($MVID){
		$db = DB::getInstance();
		$stmt = $db->prepare('delete from MV where MVID = ?');
		$result = $stmt->execute(array($MVID)); //must execute an array of key input, even if only 1 key exists 
												//execute($MVID) => error
	}
	
	function updateMV($MVID, $MVTitle, $MVImage, $MVLink){
		$db = DB::getInstance();
		$stmt = $db->prepare('update MV
							  set MVTitle = ? , MVImage = ? , MVLink = ?
							  where MVID = ?');
		$result = $stmt->execute(array($MVTitle, $MVImage, $MVLink, $MVID));
	}
	
	function getMVbyID($MVID){
		$db = DB::getInstance();
		$stmt = $db->prepare('select * from MV where MVID = ?');
		$result = $stmt->execute(array($MVID));
		$mv;
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ //to fetch result of each row in table
			$mv = new Entity_MV($row['MVID'],$row['MVTitle'],$row['MVImage'],$row['MVLink'],$row['MVView']);
		}
		return $mv;
	}
	
	function updateMVView($MVView,$MVID){
		$db = DB::getInstance();
		$stmt = $db->prepare('update MV set [MVView] = ? where MVID = ?');
		$result = $stmt->execute(array($MVView,$MVID));
	}

}

//$m = new Model_MV();
//$list = $m->getMVbyAZ();
//$list = $m->getAllMV();
//echo $list[0]->getMVTitle();
//$m->insertMV(1,'First MV','jimi.jpeg','https://www.youtube.com/watch?v=dhcapOWDATY');
//$m->deleteMV(1);
//$m->updateMV(1,'Title after update','afterupdate.png','afterupdate.mp4');

//$MV = $m->getMVbyID(1);
//echo $MV->ge/tMVID()."<br>".$MV->getMVTitle()."<br>".$MV->getMVImage()."<br>".$MV->getMVLink();
?>