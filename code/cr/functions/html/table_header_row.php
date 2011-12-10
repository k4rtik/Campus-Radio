<?php

// string table_header_row ([mixed ...])

// This function returns an HTML table row (<tr>) tag, enclosing a variable
// number of table cell (<td>) tags. If any of the arguments to the function
// is an array, it will be used as attributes for the <tr> tag. All other
// arguments will be used as values for the cells of the row. If an
// argument begins with a <td> tag, the argument is added to the row as is.
// Otherwise it is passed to the table_header_cell() function and the resulting
// string is added to the row.

function table_header_row ()
{
	static $_defaults = array(
		'cells' => array()
		, 'allowed' => array('Common','align','valign','char','charoff'
			,'bgcolor'
		)
	);
	static $_simple = array('cells');
	$p = func_get_args();
	$p = parse_arguments($p, $_simple, $_defaults);
	$attlist = get_attlist($p);
	$output = "\n <tr $attlist>\n";
	foreach ((array)$p['cells'] as $cell)
	{
		if (stristr($cell,'<td') === FALSE && stristr($cell,'<th') === FALSE)
		{
			$output .= table_header_cell($cell);
		}
		else
		{
			$output .= $cell;
		}
	}
	$output .= "\n </tr>\n";
	return $output;
}

?>
