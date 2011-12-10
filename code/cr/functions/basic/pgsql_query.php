<?php
function pgsql_query($query='')
{
	if (empty($query))
	{
		return FALSE;
	}
	$result = @pg_query($query);
	if ($result === FALSE)
	{
		// if there was an error executing the query, write out the
		// details to the error log 
		$private_error = 'Ack! query failed: '
			.'<li>error='.pg_last_error()
			.'<li>query='.$query
		;

		// just in case we were in a transaction
		@pg_query('rollback');
		error_log($private_error, 0);
		// send a generic error message to the user

		die('There was an error executing a query. Please contact the system administrator.');
	}

	return $result;  
}
?>
