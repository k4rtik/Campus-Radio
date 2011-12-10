<?php

function ul_list()
{
	static $_defaults = array(
		'values' => array()
		, 'contents' => NULL
		, 'allowed' => array('Common','compact','type')
	);
	static $_simple = array('values');
	$p = func_get_args();
	$p = parse_arguments($p, $_simple, $_defaults);
	$attlist = get_attlist($p);

	$output = "<ul $attlist>\n";

	if (!empty($p['values']) 
		&& !is_array($p['values']) 
		&& !is_object($p['values'])
	)
	{
		$output .= $p['values'];
	}
	else
	{
		array_key_remove($p,array('_defaults','_simple','allowed'));
		foreach ($p['values'] as $p['text'])
		{
			$output .= li_tag($p);
		}
	}
	$output .= $p['contents'];
	$output .= "</ul>\n";
	return $output;
}
?>
