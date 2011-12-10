<?php
function push_handler($newvalue=0, $where=NULL)
{
	return set_handler($newvalue,$where,TRUE);
}
?>
