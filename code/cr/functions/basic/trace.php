<?php
function trace_list($what=NULL, $status=NULL)
{
	static $list = array();
	if ($what)
	{
		if ($status === TRUE)
		{
			$list[$what] = 1;
		}
		elseif ($status === FALSE && isset($list[$what]))
		{
			unset($list[$what]);
		}
		return isset($list[$what]);
	}
	return $list;
}

function start_trace($file=NULL)
{
	if ($file)
	{
		push_handler(E_USER_NOTICE, H_ALL);
		$from = 'UNKNOWN';
		$backtrace = debug_backtrace();
		if (count($backtrace))
		{
			$here = array_shift($backtrace);
			$from = isset($here['file']) ? $here['file'] : $from;
		}
		if (strstr($file,'()') === FALSE && strstr($file,'::') === FALSE)
		{
			$file = realpath($file);
		}
		else
		{
			$file = strtolower($file);
		}
		echo "trace:<ul>\n<li>start_trace: $file\n\tfrom $from\n</ul>\n";
		trace_list($file, TRUE);
	}
}
function stop_trace($file=NULL)
{
	if ($file)
	{ 
		if (strstr($file,'()') === FALSE && strstr($file,'::') === FALSE)
		{
			$file = realpath($file);
		}
		else
		{
			$file = strtolower($file);
		}
		echo "trace:<ul>\n<li>stop_trace: file=", $file, "\n</ul>\n";
		trace_list($file, FALSE);
		pop_handler(E_USER_NOTICE);
	}
}

function trace()
{
	static $last_where = NULL;
	static $failed = array();

	$p = func_get_args();
	$backtrace = debug_backtrace();
	if (count($backtrace) == 0)
	{
		return;
	}
	$buf = '';

	$here = array_shift($backtrace);
	$file = isset($here['file']) ? $here['file'] : NULL;
	$class = isset($here['class']) ? $here['class'] : NULL;
	$line = isset($here['line']) ? $here['line'] : NULL;
	// because function ref will be 'trace', back up one to see where
	// we came from
	$here = array_shift($backtrace);
	$function = isset($here['function']) ? $here['function'] : NULL;
	if (trace_list($file))
	{
		// error_log("<li>trace: found file $file in trace list\n");
	}
	elseif (trace_list($function.'()'))
	{
		// error_log( "<li>trace: found function $function in trace list\n");
	}
	elseif (trace_list($class.'::'))
	{
	// error_log("<li>trace: found class $class in trace list\n");
	}
	else
	{
		if (!isset($failed[$file]))
		{
			// error_log( "<li>trace: did not find file $file in trace list\n");
			$failed[$file] = 1;
		}
		if (!isset($failed[$function]))
		{
			// error_log( "<li>trace: did not find function $function in trace list\n");
			$failed[$function] = 1;
		}
		if (!isset($failed[$class]))
		{
			// error_log( "<li>trace: did not find class $class in trace list\n");
			$failed[$class] = 1;
		}
		return;
	}
	$buf .= '<li>';
	foreach ($p as $arg)
	{
		if (is_string($arg))
			$tmp = $arg;
		else
			$tmp = var_export($arg, TRUE);
		$buf .= $tmp;
	}
	$where = '';
	if ($class)
	{
		$where .= $class.'::';
	}
	if ($function)
	{
		$where .= $function.':';
	}
	$where .= $file;
	if ($where != $last_where)
	{
		$buf .= "\n\tfrom $where";
		$last_where = $where;
	}
	$buf .= ": line $line\n<hr>\n";
	echo "trace:<ul>\n", $buf, "\n</ul>\n";
	// error_log('trace:'.$buf);
}
?>
