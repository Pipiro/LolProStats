<?php

class Account
{
	private $id;
	private $idPlayer;
	private $gold;
	private $level;
	private $experience;

	
	public function __construct($id = null, $idPlayer = null, $gold = null, $level = null, $experience = null) 
	{
		$this->id = $id;
		$this->idPlayer = $idPlayer;
		$this->gold = $gold;
		$this->level = $level;
		$this->experience = $experience;
	}

	public function getId() 
	{ 
		return $this->id; 
	}

	public function getIdPlayer() 
	{ 
		return $this->idPlayer; 
	}

	public function getGold() 
	{ 
		return $this->gold; 
	}

	public function getLevel() 
	{ 
		return $this->level; 
	}

	public function getExperience() 
	{ 
		return $this->experience; 
	}

	public function setId($id) 
	{ 
		$this->id = $id; 
	}

	public function setIdPlayer($idPlayer) 
	{ 
		$this->idPlayer = $idPlayer; 
	}

	public function setGold($gold) 
	{ 
		$this->gold = $gold; 
	}

	public function setLevel($level) 
	{ 
		$this->level = $level; 
	}

	public function setExperience($experience) 
	{ 
		$this->experience = $experience; 
	}
	
}

?>