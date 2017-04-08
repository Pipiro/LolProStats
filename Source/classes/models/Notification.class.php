<?php

class Notification
{
	private $id;
	private $idAccount;
	private $type;
	private $content;
	private $isNew;
	private $date;

	
	public function __construct($id = null, $idAccount = null, $type = null, $content = null, $isNew = null, $date = null) 
	{
		$this->id = $id;
		$this->idAccount = $idAccount;
		$this->type = $type;
		$this->content = $content;
		$this->isNew = $isNew;
		$this->date = $date;
	}

	public function getId() 
	{ 
		return $this->id; 
	}

	public function getIdAccount() 
	{ 
		return $this->idAccount; 
	}

	public function getType() 
	{ 
		return $this->type; 
	}

	public function getContent() 
	{ 
		return $this->content; 
	}

	public function getIsNew() 
	{ 
		return $this->isNew; 
	}

	public function getDate() 
	{ 
		return $this->date; 
	}

	public function setId($id) 
	{ 
		$this->id = $id; 
	}

	public function setIdAccount($idAccount) 
	{ 
		$this->idAccount = $idAccount; 
	}

	public function setType($type) 
	{ 
		$this->type = $type; 
	}

	public function setContent($content) 
	{ 
		$this->content = $content; 
	}

	public function setIsNew($isNew) 
	{ 
		$this->isNew = $isNew; 
	}

	public function setDate($date) 
	{ 
		$this->date = $date; 
	}
	
}

?>