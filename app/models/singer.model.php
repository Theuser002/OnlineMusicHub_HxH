<?php
include_once ('singer.entity.php');
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
}
?>