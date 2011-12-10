<?php
 
function get_attlist ($args=array(),$allowed=array())
{
	static $collections = NULL;
	static $collection_keys = NULL;
	if ($collections === NULL)
	{
		$collections = array(
			'Core' => array('class','id','title')
			, 'I18N' => array('xml:lang')
			, 'Events' => array('onclick','ondblclick','onmousedown'
				,'onmouseup','onmouseover','onmousemove','onmouseout'
				,'onkeypress','onkeydown','onkeyup'
			)
			, 'Style' => array('style')
		);
		$collections['Common'] = array_merge(
			$collections['Core']
			, $collections['Events']
			, $collections['I18N']
			, $collections['Style']
		);
		$collection_keys = array_keys($collections);
	}

	$args = (array)$args;
	$allowed = (array)$allowed;

	if (empty($allowed))
	{
		$allowed = array_key_value($args,'allowed',$collections['Common']);
	}
	$match_keys = array_intersect($allowed,$collection_keys);
	foreach ($match_keys as $k => $v)
	{
		array_splice($allowed, $k, 1, $collections[$v]);
	}
	array_key_remove($args, array_diff(array_keys($args),$allowed));

	$output = '';
	foreach ($args as $k => $v)
	{
		if ($v === NULL)
		{
			continue;
		}
		trace('k=', $k, ' v=', $v);
		$output .= ' '.$k;
		if ($v !== STANDALONE)
		{
			$output .= '="'.$v.'"';
		}
	}
	return $output;
}
?>
