<?php

// string start_table ([array attributes])


// This function returns an opening HTML <table> tag.
// Attributes for the table may be supplied 
// as an array.

function start_table ()
{
	static $_defaults = array(
		'cellspacing' => 0
		, 'cellpadding' => 1
		, 'allowed' => array('Common','border','cellpadding','cellspacing'
			,'datapagesize','frame','rules','summary','width','align','bgcolor'
		)
	);
	static $_simple = array('width');
	$p = func_get_args();
	$p = parse_arguments($p, $_simple, $_defaults);
	$attlist = get_attlist($p);
	$output = "\n<table $attlist>\n";
	return $output;
}

?>
