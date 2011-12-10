<?php
function array_tonull()
{
	$tonull = NULL;
	if ($tonull === NULL)
	{
		$tonull = create_function('','return NULL;');
	}
	$args = func_get_args();
	$keys = array();
	foreach ($args as $arg)
	{
		if (is_assoc($arg))
		{
			$keys = array_merge($keys,array_keys((array)$arg));
		}
		else
		{
			$keys = array_merge($keys,array_values((array)$arg));
		}
	}
	// now that we have a list of keys, flip it around so that they *are* 
	// the keys of the array, and use array_map() to set the values of 
	// the array to NULL
	$output = array_map($tonull, array_flip($keys));
	return $output;
}
?>
