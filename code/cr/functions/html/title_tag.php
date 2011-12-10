<?php

// string title_tag ([string src [,array attributes]])

// This function returns an HTML image tag (<img>). The first argument
// gives theURL of the image to be displayed. Additional attributes
// may be supplied as an array in the third argument.

function title_tag()
{
	static $_defaults = array(
		'title' => 'Example'
		, 'value' => '$title'
		, 'allowed' => array('I18N')
	);
	static $_simple = array('title');

	$p = func_get_args();
	$p = parse_arguments($p, $_simple, $_defaults);
	$attlist = get_attlist($p);
	$title = make_page_title($p['title']);
	$output = "<title $attlist>$title - NITC Campus Radio</title>";
	return $output;
}
?>
