<?php 
function charset($charset='',$mimetype='')
{
	if (empty($charset))
	{
		$charset = 'ISO-8859-1';
	}
	if (empty($mimetype))
	{
		$mimetype = 'text/html';
	}

	header("Content-Type: $mimetype; charset=$charset");
}
?>
