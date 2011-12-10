<?php

// string start_form ([string action [, array attributes]])

// This function returns an HTML <form> tag. If the first argument
// is empty, the value of the predefined PHP variable PHP_SELF
// is used for the 'action' attribute of the <form> tag. Other
// attributes for the form can be specified in the optional second
// argument; the default method of the form is "post".

function start_form ()
{
	static $_defaults = array(
		'method' => 'POST'
		, 'enctype' => 'application/x-www-form-urlencoded'
		, 'allowed' => array('Common','accept','accept-charset','action'
			, 'method','enctype','target','name'
		)
	);
	static $_simple = array('action','method');
	$p = func_get_args();
	$p = parse_arguments($p, $_simple, $_defaults);
	$attlist = get_attlist($p);
	$output = "\n<form $attlist>\n";
	return $output;
}

?>
