<?php

// a quick & dirty profiling technique - just store elapsed time at
// different parts of the page
function check_timing($loc='')
{
	static $timestamps = array();
	static $last_time = NULL;
	list($msec,$sec) = explode(' ', microtime());
	$now = (float)$sec + (float)$msec;
	if ($last_time === NULL)
	{
		$last_time = $now;
	}
	$output = NULL;
	if (!empty($loc))
	{
		$timestamps[][$loc] = $now - $last_time;
	}
	else
	{
		$output = var_export($timestamps, TRUE);
	}
	$last_time = $now;
	return $output;
}
// call it here to initialize timer
check_timing('begin');
?>
