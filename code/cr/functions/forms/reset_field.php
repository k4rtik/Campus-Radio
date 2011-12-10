<?php

// string reset_field ([string name [, string value]])

// This function returns an HTML reset field. A reset field returns
// the current form to its original state.

function reset_field ()
{
	static $_defaults = array(
		'type' => 'reset'
		, 'name' => 'reset'
		, 'value' => 'Reset'
	);
	static $_simple = array('value','name');
	$p = func_get_args();
	$p = parse_arguments($p, $_simple, $_defaults);
	array_key_remove($p,array('_defaults','_simple'));
	return input_field($p);
}
?>
