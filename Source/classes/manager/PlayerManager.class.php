<?php

interface PlayerManager 
{
	function register($username, $password);
	function authenticate($username, $password);
	function isMailValid($mail);
	function isUsernameExist($username);
}

?>