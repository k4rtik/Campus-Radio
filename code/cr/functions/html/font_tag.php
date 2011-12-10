<?php


// string font_tag ([int size [, string typeface [, array attributes]]])

// This function returns an HTML <font> tag. The default font size is
// 2, and the default font typeface is sans-serif. Additional attributes
// for the tag may be supplied as an array in the third argument.

function font_tag()
{
	static $_defaults = array(
		'size' => 2
		, 'face' => 'sans-serif'
		, 'allowed' => array('Common','color','face','size')
	);
	static $_simple = array('size');
	$p = func_get_args();
	$p = parse_arguments($p, $_simple, $_defaults);
	$attlist = get_attlist($p);
	$output = "<font $attlist>";

	return $output;
}

?>
