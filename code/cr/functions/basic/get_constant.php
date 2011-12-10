<?php
function get_constant($constname='')
{
	// start at one above E_USER_NOTICE to avoid conflicts
	// (we can't initialize a static variable to an expression,
	// so we have to start it off as NULL and then fix that.)

	static $last_constant = NULL;
	if ($last_constant === NULL)
	{
		$last_constant = E_USER_NOTICE << 1;
	}
	static $defined_constants = array();
	static $defined_or = 0;

	$output = 0;
	if (!empty($constname))
	{
		if (!defined($constname))
		{
			define($constname,$last_constant);
			$defined_constants[$constname] = $last_constant;
			$defined_or = $defined_or | $last_constant;
			$last_constant = $last_constant << 1;
		}
		$output = constant($constname);
	}
	else
	{
		// if no constant name is given, hand back the equivalent 
		// of E_ALL for the constants defined so far
		$output = $defined_or;
	}
	return $output;
}
?>
