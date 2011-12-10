<?php
function &check_session()
{
	if (!isset($_SESSION))
	{
		trace('_SESSION is not set');
		if (PHP_SAPI == 'cli')
		{
			global $_SESSION;
			$_SESSION = array();
			trace('can not use cookies, in CLI - set _SESSION to array()');
		}
		else
		{
			trace('ok to use cookies, call session_start()');
			session_start();
		}
	}
	trace('results of check_session: _SESSION=', $_SESSION);
	return $_SESSION;
}
?>
