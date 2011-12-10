<?php

function option_tag()
{
	static $_defaults = array(
		'value' => NULL
		, 'name' => 'selectfield'
		, 'label' => NULL
		, 'match' => NULL
		, 'default' => NULL
		, 'source' => NULL
		, 'label_match' => TRUE
		, 'skip_selection' => NULL
		, 'allowed' => array('Common','selected','value','disabled')
	);
	static $_simple = array('value','label','match');

	$p = func_get_args();
	$p = parse_arguments($p, $_simple, $_defaults);

	if ($p['label'] === NULL)
	{
		$p['label'] = labelize($p['value']);
	}
	if ($p['skip_selection'] === NULL && !array_key_exists('selected',$p))
	{
		if ($p['match'] === NULL)
		{
			$p['match'] = get_field_value(
				$p['name']
				, $p['default']
				, $p['match']
				, $p['source']
			);
		}
		$p['selected'] = NULL;
		if ($p['value'] == $p['match'] 
			|| ($p['label_match'] && $p['label'] == $p['match'])
		)
		{
			$p['selected'] = STANDALONE;
		}
	}
	$output = '<option '.get_attlist($p).'>'.$p['label']."</option>\n";
	return $output;
}

?>
