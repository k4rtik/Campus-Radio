<?php
// string secure_url ([string ref])

// This function will transform a local URL into an absolute URL pointing
// to a secure server running on the same domain.

function secure_url($ref='',$port=NULL)
{
	// leave this blank to use default port (i.e. leave unspecified)
	$ssl_port = '';
	if (empty($port))
	{
		$port = $ssl_port;
	}
	return make_url($ref, 'https', $port);
}

?>
