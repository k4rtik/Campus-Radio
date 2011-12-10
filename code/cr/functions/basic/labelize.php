<?php

function labelize ($in='')
{
	static $known_caps = ' URL DEA FBI XML ';
	$bits = preg_split(
		'/([\w]+[\']*[\w]+)/'
		, $in
		, -1
		, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY
	);
	$mixed = preg_match('/[a-z]/',$in) && preg_match('/[A-Z]/',$in);
	$out = '';
	foreach ($bits as $b)
	{
		if (preg_match('/[a-z]/i',$b))
		{
			if (stristr($known_caps," $b ") !== FALSE)
			{
				$b = strtoupper($b);
			}
			elseif ($mixed && preg_match('/^[A-Z][A-Z]/',$b))
			{
//print "<li>b is mixed case already, ($b), leave it alone.\n";
			}
			elseif (preg_match('/[aeiouy]/i',$b))
			{
				$b = ucwords(strtolower($b));
			}
			elseif (!$mixed)
			{
				$b = strtoupper($b);
			}
		}
		$out .= $b;
	}
	return $out;
}
?>
