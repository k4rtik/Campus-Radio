<?php

function get_field_value($name='',$default='',$value=NULL,$source=NULL)
{
	if ($value !== NULL)
		return $value;

	if (empty($name))
		return $default;

	if ($source === NULL)
		$source =& $_REQUEST;

	$i = strpos($name,'[');
	if ($i === FALSE)
		return array_key_value($source,$name,$default);

	$prefix = substr($name,0,$i);
	$suffix = substr($name,$i);
	$suffix = preg_replace('/\[([^\]]*[a-z][^\]]*)\]/', '["$1"]', $suffix);
	$$prefix = array_key_value($source,$prefix,$default);
	if (is_array($$prefix))
		$$prefix = array_combine(array_keys($$prefix), array_values($$prefix));
	$whole = $prefix.$suffix;
	if (is_array($$prefix))
	{
		$expr = '$value = isset($'.$whole.') ? $'.$whole.' : $default;';
		eval($expr);
	}
	else
	{
		$value = $$prefix;
	}
	return $value;
}
?>
