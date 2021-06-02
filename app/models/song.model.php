<?php

include_once '../../../configs/connection.php';
include_once 'song.entity.php';

class SongModel{
	function __construct(){
		
	}
	
	function getAllSongs(){
		$db = DB::getInstance();
		$stm = $db->prepare('select * from song');
		$stm->execute();
		
		$songList = array();
		
		while ($row = $stm->fetch(PDO::FETCH_ASSOC)){
			$song = new SongEntity($row['SongID'], $row['SongTitle'], $row['Genre'], $row['SongViews'], $row['AudioLink'], $row['SongImageLink']);
			
			array_push($songList, $song);
		}
		
		return $songList;
	}
	
	function addSong($songTitle, $genre, $audioLink){
		try{
			$db = DB::getInstance();
			$stm1 = $db->prepare('select top 1 SongID + 1 as NewSongID from Song order by SongID desc');
			$stm1->execute();
			$row = $stm1->fetch(PDO::FETCH_ASSOC);
			$newSongID = $row['NewSongID'];
			if(!$newSongID){
				$newSongID = 1;
			}
			$songImageLink = defaultSongImageLink;
			$stm2 = $db->prepare(
				'insert into Song(SongID, SongTitle, Genre, SongViews, AudioLink, SongImageLink) values (?, ?, ?, ?, ?, ?);'
			);	
			$stm2->execute([$newSongID, $songTitle, $genre, 0, $audioLink, $songImageLink]);
		}catch (Exception $e){
			echo 'Error adding song to db. Caught exception: ', $e->getMessage(), "\n";
		}
	}
	
	function getSongByID($songID){
		try{
			$db = DB::getInstance();
			$stm = $db->prepare('Select * from Song where SongID = ?');
			$stm->execute([$songID]);
			$row=$stm->fetch(PDO::FETCH_ASSOC);
			return new SongEntity($row['SongID'],$row['SongTitle'],$row['Genre'],$row['SongViews'],$row['AudioLink'],$row['SongImageLink']);
		}catch (Exception $e){
			echo 'Error getting song ID from db. Caught exception: ', $e->getMessage(), "\n";
		}
		
	}
	
	function deleteSong($songID){
		try{
			$db = DB::getInstance();
			$stm = $stm->prepare(
				''
			);
			
			$stm->execute([$songID]);
		}catch (Exception $e){
			echo 'Error deleting song from db. Caught exception: ', $e->getMessage(), "\n";
		}
	}
	
	function updateSong($songID, $songTitle, $genre, $songImageLink){
		try{
			$db = DB::getInstance();
			$stm = $stm->prepare(
				''
			);
			
			$stm->execute([$songID]);
		}catch (Exception $e){
			echo 'Error editing song from db. Caught exception: ', $e->getMessage(), "\n";
		}
	}
	
	function updateSongView($songID, $songViews){
		$db = DB::getInstance();
		$stm = $db->prepare('update Song set SongViews = ? where SongID = ?');
		$stm->execute([$songViews, $songID]);
	}
	
	function getPaginationAZ($pageNum, $entriesPerPage){
		$db = DB::getInstance();
		$stm = $db->prepare('
							declare @PageNumber as int
							declare @RowsPerPage as int
							set @PageNumber = ?
							set @RowsPerPage = ?
							select * from Song
							order by SongTitle
							offset (@PageNumber - 1)*@RowsPerPage rows
							fetch next @RowsPerPage rows only');
		$stm->execute([$pageNum, $entriesPerPage]);
		
		$songList = array();
		while ($row = $stm->fetch(PDO::FETCH_ASSOC)){
			$song = new SongEntity($row['SongID'], $row['SongTitle'], $row['Genre'], $row['SongViews'], $row['AudioLink'], $row['SongImageLink']);
			
			array_push($songList, $song);
		}
		
		return $songList;
	}
	
	function getPaginationTopViews($pageNum, $entriesPerPage){
		$db = DB::getInstance();
		$stm = $db->prepare('
							declare @PageNumber as int
							declare @RowsPerPage as int
							set @PageNumber = ?
							set @RowsPerPage = ?
							select * from Song
							order by SongViews desc
							offset (@PageNumber - 1)*@RowsPerPage rows
							fetch next @RowsPerPage rows only');
		$stm->execute([$pageNum, $entriesPerPage]);
		
		$songList = array();
		while ($row = $stm->fetch(PDO::FETCH_ASSOC)){
			$song = new SongEntity($row['SongID'], $row['SongTitle'], $row['Genre'], $row['SongViews'], $row['AudioLink'], $row['SongImageLink']);
			
			array_push($songList, $song);
		}
		
		return $songList;
	}function getPaginationLatest($pageNum, $entriesPerPage){
		$db = DB::getInstance();
		$stm = $db->prepare('
							declare @PageNumber as int
							declare @RowsPerPage as int
							set @PageNumber = ?
							set @RowsPerPage = ?
							select * from Song
							order by SongID desc
							offset (@PageNumber - 1)*@RowsPerPage rows
							fetch next @RowsPerPage rows only');
		$stm->execute([$pageNum, $entriesPerPage]);
		
		$songList = array();
		while ($row = $stm->fetch(PDO::FETCH_ASSOC)){
			$song = new SongEntity($row['SongID'], $row['SongTitle'], $row['Genre'], $row['SongViews'], $row['AudioLink'], $row['SongImageLink']);
			
			array_push($songList, $song);
		}
		
		return $songList;
	}
	
	
}

//$songModel = new SongModel();
//$songModel->addSong('Star Sky - Two Steps From Hell', 'Instrumental', '../songs/StarSky.m4a');
//$songModel->addSong('Arcade - Duncan Laurence', 'Pop', '../songs/Arcade\ -\ Duncan\ Laurence.m4a');
//$songModel->addSong('Believer - Imagine Dragons', 'Rock', '../songs/Believer\ -\ Imagine\ Dragons');
//$songModel->updateSongView(1, 1);
//var_dump($songModel->getAllSongs());
//var_dump($songModel->getSongByID(2));
?>