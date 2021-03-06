<?php

require '../../configs/connection.php';
require '../models/account.entity.php';
require '../models/account.model.php';

class LogInController{
	function logIn (){
		if(isset($_POST['login-submit'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			$accountModel = new AccountModel();
			if($accountModel->checkUserForLogIn($username, $password)){
				//start a new session
				
				$account = $accountModel->getAccount($username, $password);
				session_start();
				$_SESSION['accountID'] = $account->getAccountID();
				$_SESSION['username'] = $account->getUsername();
				$_SESSION['avatarLink'] = $account->getAvatarLink();
				$_SESSION['isAdmin'] = $account->isAdmin();
				if($_SESSION['isAdmin']==1){
					header("Location: ../views/layouts/account-admin.php");
				}else{
					header("Location: ../views/layouts/account-page.php");
				}
				exit();
			}else{
				header("Location: ../views/layouts/index.php?error1=loginfailed");
				exit();
			}
		}
		//In case user cancel
		else
		{
			header("Location: ../views/layouts/index.php");
			exit();
		}
	}
	
}
	
//Login handler (but I combine it with the controller to make things simpler)
$logInController = new LogInController();
$logInController->logIn();

?>