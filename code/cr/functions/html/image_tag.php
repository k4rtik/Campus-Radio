<?php

// string image_tag ([string src [,array attributes]])

// This function returns an HTML image tag (<img>). The first argument
// gives theURL of the image to be displayed. Additional attributes
// may be supplied as an array in the third argument.

function image_tag()
{
	static $_defaults = array(
		'src' => ''
		, 'alt' => ''
		, 'border' => 0
		, 'allowed' => array('Common','alt','height','width','longdesc'
			,'src','usemap','ismap','name','align','border','hspace','vspace'
		)
	);
	static $_simple = array('src');
	$p = func_get_args();
	$p = parse_arguments($p, $_simple, $_defaults);
	if (empty($p['alt']))
		$p['alt'] = $p['src'];
	$attlist = get_attlist($p);
	$output = "<img $attlist />";

	return $output;
}
?>
