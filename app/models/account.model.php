<?php
	include_once ('account.entity.php');
	include_once ('../../configs/connection.php');

class Model_Account{
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
	
	function addAccount($username, $password, $avatarLink){
		try{
			$db = DB::getInstance();
		
			$stm1 = $db->prepare('select top 1 AccountID + 1 as NewAccountID from Account order by AccountID desc');
			$stm1->execute();
			$row = $stm1->fetch(PDO::FETCH_ASSOC);
			$newAccountID = $row['NewAccountID'];

			$stm2 = $db->prepare(
			'
				declare @responseMessage nvarchar(250)
				exec AddUser
					@pAccountID = ?, 
					@pUsername = ?,
					@pPassword = ?,
					@pAvatarLink = ?,
					@pIsAdmin = ?,
					@responseMessage = @responseMessage OUTPUT;
			'
			);
			$stm2->execute([$newAccountID, $username, $password, $avatarLink, 0]);
			
		}catch (Exception $e){
			echo 'Error adding account to db. Caught exception: ',  $e->getMessage(), "\n";
		}
	}
	
	function getAccountInfoFromID ($accountID){
		try{
			$db = DB::getInstance();
			$stm = $db->prepare('select from Account where AccountID = ?');
			$stm->execute([$accountID]);
			$row = $res->fetch(PDO::FETCH_ASSOC);
			return ['Username' => $row['Username'], 'HashedPassword'=> $row['HashedPassword'], 'AvatarLink'=>$row['AvatarLink'], 'isAdmin'=>$row['isAdmin']];
		}catch (Exception $e){
			echo 'Error getting account from db. Caught exception: ',  $e->getMessage(), "\n";
		}
	}
	
	function getAccountID ($username, $password){
		try{
			$db = DB::getInstance();
			
			$stm1 = $db->prepare('select HASHBYTES(\'SHA2_256\', ?) as HashedPassword;');
			$stm1->execute([$password]);
			$row = $stm1->fetch(PDO::FETCH_ASSOC);
			$hashedPassword = $row['HashedPassword'];
			
			$stm2 = $db->prepare('select from Account where Username = ? and HashedPassword = ?');
			$stm2->execute([$username, $hashedPassword]);
			$row = $stm2->fetch(PDO::FETCH_ASSOC);
			
			return $row['AccountID'];
		}catch (Exception $e){
			echo 'Error getting account from db. Caught exception: ',  $e->getMessage(), "\n";
		}
	}
	
	function getAccount($accountID){
		try{
			
			$row = $this->getAccountInfoFromID($accountID);
			
			$account = new AccountEntity($row['AccountID'], $row['Username'], $row['HashedPassword'], $row['AvatarLink'], $row['isAdmin']);
			return $account;
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
		
	}
	
	function checkUserForSignIn($username, $password){
		
	}
}

echo "Hello!<br>";
$modelAccount = new Model_Account();
////var_dump($modelAccount->getAllAccounts());
////var_dump($accList[0]);
//print ($accList[0]->getHashedPassword());
$modelAccount->addAccount('Cascada', 'admin', defaultAvatarLink);
//$accList = $modelAccount->getAllAccounts();
//$modelAccount->deleteAccount('125');
?>