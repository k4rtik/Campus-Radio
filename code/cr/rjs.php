<?php
require_once('header.php');

print start_page('Radio Jockeys');

$query = "SELECT fname, lname, about, fbprofile, phone from profile order by fname";
$result = pgsql_query($query);

	
	while (list($fname, $lname, $about, $fbprofile) = pg_fetch_row($result))
	{
		$name = $fname . ' ' . $lname;
		if($fbprofile==''){
			$head = $name;
			}
			else{
		$head = <<<EOQ
		<a href="$fbprofile">$name</a>
EOQ;
}
		print subtitle($head);
		print paragraph($about);

	}
	pg_free_result($result);
	//print paragraph($lines);

echo  end_page()
;
?>
