<?php
function array_key_value($arr='', $name='', $default='', $mode='list')
{
	// cast in case $arr is an object
	$arr = (array)$arr;
	if (!is_array($name))
	{
		if (array_key_exists($name,$arr))
			$default = $arr[$name];
		return $default;
	}
	$results = array();
	foreach ($name as $n)
	{
		if (array_key_exists($n,$arr))
		{
			$results[$n] = $arr[$n];
		}
		else
		{
			$results[$n] = $default;
		}
	}
	if ($mode == 'list')
	{
		return array_values($results);
	}
	return $results;
}
?>
