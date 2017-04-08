<?php

require_once 'AbstractPdoManager.class.php';

class PdoPlayerManager extends AbstractPdoManager 
{

	//------------------------------------------------------------
	//  Fonction 	authenticate
	//  Auteur      Pipiro
	//------------------------------------------------------------
	//  Role		: Authentifier un joueur
	//
	//------------------------------------------------------------
	//  Entrée		: Pseudo du joueur, mot de passe
	//  Sortie		: Objet Joueur
	//------------------------------------------------------------
	public function authenticate($username, $password)
	{
		$query = $this->pdo->prepare("SELECT id, username, password, isAdmin, isOnline, lastOnline FROM player WHERE username=:username");

		$query->bindValue(':username', $username);
		$query->execute();
			
		$result = $query->fetch(PDO::FETCH_OBJ);

		if($result && $result->password == (md5($password)))
		{
			return new Player($result->id, $result->username, $result->isAdmin, $result->isOnline, $result->lastOnline);
		}
	}

	//------------------------------------------------------------
	//  Fonction 	register
	//  Auteur      Pipiro
	//------------------------------------------------------------
	//  Role		: Enregistre un joueur
	//
	//------------------------------------------------------------
	//  Entrée		: Pseudo du joueur, mot de passe
	//  Sortie		: NULL
	//------------------------------------------------------------
	public function register($username, $password)
	{
		$query = $this->pdo->prepare("
		INSERT INTO player (username, password)
		VALUES ('".$username."', '".md5($password)."')");
			
		$resultat=$query->execute();
	}
	
	//------------------------------------------------------------
	//  Fonction 	isMailValid
	//  Auteur      Pipiro
	//------------------------------------------------------------
	//  Role		: Vérifie si le mail du joueur est valide
	//
	//------------------------------------------------------------
	//  Entrée		: Mail du joueur
	//  Sortie		: True si le mail est valide
	//				  False si le mail est invalide
	//------------------------------------------------------------
	public function isMailValid($mail)
	{
		$Syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#'; 
		if(preg_match($Syntaxe,$mail)) 
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
	
	//------------------------------------------------------------
	//  Fonction 	isUsernameExist
	//  Auteur      Pipiro
	//------------------------------------------------------------
	//  Role		: Vérifie si un joueur qui a le même
	//				  pseudo n'éxiste pas déjà
	//
	//------------------------------------------------------------
	//  Entrée		: Pseudo du joueur
	//  Sortie		: True si le pseudo existe déjà
	//				  False si le pseudo est disponible
	//------------------------------------------------------------
	public function isUsernameExist($username)
	{
		$query = $this->pdo->prepare("SELECT id, username, isAdmin, isOnline, lastOnline FROM player WHERE username=:username");
			
		$query->bindValue(':username', $username);
		$query->execute();
			
		$result = $query->fetch(PDO::FETCH_OBJ) ;

		if($result)
		{
			return true;
		}
		else 
		{
			return false;
		}
	}

}