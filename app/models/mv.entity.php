<?php
class Entity_MV{
	private $MVID;
	private $MVTitle;
	private $MVImage;
	private $MVLink;
	private $MVView;
	
	function __construct($MVID, $MVTitle, $MVImage, $MVLink, $MVView){
		$this->MVID = $MVID;
		$this->MVTitle = $MVTitle;
		$this->MVImage = $MVImage;
		$this->MVLink = $MVLink;
		$this->MVView = $MVView;
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
	
	function getMVView(){
		return $this->MVView;
	}
	
}
?>