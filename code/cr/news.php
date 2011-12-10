<?php
require_once('header.php');

print start_page('News and Announcements');

$query = "select heading, body, created from news_item order by nid desc";
$result = pgsql_query($query);

	
	while (list($heading, $body, $created) = pg_fetch_row($result))
	{
		
		print subtitle($heading);
		
		$time = 'Posted on ' . date("l F j, Y h:i a", $created);
		print paragraph($time);				
		print paragraph($body);
		
	}
	pg_free_result($result);
	//print paragraph($lines);

echo  end_page()
;
?>
