<?php
	include_once ('account.entity.php');
	include_once ('../../configs/connection.php');

class AccountModel{
	function __construct(){
	}
	function getAllAccounts(){
		$db = DB::getInstance();// creating db DO connection
		$stm = $db->prepare('select * from account');
		$stm->execute(); //returns true on success, false on failure
		
		$accList = array();
		
		while ($row = $stm->fetch(PDO::FETCH_ASSOC)){
			
			$acc = new AccountEntity($row['AccountID'], $row['Username'], $row['HashedPassword'], $row['AvatarLink'], $row['isAdmin']);
			
			array_push($accList, $acc);
		}
		
		return $accList;
	}
	
	function addAccount($username, $password){
		try{
			$db = DB::getInstance();
		
//			finding the largest id
			$stm1 = $db->prepare('select top 1 AccountID + 1 as NewAccountID from Account order by AccountID desc');
			$stm1->execute();
			$row = $stm1->fetch(PDO::FETCH_ASSOC);
			$newAccountID = $row['NewAccountID'];
			$isAdmin = 0;
			if (!$newAccountID){
				$newAccountID = 1;
				$isAdmin = 1;
			}
			$avatarLink=defaultAvatarLink;
			$stm2 = $db->prepare(
			'
				declare @responseMessage nvarchar(250)
				exec AddUser
					@pAccountID = ?, 
					@pUsername = ?,
					@pHashedPassword = ?,
					@pAvatarLink = ?,
					@pIsAdmin = ?,
					@responseMessage = @responseMessage OUTPUT;
			'
			);
			$stm2->execute([$newAccountID, $username, hash('sha256', $password), $avatarLink, $isAdmin]);
			
		}catch (Exception $e){
			echo 'Error adding account to db. Caught exception: ',  $e->getMessage(), "\n";
		}
	}
	
	function getAccountID ($username, $password){
		try{
			$db = DB::getInstance();
			$hashedPassword = hash('sha256', $password);
			
			$stm = $db->prepare('select AccountID from Account where Username = ? and HashedPassword = ?');
			$stm->execute([$username, $hashedPassword]);
			$row = $stm->fetch(PDO::FETCH_ASSOC);
			
			return $row['AccountID'];
		}catch (Exception $e){
			echo 'Error getting account from db. Caught exception: ',  $e->getMessage(), "\n";
		}
	}
	
	function getAccount ($username, $password){
		try{
			$db = DB::getInstance();
			$hashedPassword = hash('sha256', $password);
			
			$stm = $db->prepare('select * from Account where Username = ? and HashedPassword = ?');
			$stm->execute([$username, $hashedPassword]);
			$row = $stm->fetch(PDO::FETCH_ASSOC);
			
			$acc = new AccountEntity($row['AccountID'], $row['Username'], $row['HashedPassword'], $row['AvatarLink'], $row['isAdmin']);
			
			return $acc;
		}catch (Exception $e){
			echo 'Error getting account from db. Caught exception: ',  $e->getMessage(), "\n";
		}
	}
	
	function getAccountFromID ($accountID){
		try{
			$db = DB::getInstance();
			$stm = $db->prepare('select * from Account where AccountID = ?');
			$stm->execute([$accountID]);
			$row = $stm->fetch(PDO::FETCH_ASSOC);
			
			$acc = new AccountEntity($row['AccountID'], $row['Username'], $row['HashedPassword'], $row['AvatarLink'], $row['isAdmin']);
			
			return $acc;
		}catch (Exception $e){
			echo 'Error getting account from db. Caught exception: ',  $e->getMessage(), "\n";
		}
	}
	
	function updateAccount(){
		
	}
	
	function deleteAccount($accountID){
		try{
			$db = DB::getInstance();
			$stm = $db->prepare('delete from Account where AccountID = ?');
			$stm->execute([$accountID]);
		}catch(Exception $e){
			echo 'Error deleting account from db. Caught exception: ',  $e->getMessage(), "\n";
		}
	}
	
	function makeAdmin($accountID){
		
	}
	

	
	function checkUserForSignUp($username){
		try{
			$db = DB::getInstance();
			$stm = $db->prepare('select * from Account where Username = ?');
			$stm->execute([$username]);
			#0: username has been used, please choose another, signup unsucessful
			#1: signup successful
			return iterator_count($stm) > 0 ? 0 : 1;
		}catch(Exception $e){
			echo 'Error checking user for signup. Caught exception: ', $e->getMessage(), "\n";
		}
	}
	
	function checkUserForLogIn($username, $password){
		try{
			$db = DB::getInstance();
			$stm = $db->prepare('select * from Account where Username = ? and HashedPassword = ?');
			$passwordHash = hash('sha256', $password);
			$stm->execute([$username, $passwordHash]);
			#0: Login successful
			#1: Login unsucessful
			return iterator_count($stm) == 1 ? 1 : 0;
		}catch (Exception $e){
			echo 'Error checking user for signup. Caught exception: ', $e->getMessage(), "\n";
		}
		
	}
}

echo "Hello!<br>";
//$modelAccount = new AccountModel();
//$accList = $modelAccount->getAllAccounts();
//var_dump($accList);
//var_dump($accList[0]);
//print ($accList[0]->getHashedPassword());
//$modelAccount->addAccount('Cascada', 'admin');
//$modelAccount->addAccount('Rick Roll', 'user');
//$modelAccount->deleteAccount(2);
//$accList = $modelAccount->getAllAccounts();
//$modelAccount->deleteAccount('125');
//print($modelAccount->checkUserForSignUp('Cascada')."<br>");
//print($modelAccount->checkUserForLogIn('Cascada', 'admin')."<br>");
//var_dump($modelAccount->getAccountID('Rick Roll', 'user'));
//print("<br>");
//var_dump($modelAccount->getAccount('Rick Roll', 'user'));
//print("<br>");
//var_dump($modelAccount->getAccountFromID(3));
?>