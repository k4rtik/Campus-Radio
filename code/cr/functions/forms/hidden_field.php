<?php

// string hidden_field ([string name [, string value]])

// This function returns an HTML hidden field. A value may be supplied.

function hidden_field ()
{
	static $_defaults = array(
		'name'=>'hiddenfield'
		, 'value'=>NULL
		, 'default'=>NULL
		, 'source'=>NULL
	);
	static $_simple = array('name','value');
	$p = func_get_args();
	$p = parse_arguments($p, $_simple, $_defaults);
	trace('before get_field_value: value=', $p['value']);
	$p['value'] = get_field_value($p['name'],$p['default'],$p['value'],$p['source']);
	trace('after get_field_value: value=', $p['value']);
	$output = "<input type='hidden' name='{$p['name']}' value='{$p['value']}'>";
	return $output;
}

?>
