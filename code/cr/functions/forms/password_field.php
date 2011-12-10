<?php

// string password_field ([string name [, string value [, int size [, int maximum length]]]])

// This function returns an HTML password field. This is like a text field,
// but the value of the field is obscured (only stars or bullets are visible
// for each character).  The default size of the field is 10.  A starting
// value and maximum data length may be supplied.

function password_field ()
{
	static $_defaults = array(
		'type' => 'password'
		, 'name' => 'passwordfield'
		, 'value' => NULL
		, 'default' => NULL
		, 'source' => NULL
	);
	static $_simple = array('name');
	$p = func_get_args();
	$p = parse_arguments($p, $_simple, $_defaults);
	array_key_remove($p,array('_defaults','_simple'));
	$p['value'] = get_field_value($p['name'],$p['default'],$p['value'],$p['source']);
	return input_field($p);
}

?>
