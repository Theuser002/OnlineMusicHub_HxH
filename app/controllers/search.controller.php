<?php
include_once('../../../configs/connection.php');
include_once('../../models/mv.entity.php');
class Ctrl_Search{
	function __construct(){}
	
	function getSearch($key){
		$db = DB::getInstance();
		$stmt = $db->prepare('Select * from MV where MVTitle like ?');
		$prekey = "%".$key."%";
		$result = $stmt->execute(array($prekey)); //$result = 1 means execute successfully
		$MVList = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ //to fetch result of each row in table
			echo '<div class="suggestbox"><img src="images/'.$row['MVImage'].'">'.$row['MVTitle'].'</div>';
//			array_push($MVList, new Entity_MV($row['MVID'],$row['MVTitle'],$row['MVImage'],$row['MVLink'],$row['MVView']));
		}
//		return $MVList;
	}
}

?>