<?php

function field_group ()
{
	static $_defaults = array(
		'values' => array()
		, 'format' => NULL
	);
	static $_simple = array('values');

	$p = func_get_args();
	$p = parse_arguments($p, $_simple, $_defaults);

	$outarr = array();
	foreach ($p['values'] as $p['label'] => $p['value'])
	{
		if (is_assoc($p['value']))
		{
			$p['value'] = text_field($p);
		}
		$outarr[] = array(table_header_cell($p['label']),$p['value']);
	}
	if ($p['format'] == 'array')
	{
		return $outarr;
	}
	$p['rows']=$outarr;
	$output = table($p);
	return $output;
}
?>
