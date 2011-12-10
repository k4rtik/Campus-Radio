<?php

// string table_header_cell ([string value [, array attributes]])

// This function returns an HTML table header cell (<th>) tag. The first
// argument will be used as the value of the tag. Attributes for the
// <td> tag may be supplied as an array in the second argument.
// By default, the table cell will be aligned left horizontally,
// and to the top vertically.

function table_header_cell ()
{
	static $_defaults = array(
		'align' => 'left'
		, 'valign' => 'top'
		, 'value' => ''
		, 'allowed' => array('Common','abbr','align','axis','char','charoff'	
			,'colspan','headers','rowspan','scope','valign','width','height'	
			,'nowrap','bgcolor'
		)
	);
	static $_simple = array('value');

	$p = func_get_args();
	$p = parse_arguments($p, $_simple, $_defaults);
	$attlist = get_attlist($p);

	if (is_array($p['value']) or is_object($p['value']))
	{
		$p['value'] = implode('',(array)$p['value']);
	}

	$output = "\n  <th $attlist>{$p['value']}</th>\n";
	return $output;
}

?>
