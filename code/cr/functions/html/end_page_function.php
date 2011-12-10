<?php
include_once('default_end_page.php');
function end_page()
{
	$output = NULL;
	$default_file = realpath(dirname(__FILE__).'/end_page.php');
	if (!@include('end_page.php'))
	{
		if (file_exists($default_file))
		{
			include($default_file);
		}
		else
		{
			$output = default_end_page();
		}
	}
	return $output;
}
?>
