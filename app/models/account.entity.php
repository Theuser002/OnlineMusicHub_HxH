<?php

define("defaultAvatarLink", "https://banner2.cleanpng.com/20180402/ojw/kisspng-united-states-avatar-organization-information-user-avatar-5ac20804a62b58.8673620215226654766806.jpg");

class AccountEntity{
	private $AccountID;
	private $Username;
	private $HashedPassword;
	private $AvatarLink;
	private $isAdmin;
	
	function __construct($AccountID, $Username, $HashedPassword, $AvartarLink, $isAdmin){
		$this->AccountID = $AccountID;
		$this->Username = $Username;
		$this->HashedPassword = $HashedPassword;
		$this->AvatarLink = defaultAvatarLink;
		$this->isAdmin = $isAdmin;
	}
	
	function getAccountID(){
		return $this->AccountID;
	}
	
	function getUsername(){
		return $this->PasswordHash;
	}
	
	function getHashedPassword (){
		return $this->HashedPassword;
	}
	
	function getAvatarLink (){
		return $this->AvatarLink;
	}
	
	function isAdmin(){
		return $this->isAdmin;
	}
}

?>