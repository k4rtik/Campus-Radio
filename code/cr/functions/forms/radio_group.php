<?php

function radio_group ()
{
	static $_defaults = array(
		'values' => array()
		, 'name' => 'radiofield'
		, 'sep' => "&nbsp;\n"
		, 'match' => NULL
		, 'default' => NULL
		, 'source' => NULL
		, 'group_prefix' => ''
		, 'group_label' => NULL
		, 'group_suffix' => ''
		, 'format' => NULL
	);
	static $_simple = array('name','values');
	$p = func_get_args();
	$p = parse_arguments($p, $_simple, $_defaults);
	if ($p['group_label'] === NULL)
	{
		$p['group_label'] = labelize($p['name']);
	}
	$p['match'] = get_field_value($p['name'],$p['default'],$p['match'],$p['source']);
	$outarr = array();
	foreach ($p['values'] as $p['value'] => $p['label'])
	{
		$outarr[] = radio_field($p);
	}
	if ($p['format'] == 'array')
	{
		return $outarr;
	}
	$output = $p['group_prefix']
		. $p['group_label']
		. ' '
		. implode($p['sep'],$outarr)
		. $p['group_suffix']
	;
	return $output;
}

?>
