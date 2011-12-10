<?php
// string regular_url ([string ref])

// This function will transform a local URL into an absolute URL pointing
// to a normal server running on the same domain, as defined by the global
// Apache variable HTTP_HOST. (Note: the server we are using runs on 
// non-standard ports, thus the need to change the port numbers.)

function regular_url($ref='',$port=NULL)
{
	// leave this blank to use default port (usually 80)
	$http_port = '';
	if (empty($port))
	{
		$port = $http_port;
	}
	return make_url($ref, 'http', $port);
}

?>
