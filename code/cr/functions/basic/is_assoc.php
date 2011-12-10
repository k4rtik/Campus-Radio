<?php
function is_assoc($a)
{
	if (is_object($a))
		return TRUE;
	if (empty($a))
		return FALSE;
	if (!is_array($a))
		return FALSE;
	$k = array_keys($a);
	return ($k !== array_keys($k));
}
?>
