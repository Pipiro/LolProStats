<?php

require_once 'AbstractPdoManager.class.php';

class PdoNotificationManager extends AbstractPdoManager 
{

	//------------------------------------------------------------
	//  Fonction 	getNotificationByAccount
	//  Auteur      Pipiro
	//------------------------------------------------------------
	//  Role		: Récupérer les notification par compte
	//
	//------------------------------------------------------------
	//  Entrée		: Id du compte
	//  Sortie		: Objets notification
	//------------------------------------------------------------
	public function getNotificationsByAccount($idAccount)
	{
		$results = array();

		$query = $this->pdo->prepare("SELECT id, idAccount, type, content, isNew, date FROM notification WHERE idAccount='$idAccount' ORDER BY date DESC");
		
		$query->execute();
		
		while($result = $query->fetch(PDO::FETCH_OBJ)) 
		{
			$notification = new notification($result->id, $result->idAccount, $result->type, $result->content, $result->isNew, $result->date);
			$results[] = $notification;
		}
		
		$query->closeCursor();

		return $results;
	}

	//------------------------------------------------------------
	//  Fonction 	addNotification
	//  Auteur      Pipiro
	//------------------------------------------------------------
	//  Role		: Ajouter une notification
	//
	//------------------------------------------------------------
	//  Entrée		: Id du compte, type de la notification, contenu
	//  Sortie		: 
	//------------------------------------------------------------
	public function addNotification($idAccount, $type, $content)
	{
		$query = $this->pdo->prepare("
		INSERT INTO notification (idAccount, type, content, isNew, date)
		VALUES ('".$idAccount."', '".$type."', '".$content."', 0, '".time()."')");
			
		$resultat=$query->execute();
	}

	//------------------------------------------------------------
	//  Fonction 	getContentTimeNotification
	//  Auteur      Pipiro
	//------------------------------------------------------------
	//  Role		: Retourne la différence de temps pour les
	//				  notifications
	//
	//------------------------------------------------------------
	//  Entrée		: Date de la notification
	//  Sortie		: Contenue du temps pour la notification
	//------------------------------------------------------------
	public function getContentTimeNotification($date)
	{
		$minusTimestamp = time() - $date;
        $contentDate = "";

        if ($minusTimestamp < 60)
        {
            $contentDate = $minusTimestamp." secondes";
        }
        else if ($minusTimestamp < 3600)
        {
            $contentDate = variant_int($minusTimestamp/60)." minutes";
        }
        else if ($minusTimestamp < 216000)
        {
            $contentDate = variant_int($minusTimestamp/3600)." heures";
        }
        else
        {
            $contentDate = variant_int($minusTimestamp/86400)." jours";
        }

		return "il y a ".$contentDate;
	}

	//------------------------------------------------------------
	//  Fonction 	updateStatutNotification
	//  Auteur      Pipiro
	//------------------------------------------------------------
	//  Role		: Mise à jour du statut de la notification
	//
	//------------------------------------------------------------
	//  Entrée		: Id de la notification
	//  Sortie		: 
	//------------------------------------------------------------
	public function updateStatutNotification($id)
	{
		$query = $this->pdo->prepare("UPDATE notification SET isNew=1 WHERE id='$id'");

		$resultat=$query->execute();
	}

}