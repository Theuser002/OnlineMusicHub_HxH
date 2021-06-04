<?php
include_once ('singer.entity.php');
include_once ('mv.entity.php');
include_once ('song.entity.php');
include_once ('../../../configs/connection.php');

class SingerModel{
	function __construct(){}
	
	function getAllSinger(){
		$db = DB::getInstance();
		$stmt = $db->prepare('Select * from Singer');
		$result = $stmt->execute(); //$result = 1 means execute successfully
		$singerList = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ //to fetch result of each row in table
			
			array_push($singerList, new SingerEntity($row['SingerID'],$row['SingerName'],$row['Background'],$row['SingerImage']));
		}
		return $singerList;
	}
	
	function getASinger($singerID){
		$db = DB::getInstance();
		$stmt = $db->prepare('Select * from Singer where SingerID = ?');
		$result = $stmt->execute(array($singerID));
		$singer;
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ //to fetch result of each row in table
			$singer = new SingerEntity($row['SingerID'],$row['SingerName'],$row['Background'],$row['SingerImage']);
		}
		return $singer;
	}
	
	function getSingerMV($singerID){
		$db = DB::getInstance();
		$stmt = $db->prepare('Select MV.* from MV inner join MVPerformedBy on MV.MVID = MVPerformedBy.MVID where MVPerformedBy.SingerID = ?');
		$result = $stmt->execute(array($singerID));
		$MVList = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ //to fetch result of each row in table
			
			array_push($MVList, new Entity_MV($row['MVID'],$row['MVTitle'],$row['MVImage'],$row['MVLink'],$row['MVView']));
		}
		return $MVList;
	}
	
	function getSingerSong($singerID){
		$db = DB::getInstance();
		$stmt = $db->prepare('Select Song.* from Song inner join SongPerformedBy on Song.SongID = SongPerformedBy.SongID where SongPerformedBy.SingerID = ?');
		$result = $stmt->execute(array($singerID));
		$SongList = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ //to fetch result of each row in table
			
			array_push($SongList, new SongEntity($row['SongID'], $row['SongTitle'], $row['Genre'], $row['SongViews'], $row['AudioLink'], $row['SongImageLink']));
		}
		return $SongList;
	}
	
	function getPaginationMV($pageNum, $resultPerPage, $singerID){
		$db = DB::getInstance();
		$stmt = $db->prepare('DECLARE @PageNumber AS INT
								DECLARE @RowsOfPage AS INT
								SET @PageNumber=?
								SET @RowsOfPage=?
								select MV.* from MV inner join MVPerformedBy
								on MV.MVID = MVPerformedBy.MVID
								where MVPerformedBy.SingerID = ?
								order by MV.MVID asc
								OFFSET (@PageNumber-1)*@RowsOfPage ROWS
								FETCH NEXT @RowsOfPage ROWS ONLY');
		$result = $stmt->execute(array($pageNum, $resultPerPage, $singerID)); //$result = 1 means execute successfully
		$MVList = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ //to fetch result of each row in table
			
			array_push($MVList, new Entity_MV($row['MVID'],$row['MVTitle'],$row['MVImage'],$row['MVLink'],$row['MVView']));
		}
		return $MVList;
	}
	
	function getPaginationSong($pageNum, $resultPerPage,$singerID){
		$db = DB::getInstance();
		$stmt = $db->prepare('DECLARE @PageNumber AS INT
								DECLARE @RowsOfPage AS INT
								SET @PageNumber=?
								SET @RowsOfPage=?
								select Song.* from Song inner join SongPerformedBy
								on Song.SongID = SongPerformedBy.SongID
								where SongPerformedBy.SingerID = 1
								order by Song.SongID asc
								OFFSET (@PageNumber-1)*@RowsOfPage ROWS
								FETCH NEXT @RowsOfPage ROWS ONLY');
		$result = $stmt->execute(array($pageNum, $resultPerPage, $singerID)); //$result = 1 means execute successfully
		$songList = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ //to fetch result of each row in table
			
			array_push($songList, new SongEntity($row['SongID'], $row['SongTitle'], $row['Genre'], $row['SongViews'], $row['AudioLink'], $row['SongImageLink']));
		}
		return $songList;
	}
	
	function getOwnSinger($MVID){
		$db = DB::getInstance();
		$stmt = $db->prepare('select Singer.* from Singer inner join MVPerformedBy
								on Singer.SingerID = MVPerformedBy.SingerID
								where MVPerformedBy.MVID = ?');
		$result = $stmt->execute(array($MVID));
		$singer;
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ //to fetch result of each row in table
			$singer = new SingerEntity($row['SingerID'],$row['SingerName'],$row['Background'],$row['SingerImage']);
		}
		return $singer;
	}
}
?>