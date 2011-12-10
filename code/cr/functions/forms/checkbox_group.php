<?php

function checkbox_group ()
{
	static $_defaults = array(
		'values' => array()
		, 'name' => 'checkboxfield'
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
	$outarr = array();
	foreach ($p['values'] as $p['value'] => $p['label'])
	{
		$outarr[] = checkbox_field($p);
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
