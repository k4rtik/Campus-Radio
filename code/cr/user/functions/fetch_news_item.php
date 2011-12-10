<?php

function fetch_news_item ($nid=0)
{
	$result = pgsql_query(
		'select * from news_item where nid='.(int)$nid
	);
	$output = pg_fetch_assoc($result);
	pg_free_result($result);
	return $output;
}

?>
