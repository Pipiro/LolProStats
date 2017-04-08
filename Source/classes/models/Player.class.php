<?php

class Player
{
	private $id;
	private $username;
	private $password;
	private $isAdmin;
	private $isOnline;
	private $lastOnline;
	
	public function __construct($id = null, $username = null, $password = null, $isAdmin = null, $isOnline = null, $lastOnline = null) 
	{
		$this->id = $id;
		$this->username = $username;
		$this->password = $password;
		$this->isAdmin = $isAdmin;
		$this->isOnline = $isOnline;
		$this->lastOnline = $lastOnline;
	}
	
	public function getId() 
	{ 
		return $this->id; 
	} 

	public function getUsername()
	{
		return $this->username;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function getIsAdmin()
	{
		return $this->isAdmin;
	}

	public function getIsOnline()
	{
		return $this->isOnline;
	}

	public function getlastOnline()
	{
		return $this->lastOnline;
	}

	public function setId($id) 
	{ 
		$this->id = $id; 
	}
	
	public function setUsername($username) 
	{ 
		$this->username = $username; 
	}

	public function setPassword($password) 
	{ 
		$this->password = $password; 
	}

	public function setIsAdmin($isAdmin) 
	{ 
		$this->isAdmin = $isAdmin; 
	}

	public function setIsOnline($isOnline) 
	{ 
		$this->isOnline = $isOnline; 
	}

	public function setLastOnline($lastOnline) 
	{ 
		$this->lastOnline = $lastOnline; 
	}

	
}

?>