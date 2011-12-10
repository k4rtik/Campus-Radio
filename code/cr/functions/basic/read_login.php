<?php

function read_login()
{
	check_session();
	if (!isset($_SESSION))
		global $_SESSION;
	trace('_SESSION = ', $_SESSION);

// $_SERVER['PHP_AUTH_USER'] and $_SERVER['PHP_AUTH_PW'] are values 
// supplied by PHP, corresponding to the user name and password the user has 
// entered in the pop-up window created by an HTTP authentication header. 
// If no authentication header has ever been sent, these variables will be 
// empty. If we are not using HTTP authentication, the login form will
// create entries in the $_POST superglobal with the same names.

	$result = TRUE;
	foreach (array('PHP_AUTH_USER','PHP_AUTH_PW') as $v)
	{
		if (!isset($_SESSION[$v]) or empty($_SESSION[$v]))
		{
			trace('v=',$v,' not set in _SESSION');
			if (http_auth_ok())
			{
				trace('check for new values in _SERVER');
				$check =& $_SERVER;
			}
			else
			{
				trace('check for new values in _POST');
				$check =& $_POST;
			}
			if (isset($check[$v]))
			{
				trace('found new value for v=', $v, ' - ', $check[$v]);
				$_SESSION[$v] = $check[$v];
			}
			else
			{
				trace('did not find new value for v=', $v);
				$result = FALSE;
			}
		}
		else
		{
			trace('v=',$v,' set in _SESSION: ', $_SESSION[$v]);
		}
	}
	return $result;
}
?>
