<?php

include_once '../../../configs/connection.php';
include_once 'song.entity.php';

class SongModel{
	function __construct(){
		
	}
	
	function getAllSongs(){
		try{
            $db = DB::getInstance();
            $stm = $db->prepare('select * from song');
            $stm->execute();

            $songList = array();

            while ($row = $stm->fetch(PDO::FETCH_ASSOC)){
                $song = new SongEntity($row['SongID'], $row['SongTitle'], $row['Genre'], $row['SongViews'], $row['AudioLink'], $row['SongImageLink']);

                array_push($songList, $song);
            }
            return $songList;
        }catch (Exception $e){
            echo 'Error getting all songs from db. Caught exception: ', $e->getMessage(), "\n";
        }
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
			echo 'Error getting song by ID from db. Caught exception: ', $e->getMessage(), "\n";
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
	
	function updateSong($SongTitle,$SongImage,$SongLink,$SongID){
		try{
			$db = DB::getInstance();
			$stm = $db->prepare(
				'update Song
				set SongTitle = ? , SongImageLink = ? , AudioLink = ?
				where SongID = ?'
			);
			
			$stm->execute(array($SongTitle,$SongImage,$SongLink,$SongID));
		}catch (Exception $e){
			echo 'Error editing song from db. Caught exception: ', $e->getMessage(), "\n";
		}
	}
	
	function updateSongViews($songID, $songViews){
		try{
            $db = DB::getInstance();
            $stm = $db->prepare('update Song set SongViews = ? where SongID = ?');
            $stm->execute([$songViews, $songID]);
        }catch (Exception $e){
            echo 'Error updating song views to db. Caught exception: ', $e->getMessage(), "\n";
        }
	}
	
	function getPaginationAZ($pageNum, $entriesPerPage){
        try{
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
        }catch (Exception $e){
             echo 'Error getting pagination from db. Caught exception: ', $e->getMessage(), "\n";
        }
	}
	
	function getPaginationTopViews($pageNum, $entriesPerPage){
        try{
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
        }catch (Exception $e){
            echo 'Error getting pagination from db. Caught exception: ', $e->getMessage(), "\n";
        }
	}function getPaginationLatest($pageNum, $entriesPerPage){
		try{
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
        }catch (Exception $e){
            echo 'Error getting pagination from db. Caught exception: ', $e->getMessage(), "\n";
        }
	}
	
	function searchSong($key){
		$db = DB::getInstance();
		$stmt = $db->prepare('select * from Song where SongTitle like ?');
		$prekey = "%".$key."%"; //any string that contain $key.
		$result = $stmt->execute(array($prekey));
		$songList = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$song = new SongEntity($row['SongID'], $row['SongTitle'], $row['Genre'], $row['SongViews'], $row['AudioLink'], $row['SongImageLink']);
			
			array_push($songList, $song);
		}
		
		return $songList;
	}
    
    function isInFav($accountID, $songID){
        try{
            $db = DB::getInstance();
            $stm = $db->prepare('select * from MySong where AccountID = ? and SongID = ?');
            $stm->execute([$accountID, $songID]);
            
            return iterator_count($stm) >= 1 ? 1 : 0;
        }catch (Exception $e ) {
            echo 'Error checking favourite song from db. Caught exception: ', $e->getMessage(), "\n";
        }
    }
    
    function addFavSong($accountID, $songID){
       try{
            if(!$this->isInFav($accountID, $songID)){
                $db = DB::getInstance();
                $stm = $db->prepare('insert into MySong(AccountID, SongID) values (?, ?)');
                $stm->execute([$accountID, $songID]);
            }
       }catch (Exception $e){
           echo 'Error adding favourite song to db. Caught exception: ', $e->getMessage(), "\n";
       }
    }
	
    
    function removeFavSong($accountID, $songID){
        try{
            if($this->isInFav($accountID, $songID)){
                $db = DB::getInstance();
                $stm = $db->prepare('delete from MySong where AccountID = ? and SongID = ?');
                $stm->execute([$accountID, $songID]);
            }
        }catch(Exception $e){
            echo 'Error removing favourite song from db. Caught exception: ', $e->getMessage(), "\n";
        }
    }
}

//$songModel = new SongModel();
//$songModel->addSong('Victory - Two Steps From Hell', 'Instrumental', '../../songs/Victory.mp3');
//$songModel->addSong('Arcade - Duncan Laurence', 'Pop', '../../songs/Arcade - Duncan Laurence.mp3');
//$songModel->addSong('Believer - Imagine Dragons', 'Rock', '../../songs/Believer - Imagine Dragons.mp3');
//$songModel->addSong('Star Sky - Two Steps From Hell', 'Rock', '../../songs/Star Sky - Two Steps From Hell.mp3');
//$songModel->updateSongViews(1, 1);
//var_dump($songModel->getAllSongs());
//var_dump($songModel->getSongByID(2));

//echo $songModel->isInFav(1,1);
//$songModel->addFavSong(1,1);
//$songModel->removeFavSong(1,1);
?>