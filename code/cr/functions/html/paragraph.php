<?php

// string paragraph ([array attributes [, mixed ...]])

// This function will return a string inside HTML paragraph (<p>) tags.
// Attributes for the <p> tag may be supplied in the first argument.
// Any additional arguments will be included inside the opening and
// closing <p> tags, separated by newlines.

function paragraph ()
{
	static $_defaults = array(
		'values' => array()
		, 'allowed' => array('Common','align')
		, 'start' => NULL
	);
	static $_simple = array('values');
	$p = func_get_args();
	$p = parse_arguments($p, $_simple, $_defaults);
	$attlist = get_attlist($p);

	$output = "\n<p $attlist>\n";
	if ($p['start'] !== NULL)
	{
		return $output;
	}
	$output .= implode("\n",(array)$p['values'])
		.end_paragraph($p)
	;
	return $output;
}
?>
