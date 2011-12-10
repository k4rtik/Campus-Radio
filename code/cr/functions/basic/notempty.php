<?php
function notempty($v)
{
	$return = TRUE;
	switch (TRUE)
	{
		case is_string($v):
			$v = trim($v);
			$result = !empty($v);
			break;
		case is_array($v):
			$result = count($v) > 0 ? TRUE : FALSE;
			break;
		default:
			$result = !empty($v);
	}
	return $result;
}
?>
