<?php
//	notes on makepath: rough outline of logic involved
// 
// makepath ( path, use_include_path )
// 	if path is a directory
// 		return path
// 	if path exists
// 		return ERROR
// 	if mkdir(path) succeeds
// 		return path
// 
// 	use HTML include logic to search for path
// 		if whole path found as-is
// 			return new path
// 	if use_include_path
// 		look through paths from include_path
// 			if whole path found as-is
// 				return new path
// 
// 	whole path not found anywhere - find next-best match
// 	("next-best" == greatest number of directories in path already exist)
// 		back up one level and repeat, except don't error out if file exists, 
// 	 	 just keep looking
// 		keep backing up until something is found or run out of levels
// 		if out of levels
// 			return ERROR
// 		try to create path under found location
// 		return results
// 

function create_path($path)
{
	if (is_dir($path))
	{
		return realpath($path);
	}
	if (file_exists($path))
	{
		return FALSE;
	}
	$trypath = realpath($path);
	if ($trypath)
	{
		if (@mkdir($trypath))
		{
			return $trypath;
		}
	}
	return FALSE;
}

function makepath($path, $use_include=FALSE)
{
	$result = create_path($path);
	if ($result)
	{
		// lucky on the first go
		return realpath($result);
	}

	$result = find_path_match($path, $use_include);
	if (!$result)
	{
		return FALSE;
	}
	if (!is_array($result))
	{
		return FALSE;
	}
	list($root, $base) = $result;
	$path = $root;
	foreach (explode(DIRECTORY_SEPARATOR, $base) as $b)
	{
		$path .= DIRECTORY_SEPARATOR.$b;
		$result = create_path($path);
		if (!$result)
		{
			return FALSE;
		}
	}
	return realpath($path);
}

function find_path_match($path, $use_include=FALSE)
{
	static $sysroot = NULL;
	if ($sysroot === NULL)
	{
		$sysroot = realpath('/');
	}

	$newpath = FALSE;
	$trypath = $path;
	$base = '';
	if (!$use_include)
	{
		$extra_paths = array();
	}
	else
	{
		$extra_paths = explode(path_separator(), ini_get('include_path'));
	}
	do
	{
		$newpath = check_path($trypath, $extra_paths);
		if (!$newpath)
		{
			$base = basename($trypath).DIRECTORY_SEPARATOR.$base;
			$trypath = dirname($trypath);
			if (!$trypath or dirname($trypath) === $trypath)
			{
				$trypath = $sysroot;
			}
		}
	}
	while (!$newpath && $trypath != $sysroot);
	if (!$newpath)
	{
		return FALSE;
	}
	return array($newpath, $base);
}
function check_realpath($path)
{
	$trypath = realpath($path);
	if ($trypath && is_dir($trypath))
	{
		return $trypath;
	}
	return FALSE;
}
function check_path($path, $extra_paths=array())
{
	// look for the path as it is
	if (($trypath = check_realpath($path)))
	{
		return $trypath;
	}

	// look for the path like an HTML reference
	if (substr($path, 0, 1) == '/')
	{
		if (!empty($_SERVER['DOCUMENT_ROOT']))
		{
			if (($trypath=check_realpath($_SERVER['DOCUMENT_ROOT'].'/'.$path)))
			{
				return $trypath;
			}
		}
	}
	else
	{
		if (($trypath = realpath('./'.$path)))
		{
			return $trypath;
		}
	}

	// check any extra paths passed in
	if (!is_array($extra_paths))
	{
		return FALSE;
	}
	foreach ($extra_paths as $trypath)
	{
		$trypath .= DIRECTORY_SEPARATOR.$path;
		if (is_dir($trypath))
		{
			return $trypath;
		}
	}
	return FALSE;
}
?>
