<?php
function error_debugging($newlevel=NULL)
{
	static $debug_error_level = 0;
	$output = $debug_error_level;
	if ($newlevel !== NULL)
	{
		$debug_error_level = $newlevel;
	}
	return $output;
}
?>
