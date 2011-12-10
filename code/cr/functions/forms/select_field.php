<?php

// string select_field ([string name [, array items [, string default value]]])

// This function returns an HTML select field (a popup field).
// If the optional second argument is an array, each key in the array
// will be set to the value of an option of the select field, and
// the corresponding value from the array will be the displayed string
// for that option. If the key or the value from the array matches
// the optional third argument, that option will be designated as the default
// value of the select field.

function select_field ()
{
	static $_defaults = array(
		'values' => array()
		, 'name' => 'selectfield'
		, 'default' => NULL
		, 'match' => NULL
		, 'source' => NULL
		, 'label_match' => FALSE
		, 'format' => NULL
		, 'allowed' => array('Common','multiple','name','size','tabindex'
			,'disabled'
		)
	);
	static $_simple = array('name','values');
	$p = func_get_args();
	$p = parse_arguments($p, $_simple, $_defaults);
	$attlist = get_attlist($p);
	$output = "<select $attlist>\n";
	if ($p['match'] === NULL)
	{
		$p['match'] = get_field_value($p['name'],$p['default'],$p['match'],$p['source']);
	}
	unset($p['allowed']);

	$matchvalue = $p['match'];
	$matchlabel = 'NOMATCH'.time();
	if ($p['label_match'])
	{
		$matchlabel = $p['match'];
	}
	if ($p['format'] == 'minimal')
	{
		foreach ($p['values'] as $value => $label)
		{
			$output .= "<option value='$value'";
			if ($matchvalue == $value || $matchlabel == $label)
			{
				$output .= ' selected';
			}
 			$output .= ">$label</option>\n";
		}
	}
	else
	{
		$p['skip_selection'] = TRUE;
		array_key_remove($p,array('_defaults','_simple','allowed'));
		if (!is_array($p['values']))
		{
var_dump($p['values']);
		}
		foreach ($p['values'] as $p['value'] => $p['label'])
		{
			$p['selected'] = NULL;
			if ($matchvalue == $p['value'] || $matchlabel == $p['label'])
			{
				$p['selected'] = STANDALONE;
			}
			$output .= option_tag($p)."\n";
		}
	}
	$output .= "</select>\n";
	return $output;
}
?>
