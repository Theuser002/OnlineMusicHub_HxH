<?php
	require '../../configs/connection.php';
	require '../models/account.entity.php';
	require '../models/account.model.php';

class SignUpController{
	
	function between($val, $x, $y){
		$val_len = strlen($val);
		return ($val_len >= $x && $val_len <= $y)?TRUE:FALSE;
	}
	
	function SignUp(){
		if(isset($_POST['signup-submit'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$passwordRepeat = $_POST['password-repeat'];
			
			if (empty($username) || empty($password) || empty($passwordRepeat)){
				header("Location: ../views/layouts/index.php?error=emptyfields");
				exit();
			}
			else if(!preg_match("/^[a-zA-Z0-9]*$/", $username) || !$this->between($username,4,15)) {
				header("Location: ../views/layouts/index.php?error=invalidusername");
				exit();
			}
			else if(!$this->between($password,4,20)) {
				header("Location: ../views/layouts/index.php?error=invalidpassword");
				exit();
			}
			else if($password !== $passwordRepeat){
			   header("Location: ../views/layouts/index.php?error=passworddontmatch");
			   exit();
			}
			else{
				$accountModel = new AccountModel();
				if($accountModel->checkUserForSignUp($username, $password)){
					//add account to database
					$accountModel->addAccount($username, $password);
					
					//get the account info from database
					$account = $accountModel->getAccount($username, $password);
					
					//init session
					session_start();
					$_SESSION['accountID'] = $account->getAccountID();
					$_SESSION['username'] = $account->getUsername();
					$_SESSION['avatarLink'] = $account->getAvatarLink();
					$_SESSION['isAdmin'] = $account->isAdmin(); 
					
					header("Location: ../views/layouts/account-page.php");
					exit();
				}else{
					header("Location: ../views/layouts/index.php?error=usernametaken");
					exit();
				}
			}
			
			
			
		}
	}
}

$signUpController = new SignUpController();
$signUpController->SignUp();

?>