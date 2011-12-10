<?php
function array_key_remove(&$args=array(), $keys=array(),$replacement=NULL)
{
	$args = (array)$args;

	if (!is_array($keys))
	{
		$keys = array($keys);
	}
	trace('keys to find:', $keys);

	$argkeys = array_keys($args);
	trace('keys to be searched:', $argkeys);

	$match = array_intersect($argkeys, $keys);
	trace('keys to remove:', $match);

	$out = array();
	foreach ((array)$match as $k => $v)
	{
		trace("begin loop: k=$k v=",$v);
		$out[$v] = $args[$v];
		if ($replacement === NULL)
		{
			unset($args[$v]);
		}
		else
		{
			array_splice($args,$k,1,$replacement);
		}
		trace('after loop: args(k)=', (array_key_exists($v,$args) ? $args[$v] : "($v) not in args"));
	}
	trace('after splicing:', array_keys((array)$args));
	return $out;
}
?>
