<?php

function fetch_show ($sid=0)
{
	$result = pgsql_query(
		'select * from show where sid='.(int)$sid
	);
	$output = pg_fetch_assoc($result);
	pg_free_result($result);
	return $output;
}

?>
