<?php
function error_logging($newlevel=NULL)
{
	static $log_error_level = E_ALL;
	$output = $log_error_level;
	if ($newlevel !== NULL)
	{
		$log_error_level = $newlevel;
	}
	return $output;
}
?>
