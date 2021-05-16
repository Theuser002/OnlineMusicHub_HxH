<?php

define("defaultAvatarLink", "https://banner2.cleanpng.com/20180402/ojw/kisspng-united-states-avatar-organization-information-user-avatar-5ac20804a62b58.8673620215226654766806.jpg");

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
		$this->qvatarLink = defaultAvatarLink;
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