<?php

function make_url($ref='', $scheme='http', $port=NULL)
{
	$host = get_host();
	if ($port)
	{
		$host = substr($host, 0, strstr($host, ':')).':'.$port;
	}
	$url = $scheme.'://'.$host.get_local_ref($ref);
	return $url;
}

?>
