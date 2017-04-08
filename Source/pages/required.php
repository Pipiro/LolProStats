<?php

//inclusion des classes
require_once $_SERVER['DOCUMENT_ROOT']."/LolProStats/Source/classes/models/Account.class.php";
require_once $_SERVER['DOCUMENT_ROOT']."/LolProStats/Source/classes/models/Mail.class.php";
require_once $_SERVER['DOCUMENT_ROOT']."/LolProStats/Source/classes/models/Notification.class.php";
require_once $_SERVER['DOCUMENT_ROOT']."/LolProStats/Source/classes/models/Mage.class.php";
require_once $_SERVER['DOCUMENT_ROOT']."/LolProStats/Source/classes/models/ApiKey.class.php";
require_once $_SERVER['DOCUMENT_ROOT']."/LolProStats/Source/classes/models/Players.class.php";
require_once $_SERVER['DOCUMENT_ROOT']."/LolProStats/Source/classes/models/Teams.class.php";
require_once $_SERVER['DOCUMENT_ROOT']."/LolProStats/Source/classes/models/PlayersToTeam.class.php";
require_once $_SERVER['DOCUMENT_ROOT']."/LolProStats/Source/classes/models/CachePlayers.class.php";

require_once $_SERVER['DOCUMENT_ROOT']."/LolProStats/Source/classes/manager/ManagerFactory.class.php";

session_start();

?>