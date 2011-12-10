<?php

function http_auth_ok($force=NULL)
{
	static $ok = NULL;
	// check if we can use HTTP authentication - as of now, that means checking
	// if we are running as an Apache module
	// return TRUE or FALSE to force one mode or the other for testing
	if ($force !== NULL)
	{
		$ok = $force ? TRUE : FALSE;
	}
	if ($ok === NULL)
	{
		$ok = (PHP_SAPI == 'apache');
	}
	return $ok;
}
?>
