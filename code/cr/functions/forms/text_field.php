<?php

// string text_field ([string name [, string value [, int size [, int maximum length]]]])

// This function returns an HTML text input field. The default size
// of the field is 10. A value and maximum data length for the field
// may be supplied.

function text_field ()
{
	static $_defaults = array(
		'type' => 'text'
		, 'size' => 40
		, 'name' => 'textfield'
		, 'label' => NULL
		, 'default' => NULL
		, 'value' => NULL
		, 'source' => NULL
	);
	static $_simple = array('name','label','default');
	$p = func_get_args();
	$p = parse_arguments($p, $_simple, $_defaults);
	array_key_remove($p,array('_defaults','_simple'));
	if ($p['label'] === NULL)
	{
		$p['label'] = labelize($p['name']);
	}
	$p['value'] = get_field_value($p['name'],$p['default'],$p['value'],$p['source']);
	return input_field($p);
}
?>
