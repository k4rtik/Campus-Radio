<?php

// string submit_field ([string name [, string value]])

// This function returns an HTML submit field. The value of the field
// will be the string displayed by the button displayed by the user's
// browser. The default value is "Submit".
debug_file(array('level'=>get_constant('field.php')));
function submit_field ()
{
	static $_defaults = array(
		'type' => 'submit'
		, 'name' => 'submit'
		, 'value' => 'Submit'
	);
	static $_simple = array('value','name');
	$p = func_get_args();
	$p = parse_arguments($p, $_simple, $_defaults);
trace('p=',$p);
	array_key_remove($p,array('_defaults','_simple'));
	return input_field($p);
}

?>
