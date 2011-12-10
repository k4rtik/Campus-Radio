<?php

function semivalidate_email ($email='')
{
	$email = (string)$email;
	return preg_match(
		'/^[a-z0-9\=\_\.\-]+@[a-z0-9\\._\-]+\.[a-z]{2,4}$/i'
		, $email
	);
}
?>
