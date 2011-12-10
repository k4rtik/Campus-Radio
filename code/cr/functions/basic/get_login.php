<?php
function get_login($realm='Secure Area',$message='Please login.')
{
	if (http_auth_ok())
	{
		// Send a WWW-Authenticate header, to perform HTTP authentication.
		Header("WWW-Authenticate: Basic realm=\"$realm\"");
		Header("HTTP/1.0 401 Unauthorized");

		// The user should only see this after hitting the 'Cancel' button
		// in the pop-up form.
		print $message;
		exit;
	}

	// Print out an HTML form to obtain a name and password for authentication.

	if (!empty($message))
	{
		$message = paragraph($message);
	}
	include('login.php');
	exit;
}
?>
