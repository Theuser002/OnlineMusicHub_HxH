<?php
class Entity_MV{
	private $MVID;
	private $MVTitle;
	private $MVImage;
	private $MVLink;
	
	function __construct($MVID, $MVTitle, $MVImage, $MVLink){
		$this->MVID = $MVID;
		$this->MVTitle = $MVTitle;
		$this->MVImage = $MVImage;
		$this->MVLink = $MVLink;
	}
	
	function getMVID(){
		return $this->MVID;
	}
	
	function getMVTitle(){
		return $this->MVTitle;
	}
	
	function getMVImage(){
		return $this->MVImage;
	}
	
	function getMVLink(){
		return $this->MVLink;
	}
	
}
?>