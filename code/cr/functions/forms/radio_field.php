<?php

// string radio_field ([string name [, string value [, string label [, string match]]]])

// This function returns an HTML radio button field. The optional third 
// argument will be included immediately after the radio button, and the pair
// is included inside a HTML <nobr> tag - meaning that they will be
// displayed together on the same line.  If the value of the
// second or third argument matches that of the fourth argument,
// the radio button will be 'checked' (i.e., flipped on).

function radio_field ()
{
	static $_defaults = array(
		'type' => 'radio'
		, 'name' => 'radiofield'
		, 'label' => NULL
		, 'value' => ''
		, 'default' => NULL
		, 'match' => NULL
		, 'source' => NULL
		, 'prefix' => '<nobr>'
		, 'suffix' => '</nobr>'
		, 'label_match' => TRUE
		, 'checked' => NULL
	);
	static $_simple = array('name','value','match');

	$p = func_get_args();
	$p = parse_arguments($p, $_simple, $_defaults);
	if ($p['label'] === NULL)
	{
		$p['label'] = labelize($p['name']);
	}

	$p['match'] = get_field_value($p['name'],$p['default'],$p['match'],$p['source']);

	$p['checked'] = ($p['value'] == $p['match'] || ($p['label_match'] && ($p['label'] == $p['match']))) ? STANDALONE : NULL ;

	$output = $p['prefix'].input_field($p).' '.$p['label'].$p['suffix'];

	return $output;
}
?>
