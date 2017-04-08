<?php

interface NotificationManager 
{
	function getNotificationsByAccount($idAccount);
	function addNotification($idAccount, $type, $content);
	function getContentTimeNotification($date);
	function updateStatutNotification($id);
}

?>