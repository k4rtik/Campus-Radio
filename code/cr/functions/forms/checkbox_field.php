<?php

// string checkbox_field ([string name [, string value [, string label [, string match]]]])

function checkbox_field ()
{
	static $_defaults = array(
		'type' => 'checkbox'
		, 'name' => 'checkboxfield'
		, 'value' => ''
		, 'label' => NULL
		, 'match' => NULL
		, 'default' => NULL
		, 'checked' => NULL
		, 'source' => NULL
		, 'prefix' => '<nobr>'
		, 'suffix' => '</nobr>'
		, 'label_match' => TRUE
		, 'skip_selection' => FALSE
	);
	static $_simple = array('name','value','label');

	$p = func_get_args();
	$p = parse_arguments($p, $_simple, $_defaults);
	if ($p['label'] === NULL)
	{
		$p['label'] = labelize($p['value']);
	}
	if (!$p['skip_selection'])
	{
		$p['value'] = get_field_value(
			$p['name']
			, $p['default']
			, $p['value']
			, $p['source']
		);
		$p['checked'] = (
			in_array($p['value'],(array)$p['match']) 
			|| (
				$p['label_match'] 
				&& in_array($p['label'],(array)$p['match'])
			)
		) ? STANDALONE : NULL ;
	}
	$output = $p['prefix'].input_field($p).' '.$p['label'].$p['suffix'];

	return $output;
}
?>
