<?php
function table()
{
	static $_defaults = array(
		'rows' => array()
	);
	static $_simple = array('rows');
	$p = func_get_args();
	$p = parse_arguments($p, $_simple, $_defaults);

	$output = start_table($p);

	foreach ((array)$p['rows'] as $row)
	{
		$output .= table_row($row);
	}

	$output .= end_table($p);

	return $output;
}
?>
