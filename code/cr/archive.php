<?php
require_once('header.php');

print start_page('Show Archive');

$query = "select title, description, ttime, file from show order by sid desc";
$result = pgsql_query($query);

	
	while (list($title, $desc, $ttime, $file) = pg_fetch_row($result))
	{
		
		print subtitle($title);
		
		$time = date("l F j, Y h:i a", $ttime);
		
		$download = <<<EOQ
	<a href="{$file}">Download Show</a>	
EOQ;
print paragraph($desc);
print paragraph($time);
print paragraph($download);
	}
	pg_free_result($result);
	//print paragraph($lines);

echo  end_page()
;
?>
