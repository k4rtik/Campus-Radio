<?php
function logout()
{
	$login_fields = array('PHP_AUTH_USER','PHP_AUTH_PW');
	$args = func_get_args();
	foreach ($args as $arg)
	{
		if (is_string($arg))
		{
			$login_fields[] = $arg;
		}
	}
	foreach ($login_fields as $k)
	{
		if (isset($_SESSION) && array_key_exists($k,$_SESSION)) { unset($_SESSION[$k]); }
		if (isset($_POST) && array_key_exists($k,$_POST)) { unset($_POST[$k]); }
		if (isset($_GET) && array_key_exists($k,$_GET)) { unset($_GET[$k]); }
		if (isset($_REQUEST) && array_key_exists($k,$_REQUEST)) { unset($_REQUEST[$k]); }
		if (isset($_COOKIE) && array_key_exists($k,$_COOKIE)) { unset($_COOKIE[$k]); }
		if (isset($GLOBALS) && array_key_exists($k,$GLOBALS)) { unset($GLOBALS[$k]); }
	}
	session_write_close();
	echo "Logout executed";
	if (http_auth_ok())
	{
		header('HTTP/1.0 401 Unauthorized');
	}
	
	header("Location: ../index.php");
	//exit;
}
?>
