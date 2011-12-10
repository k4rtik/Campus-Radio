<?php
function whereami($fields=NULL)
{
	$bt = debug_backtrace();
	array_shift($bt);
	if ($fields === NULL)
	{
		$fields = array('class','function','file','line');
	}
	$output = '';
	foreach ($bt as $f)
	{
		$output .= '<li>'
			. implode('::', array_key_value($f,$fields,NULL,'list'))
			. "\n";
	}
	return $output;
}
?>
