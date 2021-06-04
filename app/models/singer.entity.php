<?php
class SingerEntity{
	private $singerID;
	private $singerName;
	private $background;
	private $singerImage;
	
	function __construct($singerID, $singerName,$background,$singerImage){
		$this->singerID = $singerID;
		$this->singerName = $singerName;
		$this->background = $background;
		$this->singerImage = $singerImage;
	}
	
	function getSingerID(){
		return $this->singerID;
	}
	
	function getSingerName(){
		return $this->singerName;
	}
	
	function getBackground(){
		return $this->background;
	}
	
	function getSingerImage(){
		return $this->singerImage;
	}
}
?>