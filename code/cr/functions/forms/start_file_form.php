<?php

function start_file_form()
{
	$p = func_get_args();
	$p[] = array('enctype' => 'multipart/form-data');
	return call_user_func_array('start_form',$p);
}

?>
