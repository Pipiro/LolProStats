<?php

//inclusion des managers
require_once $_SERVER['DOCUMENT_ROOT'].'/LolProStats/Source/classes/manager/AccountManager.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/LolProStats/Source/classes/manager/NotificationManager.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/LolProStats/Source/classes/manager/ApiKeyManager.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/LolProStats/Source/classes/manager/PlayersManager.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/LolProStats/Source/classes/manager/TeamsManager.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/LolProStats/Source/classes/manager/PlayersToTeamManager.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/LolProStats/Source/classes/manager/CachePlayersManager.class.php';

//inclusion des pdo
require_once $_SERVER['DOCUMENT_ROOT'].'/LolProStats/Source/classes/manager/pdo/PdoAccountManager.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/LolProStats/Source/classes/manager/pdo/PdoNotificationManager.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/LolProStats/Source/classes/manager/pdo/PdoApiKeyManager.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/LolProStats/Source/classes/manager/pdo/PdoPlayersManager.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/LolProStats/Source/classes/manager/pdo/PdoTeamsManager.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/LolProStats/Source/classes/manager/pdo/PdoPlayersToTeamManager.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/LolProStats/Source/classes/manager/pdo/PdoCachePlayersManager.class.php';

?>