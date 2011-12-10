<?php
// string money ([mixed value])

// This function will format the first argument as a standard US dollars
// value, rounding any decimal value two decimal places for cents 
// and prepending a dollar sign to the returned string.

function money($val=0)
{
	return '$'.number_format(unmoney($val),2);
}
function unmoney($val=0)
{
	return (float)str_replace('$','',$val);
}


?>
