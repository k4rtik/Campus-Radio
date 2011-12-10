<?php
require_once(dirname(__FILE__).'/../header.php');
require_once(dirname(__FILE__).'/functions.php');
session_start();
$username = authenticate('User Login');
return $username;
?>
