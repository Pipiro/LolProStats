<?php

//inclusion des managers
require_once $_SERVER['DOCUMENT_ROOT'].'/Magic-School/Source/classes/manager/PlayerManager.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Magic-School/Source/classes/manager/AccountManager.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Magic-School/Source/classes/manager/NotificationManager.class.php';

//inclusion des pdo
require_once $_SERVER['DOCUMENT_ROOT'].'/Magic-School/Source/classes/manager/pdo/PdoPlayerManager.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Magic-School/Source/classes/manager/pdo/PdoAccountManager.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Magic-School/Source/classes/manager/pdo/PdoNotificationManager.class.php';

?>