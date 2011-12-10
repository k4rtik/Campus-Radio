<?php

// string image_field ([string name [, string src [, string value]]])

// This function returns an HTML image field. An image field works
// likes a submit field, except that the image specified by the URL
// given in the second argument is displayed instead of a button.

function image_field ()
{
	static $_defaults = array(
		'type' => 'image'
		, 'name' => 'imagefield'
	);
	static $_simple = array('name','src');
	$p = func_get_args();
	$p = parse_arguments($p, $_simple, $_defaults);
	array_key_remove($p,array('_defaults','_simple'));
	return input_field($p);
}
?>
