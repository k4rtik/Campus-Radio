<?php
function hashlist_table()
{
	static $_defaults = array(
		'rows' => array()
		, 'pad' => ''
	);
	static $_simple = array('rows');
	$args = func_get_args();
	$p = parse_arguments($args, $_simple, $_defaults);

	if (!is_array($p['rows']) or count($p['rows']) == 0)
		return;

	$output = start_table($p);
	$keys = array();
	$i = 0;
	foreach ($p['rows'] as $row)
	{
		if (!is_assoc($row))
			continue;
		if (!$i++)
		{
			$keys = array_keys($row);
			$output .= table_header_row($keys);
		}
		$o = array();
		foreach ($keys as $k)
		{
			if (isset($row[$k]))
			{
				$v = $row[$k];
			}
			else
			{
				$v = '';
			}
			$o[] = $v.$p['pad'];
		}
		$output .= table_row($o);
	}
	$output .= end_table($p);
	return $output;
}
?>
