<?php
function dumpvar($var, &$vlist='',$tick=0)
{
	if (!is_array($vlist))
	{
		$vlist = array();
	}
	if (empty($var))
	{
		$output = "(empty)\n";
	}
	elseif (!is_array($var) && !is_object($var))
	{
		$output = "<xmp>$var</xmp>";
	}
	else
	{
		$output = "(var is ".gettype($var).")<ul>\n";
		foreach ((array)$var as $k => $v)
		{
			if (preg_match('/^(GLOBALS|HTTP_|_)/',$k))
			{
				continue;
			}
//echo '<hr>k:',var_dump($k), 'v:', var_dump($v) ;
//echo '<hr>vlist:', var_dump($vlist);
			if (array_key_exists($k,$vlist) && $vlist[$k] === $v)
			{
				// nothing - we've already seen this
				// you can uncomment this line if you're suspicious
				$output .= "<li>k=($k) already displayed\n";
			}
			else
			{
				$vlist[$k] = $v;
				$output .= "\n<li>k=($k)\nv=(".dumpvar($v,$vlist,$tick++).")\n";
			}
		}
		$output .= "</ul>\n";
	}
	return $output;
}
?>
