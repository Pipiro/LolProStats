<?php

class Mage
{
	private $id;
	private $idAccount;
	private $name;
	private $sex;
	private $life;
	private $strength;
	private $speed;
	private $age;
	private $agility;
	private $power;
	private $precision;

	
	public function __construct($id = null, $idAccount = null, $name=null, $sex = null, $age = null, $life = null, $strength = null, $speed = null, $agility = null, $power = null, $precision = null) 
	{
		$this->id = $id;
		$this->idAccount = $idAccount;
		$this->name = $name;
		$this->sex = $sex;
		$this->life = $life;
		$this->strength = $strength;
		$this->speed = $speed;
		$this->age = $age;
		$this->agility = $agility;
		$this->power = $power;
		$this->precision = $precision;
	}

	public function getId() 
	{ 
		return $this->id; 
	}

	public function getIdAccount() 
	{ 
		return $this->idAccount; 
	}

	public function getName() 
	{ 
		return $this->name; 
	}

	public function getSex() 
	{ 
		return $this->sex; 
	}

	public function getLife() 
	{ 
		return $this->life; 
	}

	public function getStrength() 
	{ 
		return $this->strength; 
	}

	public function getSpeed() 
	{ 
		return $this->speed; 
	}

	public function getAge() 
	{ 
		return $this->age; 
	}

	public function getAgility() 
	{ 
		return $this->agility; 
	}

	public function getPower() 
	{ 
		return $this->power; 
	}

	public function getPrecision() 
	{ 
		return $this->precision; 
	}

	public function setId($id) 
	{ 
		$this->id = $id; 
	}

	public function setIdAccount($idAccount) 
	{ 
		$this->idAccount = $idAccount; 
	}

	public function setName($name) 
	{ 
		$this->name = $name; 
	}

	public function setSex($sex) 
	{ 
		$this->sex = $sex; 
	}

	public function setLife($life) 
	{ 
		$this->life = $life; 
	}

	public function setStrength($strength) 
	{ 
		$this->strength = $strength; 
	}

	public function setSpeed($speed) 
	{ 
		$this->speed = $speed; 
	}

	public function setAge($age) 
	{ 
		$this->age = $age; 
	}

	public function setAgility($agility) 
	{ 
		$this->agility = $agility; 
	}

	public function setPower($power) 
	{ 
		$this->power = $power; 
	}

	public function setPrecision($precision) 
	{ 
		$this->precision = $precision; 
	}
}

?>