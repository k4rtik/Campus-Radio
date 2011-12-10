<?php
function get_host()
{
	$host = array_key_value($_SERVER,'HTTP_HOST');
	if (empty($host))
	{
		$host = array_key_value($_SERVER,'SERVER_NAME');
	}
	if (empty($host))
	{
		$host = array_key_value($_SERVER,'HOST');
	}
	return $host;
}
?>
