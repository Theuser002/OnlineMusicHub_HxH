<?php

//the link is relative to the page that calls to it (e.g: this link will be called at  single-song.php then it should points from single-song.php to the image, not from song.entity.php to the image);
if (!defined('defaultSongImageLink')) define('defaultSongImageLink', 'compact-disc.png');

class SongEntity{
	private $songID;
	private $songTitle;
	private $views;
	private $audioLink;
	private $songImageLink;
	
	function __construct ($songID, $songTitle, $views, $audioLink, $songImageLink){
		$this->songID = $songID;
		$this->songTitle = $songTitle;
		$this->views = $views;
		$this->audioLink = $audioLink;
		$this->songImageLink = $songImageLink;
	}
	
	function getSongID(){
		return $this->songID;
	}
	
	function getSongTitle(){
		return $this->songTitle;
	}
	
	
	function getViews(){
		return $this->views;
	}
	
	function getAudioLink(){
		return $this->audioLink;
	}
	
	function getSongImageLink(){
		return $this->songImageLink;
	}
	
	
}

?>