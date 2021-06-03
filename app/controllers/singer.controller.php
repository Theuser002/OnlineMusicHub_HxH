<?php
include_once('../../models/singer.model.php');
include_once('../../models/singer.entity.php');

class SingerController{
	function invoke(){
		$model = new SingerModel();
		$singerList = $model->getAllSinger();
		return $singerList;
	}
}
?>