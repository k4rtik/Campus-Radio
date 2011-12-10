<?php

function start_paragraph ()
{
	$p = func_get_args();
	$p[] = array('start'=>'yes');
	return call_user_func_array('paragraph', $p);
}
?>
