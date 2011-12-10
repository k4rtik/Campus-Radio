<?php
function get_session_id($session_id=NULL)
{
	// if a session ID has not been passed in, check _REQUEST
	if (empty($session_id))
	{
		$session_id = array_key_value($_REQUEST, 'session_id', NULL);
	}
	if ($session_id)
	{
		session_id($session_id);
	}
	$session_id = session_id();
	if (empty($session_id))
	{
		$unike = implode('.', array_key_value($_SERVER, array('HTTP_USER_AGENT','REMOTE_ADDR','REMOTE_PORT'), '', 'list'));
		if (!isset($_SERVER['REMOTE_ADDR']) && PHP_SAPI == 'cli')
		{
			// this is a UNIX-only hack so that running the CLI version twice 
			// from the same terminal session will give you the same ID
			$tsess = preg_replace('/[^0-9]/','',shell_exec('ps -$$ -o tsess'));
			$unike = $unike . '.' . $tsess;
		}
		error_log('unike = '.$unike);
        $session_id = md5($unike);
		session_id($session_id);
	}
	return $session_id;
}
?>
