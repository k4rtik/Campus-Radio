<?php

function fetch_profile ($uid=0)
{
	$result = pgsql_query(
		'select * from profile where uid='.(int)$uid
	);
	$output = pg_fetch_assoc($result);
	pg_free_result($result);
	return $output;
}

?>
