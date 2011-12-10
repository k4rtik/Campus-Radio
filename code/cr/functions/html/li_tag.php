<?php
function li_tag()
{
	static $_defaults = array(
		'text' => ''
		, 'allowed' => array('Common','type','value')
	);
	static $_simple = array('text');

	$p = func_get_args();
	trace('before parse: p=', $p);
	$p = parse_arguments($p, $_simple, $_defaults);
	trace('after parse: p=', $p);
	$attlist = get_attlist($p);

	if (is_array($p['text']) or is_object($p['text']))
	{
		$p['text'] = implode('',(array)$p['text']);
	}

	$output = " <li $attlist>{$p['text']}</li>\n";
	return $output;
}
?>
