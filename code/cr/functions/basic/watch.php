<?php

function watch($files=array(),$direction=TRUE)
{
	static $stack = array();
	foreach((array)$files as $file)
	{
		$stack[] = $file;
		if ($direction)
		{
			push_handler(get_constant($file), H_DEBUG);
		}
		else
		{
			pop_handler(get_constant($file), H_DEBUG);
		}
	}
}
?>
