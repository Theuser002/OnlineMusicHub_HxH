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
			
			array_push($SongList, new SongEntity($row['SongID'], $row['SongTitle'], $row['SongViews'], $row['AudioLink'], $row['SongImageLink']));
		}
		return $SongList;
	}
	
	function getPaginationSinger($pageNum, $resultPerPage){
		$db = DB::getInstance();
		$stmt = $db->prepare('DECLARE @PageNumber AS INT
								DECLARE @RowsOfPage AS INT
								SET @PageNumber=?
								SET @RowsOfPage=?
								select * from Singer
								order by SingerID asc
								OFFSET (@PageNumber-1)*@RowsOfPage ROWS
								FETCH NEXT @RowsOfPage ROWS ONLY');
		$result = $stmt->execute(array($pageNum, $resultPerPage)); //$result = 1 means execute successfully
		$singerList = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ //to fetch result of each row in table
			
			array_push($singerList, new SingerEntity($row['SingerID'],$row['SingerName'],$row['Background'],$row['SingerImage']));
		}
		return $singerList;
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
								where SongPerformedBy.SingerID = ?
								order by Song.SongID asc
								OFFSET (@PageNumber-1)*@RowsOfPage ROWS
								FETCH NEXT @RowsOfPage ROWS ONLY');
		$result = $stmt->execute(array($pageNum, $resultPerPage, $singerID)); //$result = 1 means execute successfully
		$songList = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ //to fetch result of each row in table
			
			array_push($songList, new SongEntity($row['SongID'], $row['SongTitle'], $row['SongViews'], $row['AudioLink'], $row['SongImageLink']));
		}
		return $songList;
	}
	
	function getOwnSingerMV($MVID){
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
	
	function getOwnSingerSong($SongID){
		$db = DB::getInstance();
		$stmt = $db->prepare('select Singer.* from Singer inner join SongPerformedBy
								on Singer.SingerID = SongPerformedBy.SingerID
								where SongPerformedBy.SongID = ?');
		$result = $stmt->execute(array($SongID));
		$singer;
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ //to fetch result of each row in table
			$singer = new SingerEntity($row['SingerID'],$row['SingerName'],$row['Background'],$row['SingerImage']);
		}
		return $singer;
	}
	
	function insertSinger($SingerName,$Background,$SingerImage){
		$db = DB::getInstance();
		$stmt = $db->prepare('insert into Singer(SingerName,Background,SingerImage) values (?,?,?)');
		$result = $stmt->execute(array($SingerName,$Background,$SingerImage));
	}
	
	function deleteSinger($SingerID){
		$db = DB::getInstance();
		$stmt = $db->prepare('declare @MVID as INT
								declare @SongID as INT
								set @MVID = (select MVID from MVPerformedBy where SingerID = ? )
								set @SongID = (select SongID from SongPerformedBy where SingerID = ? )
								delete from MV where MVID = @MVID
								delete from Song where SongID = @SongID
								delete from Singer where SingerID = ?');
		$result = $stmt->execute(array($SingerID,$SingerID,$SingerID));
	}
	
	function updateSinger($SingerName,$Background,$SingerImage,$SingerID){
		$db = DB::getInstance();
		$stmt = $db->prepare('update Singer
								set SingerName = ? , Background = ? , SingerImage = ?
								where SingerID = ?');
		$result = $stmt->execute(array($SingerName,$Background,$SingerImage,$SingerID));
	}
	
	function searchSinger($key){
		$db = DB::getInstance();
		$stmt = $db->prepare('select * from Singer where SingerName like ?');
		$prekey = "%".$key."%"; //any string that contain $key.
		$result = $stmt->execute(array($prekey));
		$singerList = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ //to fetch result of each row in table
			
			array_push($singerList, new SingerEntity($row['SingerID'],$row['SingerName'],$row['Background'],$row['SingerImage']));
		}
		return $singerList;
	}
}
?>