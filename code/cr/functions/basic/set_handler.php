<?php

// create constants to represent the three places that need to know
// how to handle a given error level - normal error reporting,
// error logging, and debugging
if (!defined('H_ERROR'))
	define('H_ERROR',1);
if (!defined('H_LOG'))
	define('H_LOG',2);
if (!defined('H_DEBUG'))
	define('H_DEBUG',4);
if (!defined('H_ALL'))
	define('H_ALL', (H_ERROR | H_LOG | H_DEBUG));

function set_handler($newvalue=NULL, $where=NULL, $direction=NULL)
{
	// store the names of the handling functions 
	static $functions = NULL;
	if ($functions === NULL)
	{
		$functions = array(
			H_ERROR => 'error_reporting'
			, H_LOG => 'error_logging'
			, H_DEBUG => 'error_debugging'
		);
	}
	// this will hold the last error level that we turned on,
	// so we can easily turn it off (see below)
	static $last_args = array();

	if ($direction === FALSE && $newvalue === NULL && $where === NULL)
	{
		// if we just get an argument to turn something off, but
		// not what or where, use the last error level that we
		// turned on
		list($where,$newvalue) = array_pop($last_args);
	}

	if (empty($where))
	{
		// if we don't get a request for a specific kind of
		// handler, pick a default one
 
		if (error_levels($newvalue))
		{
			// if the error level we're dealing with
			// is one of the standard PHP values, assume that
			// we want to change error handling

			$where = H_ERROR | H_LOG;
		}
		else
		{
			// if we're dealing with some made-up error level,
			// it's probably for debugging, so use that as
			// the default

			$where = H_DEBUG;
		}
	}

	if ($direction !== FALSE)
	{
		// if we're turning on handling for something, store
		// it for turning off later

		array_push($last_args, array($where,$newvalue));
	}

	$output = 0;
	foreach ($functions as $handler => $handler_function_name)
	{
		if ($where & $handler)
		{
			// if this type of handler is one of the ones we want
			// to change, get its current value

			if (function_exists($handler_function_name))
				$call_arg = $handler_function_name;
			else
				$call_arg = array($handler_function_name,'o');

			$handler_level = call_user_func($call_arg);

			// either set handling directly to new level, or turn it on or off
			if ($direction === FALSE)
			{
				$handler_level = $handler_level ^ $newvalue;
			}
			elseif ($direction === TRUE)
			{
				$handler_level = $handler_level | $newvalue;
			}
			else 
			{
				$handler_level = $newvalue;
			}

			// add the new level to our result
			$output = $output | $handler_level;

			// call the handler function to set it to the new level
			call_user_func($call_arg,$handler_level);
		}
	}

	// return an OR'd sum of the changed handling values
	return $output;

}
?>
