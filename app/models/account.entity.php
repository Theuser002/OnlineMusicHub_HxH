<?php

define("defaultAvatarLink", "./images/default-avatar.png");

class AccountEntity{
	private $accountID;
	private $username;
	private $hashedPassword;
	private $avatarLink;
	private $isAdmin;
	
	function __construct($accountID, $username, $hashedPassword, $avartarLink, $isAdmin){
		$this->accountID = $accountID;
		$this->username = $username;
		$this->hashedPassword = $hashedPassword;
		$this->avatarLink = defaultAvatarLink;
		$this->isAdmin = $isAdmin;
	}
	
	public function getAccountID(){
		return $this->accountID;
	}
	
	public function getUsername(){
		return $this->username;
	}
	
	public function getHashedPassword (){
		return $this->hashedPassword;
	}
	
	public function getAvatarLink (){
		return $this->avatarLink;
	}
	
	public function isAdmin(){
		return $this->isAdmin;
	}
}

?>