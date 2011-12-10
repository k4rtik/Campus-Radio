<?php

// string input_field ([string name [, string value [, int size [, int maximum length]]]])

// This function returns an HTML text input field. The default size
// of the field is 10. A value and maximum data length for the field
// may be supplied.
debug_file();
function input_field ()
{
	static $_defaults = array(
		'name' => 'inputfield'
		, 'type' => 'text'
		, 'value' => NULL
		, 'allowed' => array('Common','accept','accesskey','alt','checked'
			, 'disabled','maxlength','name','readonly','size','src'
			, 'tabindex','type','value','align','ismap'
		)
	);
	static $_simple = array('name','value');
	$p = func_get_args();
	$p = parse_arguments($p, $_simple, $_defaults);
	$attlist = get_attlist($p);
	$output = "<input $attlist>";
	return $output;
}
?>
