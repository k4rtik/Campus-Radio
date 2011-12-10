<?php
function debug_file()
{
	// store the file names for which we set up debugging levels
	static $debug_files = array();

	// some quick & dirty argument handling. we can do this
	// because we're only interested in two possible arguments,
	// $file and $level

	$args = func_get_args();
	$file = NULL;
	$level = NULL;
	foreach ($args as $arg)
	{
		switch (gettype($arg))
		{
			case 'array':
			case 'object':
				extract((array)$arg,EXTR_IF_EXISTS);
				break;
			case 'string':
				$file = $arg;
				break;
			case NULL:
				break;
			default:
				$level = (int)$arg;
		}
	}

	if (!$file)
	{
		// if no file name is given, use the current file by default.

		// we want to find the path to the file that called this function,
		// so we can't use __FILE__ - that'll just give us the name of
		// the file where this function is defined. use debug_backtrace()
		// instead.
		$backtrace = debug_backtrace();
		$last = array_shift($backtrace);
		$file = $last['file'];

		if ($level === NULL)
		{
			// if we're using a default file name, then if no level
			// is passed in, set up a default level as well
			$level = get_constant($file);
		}
	}
	else
	{
		$rfile = realpath($file);
		if ($rfile)
		{
			$file = $rfile;
		}
	}

	if ($level !== NULL)
	{
		// if we're given a level for a file (or have set one
		// as a default case), make a record of it
		$debug_files[$file] = $level;
	}

	// in any case, return the current level for this file,
	// if there is one, or FALSE if there isn't

	if (array_key_exists($file, $debug_files))
	{
		return $debug_files[$file];
	}
	// so now do more tedious file name matching
	$pat = '/'.str_replace('/','.',$file).'/i';
	if (DIRECTORY_SEPARATOR === '\\')
		$pat = str_replace('\\', '\\\\', $pat);
	return current(preg_grep($pat, array_keys($debug_files)));
}
?>
