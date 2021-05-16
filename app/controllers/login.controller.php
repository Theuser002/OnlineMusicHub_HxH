<?php
	if(isset($_POST['login-submit'])){
		require '../../configs/connection.php';
		require '../models/account.entity.php';
		require '../models/account.model.php';
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if(empty($username) || empty($password)){
			header("Location: ../index.php?error1=emptyfields");
			exit();
		}else{
			print("Helllo");
			$account = new AccountModel();
			
		}
		
		
	}else{
		header("Location: ../index.php");
    	exit();
	}
?>