<?php

// string textarea_field([string name [, string value [, int cols [, int rows [, string wrap mode]]]]])

// This function returns an HTML textarea field. The default size is
// 50 columns and 10 rows, and the default wrap mode is 'soft', which means 
// no hard newline characters will be inserted after line breaks in what
// the user types into the field. The alternative wrap mode is 'hard',
// which means that hard newlines will be inserted.

function textarea_field ()
{
	static $_defaults = array(
		'name' => 'textareafield'
		, 'cols' => 50
		, 'rows' => 10
		, 'wrap' => 'soft'
		, 'default' => NULL
		, 'value' => NULL
		, 'source' => NULL
		, 'allowed' => array('Common','wrap','accesskey','cols','name'
			,'rows','tabindex'
		)
	);
	static $_simple = array('name','default');
	$p = func_get_args();
	$p = parse_arguments($p, $_simple, $_defaults);
	$p['value'] = get_field_value($p['name'],$p['default'],$p['value'],$p['source']);
	$attlist = get_attlist($p);
	$output = "<textarea $attlist>{$p['value']}</textarea>";
	return $output;
}

?>
