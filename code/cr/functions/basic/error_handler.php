<?php
function check_length($a, $len=0)
{
	foreach ($a as $k => $v)
	{
		if (is_array($v))
			check_length($v);
		elseif (is_object($v))
			check_length(get_object_vars($v));
		else
			echo '<li>k=', var_dump($k, TRUE), ' strlen(v)=', strlen($v), "\n";
	}
}

function error_handler($error_level,$error_msg,$file,$line,$context)
{
	// $context is an array of all the variables defined at the
	// time of the error. so we can check it to see if the
	// variables $public_error, $private_error, or $debug were defined.

if ($error_msg == 'checklength')
{
	check_length($context, 48);
	return;
}

	if (array_key_exists('public_error', $context))
	{
		$public_error = $context['public_error'];
	}
	else
	{
		$public_error = $error_msg;
	}
	if (array_key_exists('private_error', $context))
	{
		$private_error = $context['private_error'];
	}
	else
	{
		$private_error = '';
	}

	// the value for $debug that we'll use is a combination of the
	// value of the $debug variable in the scope of the line where
	// the error occurred (if defined), the setting of the debugging 
	// level for the file from debug_file() (if there is one), and 
	// the value of the constant DEBUG (if defined). 

	if (array_key_exists('debug', $context))
	{
		$debug_scope = $context['debug'];
	}
	else
	{
		$debug_scope = $error_level;
	}
	$debug_file = debug_file($file);
	if (defined('DEBUG'))
	{
		$debug_constant = constant('DEBUG');
	}
	else
	{
		$debug_constant = 0;
	}

	$debug = ($debug_scope | $debug_file) | $debug_constant;
// print "<li>eh: debug=$debug\n";

	// get the current error handling levels
	$error_reporting = error_reporting();
	$error_logging = error_logging();
	$error_debugging = error_debugging();
// print "<li>eh: error_debugging=$error_debugging\n";

// echo '<li>', sprintf("debug & error_debugging = %d\n", $debug & $error_debugging);

	// get the name of the constant that matches the error 
	// (if there is one)
	$error_name = error_levels($error_level, "_Error #$error_level");
	$public_name = substr($error_name,strrpos($error_name,'_')+1);

	// write the error to the server error log if it's of a level
	// that we're interested in 

	if ($error_logging & $error_level)
	{
		if (preg_match('/^trace<ul>/', $error_msg))
		{
			$logerror = $error_msg;
		}
		else
		{
			$logerror = "$error_name file: $file line: $line\n"
				."    error: $error_msg\n"
			;
		}
		if ($public_error && $public_error != $error_msg)
		{
			$logerror .= "    public_error: $public_error\n";
		}

		if ($private_error && $private_error != $error_msg
			&& $private_error != $public_error
		)
		{
			$logerror .= "    private_error: $private_error\n";
		}

		error_log($logerror);
	}

	// if $debug is set to something that we're debugging at the
	// moment, add some stuff to the error message and make sure
	// it gets displayed, no matter what the error_reporting level is

	if ($error_debugging & $debug && !preg_match('/^trace:<ul>/', $public_error))
	{
		$debug_error = " <li>error: $error_msg\n";
		if ($public_error && $public_error != $error_msg)
		{
			$debug_error .= " <li>public_error: $public_error\n";
		}
		if ($private_error && $private_error != $error_msg
			&& $private_error != $public_error
		)
		{
			$debug_error .= " <li>private_error: $private_error\n";
		}

		$debug_error .= "<li>backtrace:<ul>\n";

		$backtrace = debug_backtrace();
		if (array_key_exists('skip_past_function', $context))
		{
			$skip_past_function = $context['skip_past_function'];
		}
		$goodtrace = array();
		foreach ($backtrace as $skip)
		{
			if (isset($skip_past_function))
			{
				if ($skip['function'] == $skip_past_function)
				{
					unset($skip_past_function);
				}
				continue;
			}
			$goodtrace[] = $skip;
		}
		if (count($goodtrace) > 0)
			$backtrace = $goodtrace;

		foreach ($backtrace as $skip)
		{
			$class = 'NoClass';
			$function = 'NoFunction';
			$file = 'NoFile';
			$line = 'NoLine';
			extract($skip, EXTR_IF_EXISTS);
			$debug_error .= sprintf("\t<li>%s::%s [%s:%s]\n"
				, $class
				, $function
				, $file
				, $line
			);
		}
		$debug_error .= "</ul>\n";

		$public_error .= $debug_error;

		// if E_ALL has been explicitly set in the debug mask
		// dump *everything*...
		if (($error_debugging & E_ALL) == E_ALL)
		{
			// OK, not everything. but you can uncomment this if you want.
			// $context = array_merge($context,get_defined_constants());
			$public_error .= "<li>context:".dumpvar($context)."\n";
		}
	}
	elseif (!($error_reporting & $error_level))
	{
		// if the error is not of a level that we're reporting,
		// blank out the error message
		$public_error = '';
	}

	if (!empty($public_error) && ini_get('display_errors'))
	{
		if (preg_match('/^trace:<ul>/', $public_error))
		{
			print $public_error;
		}
		else
		{
			print "
<blockquote>
<b>$public_name:</b>
$public_error
</blockquote>
";
		}
	}

	if (error_debugging() & get_constant('fatal'))
	{
		exit;
	}
	switch ($error_level)
	{
		// the non-fatal errors
		case E_NOTICE:
		case E_USER_NOTICE:
		case E_WARNING:
		case E_USER_WARNING:
			return;

		// everything else is fatal
		default:
			exit;
	}
}
?>
