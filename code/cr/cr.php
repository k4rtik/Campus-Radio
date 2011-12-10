<?php
include_once(dirname(__FILE__).'/cr_constants.php');
function add_to_include_path()
{
	$include_path = ini_get('include_path');

	$ps = PATH_SEPARATOR;

	$paths = explode($ps, $include_path);
	$above_cr = realpath(CR_ROOT.'/../');
	if (!in_array($above_cr, $paths, TRUE))
	{
		$paths[] = $above_cr;
	}
	$args = func_get_args();
	foreach ($args as $newpath)
	{
		if ($newpath == '')
		{
			$newpath = $above_cr;
		}
		elseif (strpos($newpath,'/cr') === 0)
		{
			$newpath = $above_cr.$newpath;
		}
		if (!in_array($newpath, $paths, TRUE))
		{
			$paths[] = $newpath;
		}
	}
	$new_include_path = implode($ps, $paths);
	if (!ini_set('include_path', $new_include_path))
	{
		die("Could not set the 'include_path' configuration variable to '$new_include_path'");
	}
	return $new_include_path;
}

add_to_include_path('/cr');

// include the core function set
if (!defined('no_include'))
{
	require_once('cr/functions.php');
}
?>
