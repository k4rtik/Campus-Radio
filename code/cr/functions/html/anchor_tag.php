<?php

// string anchor_tag ([string href [, string text [, array attributes]]])

// This function returns an HTML anchor tag (<a>).  The first argument
// be the URL to which the tag points, and the second argument will
// be the text of the tag. Additional attributes may be supplied as
// an array in the third argument.

function anchor_tag()
{
	static $_defaults = array(
		'href'=>''
		, 'text' => ''
		, 'value' => ''
		, 'allowed' => array('Common','accesskey','charset','href'
			,'hreflang','rel','rev','tabindex','type','name','target'
		)
	);
	static $_simple = array('href','value');

	$p = func_get_args();
	$p = parse_arguments($p, $_simple, $_defaults);

	if (empty($p['text']))
	{
		$p['text'] = $p['href'];
	}
	if (empty($p['value']))
	{
		$p['value'] = $p['text'];
	}
	
	$attlist = get_attlist($p);

	$output = "<a $attlist>{$p['value']}</a>";

	return $output;
}
?>
