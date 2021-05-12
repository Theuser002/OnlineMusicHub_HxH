<?php
	if(isset($_POST['login-submit'])){
		require '../../configs/connection.php';
		require ''
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if(empty($username) || empty($password)) {
			header("Location: ../index.php?error1=emptyfields");
        	exit();
		}
		else{
			$sql = "select * from Account where username= ?";
			$res = sqlsrv_query($conn, $sql, $username);
		}
	}
?>