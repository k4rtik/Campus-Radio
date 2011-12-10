<?php
function nlecho()
{
	$args = func_get_args();
	echo '<li>';
	foreach ($args as $arg)
	{
		if (is_string($arg))
			echo $arg;
		else
			echo var_export($arg, TRUE);
	}
	echo "\n";
}
?>
