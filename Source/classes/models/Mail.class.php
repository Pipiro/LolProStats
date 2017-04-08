<?php

class Mail
{
	private $id;
	private $idAccount;
	private $sender;
	private $content;
	private $isNew;
	private $date;

	
	public function __construct($id = null, $idAccount = null, $sender = null, $content = null, $isNew = null, $date = null) 
	{
		$this->id = $id;
		$this->idAccount = $idAccount;
		$this->sender = $sender;
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

	public function getSender() 
	{ 
		return $this->sender; 
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

	public function setSender($sender) 
	{ 
		$this->sender = $sender; 
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