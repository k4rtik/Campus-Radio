<?php
// string get_local_ref ([string ref])


function get_local_ref($ref='')
{
	if (substr($ref,0,1) != '/')
	{
		$ref = dirname($_SERVER['PHP_SELF']).'/'.$ref;
	}
	return $ref;
}


?>
