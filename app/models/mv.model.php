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
	
	function getPaginationView($pageNum, $resultPerPage){
		$db = DB::getInstance();
		$stmt = $db->prepare('DECLARE @PageNumber AS INT
								DECLARE @RowsOfPage AS INT
								SET @PageNumber=?
								SET @RowsOfPage=?
								SELECT * FROM MV
								ORDER BY MVView desc
								OFFSET (@PageNumber-1)*@RowsOfPage ROWS
								FETCH NEXT @RowsOfPage ROWS ONLY');
		$result = $stmt->execute(array($pageNum, $resultPerPage)); //$result = 1 means execute successfully
		$MVList = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ //to fetch result of each row in table
			
			array_push($MVList, new Entity_MV($row['MVID'],$row['MVTitle'],$row['MVImage'],$row['MVLink'],$row['MVView']));
		}
		return $MVList; //return an object list
	}
	
	function insertMV($MVTitle, $MVImage, $MVLink,$SingerName){
		$db = DB::getInstance();
		$stmt1 = $db->prepare('select top 1 MVID +1 as MVID from MV order by MVID desc');
		$result = $stmt1->execute();
		$row = $stmt1->fetch(PDO::FETCH_ASSOC);
		$MVID = $row['MVID'];
		$stmt2 = $db->prepare('select * from Singer where SingerName = ?');
		$result = $stmt2->execute(array($SingerName));
		$row = $stmt2->fetch(PDO::FETCH_ASSOC);
		$SingerID = $row['SingerID'];
		$stmt = $db->prepare('insert into MV(MVID,MVTitle,MVImage,MVLink,MVView) values (?,?,?,?,0)
							  insert into MVPerformedBy(MVID,SingerID) values (?,?)');
		$result = $stmt->execute(array($MVID, $MVTitle, $MVImage, $MVLink, $MVID, $SingerID));
	}
	
	function deleteMV($MVID){
		$db = DB::getInstance();
		$stmt = $db->prepare('delete from MyMV where MVID = ?
								delete from MVPerformedBy where MVID = ?
								delete from MV where MVID = ? ');
		$result = $stmt->execute(array($MVID,$MVID,$MVID));
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
	
	function checkFavMVList($MVID,$accID){
		$db = DB::getInstance();
		$stmt = $db->prepare('select * from MyMV where MVID = ? and AccountID = ?');
		$result = $stmt->execute(array($MVID, $accID));
		if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			return 0;
		}else{
			return 1;
		}
	}
	
	function addFavMV($MVID,$accID){
		$db = DB::getInstance();
		$stmt = $db->prepare('insert into MyMV(MVID,AccountID) values (?,?)');
		$result = $stmt->execute(array($MVID, $accID));
	}
	
	function getFavMVList($accID){
		$db = DB::getInstance();
		$stmt = $db->prepare('select MV.* from MV inner join MyMV on MV.MVID = MyMV.MVID where MyMV.AccountID = ?');
		$result = $stmt->execute(array($accID));
		$MVList = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ //to fetch result of each row in table
			
			array_push($MVList, new Entity_MV($row['MVID'],$row['MVTitle'],$row['MVImage'],$row['MVLink'],$row['MVView']));
		}
		return $MVList;
	}
	
	function searchMV($key){
		$db = DB::getInstance();
		$stmt = $db->prepare('select * from MV where MVTitle like ?');
		$prekey = "%".$key."%";
		$result = $stmt->execute(array($prekey));
		$MVList = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ //to fetch result of each row in table
			
			array_push($MVList, new Entity_MV($row['MVID'],$row['MVTitle'],$row['MVImage'],$row['MVLink'],$row['MVView']));
		}
		return $MVList;
	}
	
	function getRelateVideo($MVID){
		$db = DB::getInstance();
		$stmt = $db->prepare('select top 5 * from MV
								where MVID != ?
								ORDER BY NEWID()');
		$result = $stmt->execute(array($MVID));
		$MVList = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ //to fetch result of each row in table
			
			array_push($MVList, new Entity_MV($row['MVID'],$row['MVTitle'],$row['MVImage'],$row['MVLink'],$row['MVView']));
		}
		return $MVList;
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