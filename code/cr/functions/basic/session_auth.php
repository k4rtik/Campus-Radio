<?php

// Require a valid username and password from the user.


// On Apache servers, because this function uses HTTP uses headers 
// to prompt the user for a name and password, it must be called 
// before any output - even a blank line or space - is sent to the browser. 
// the best practice is to call it with output buffering turned on:

//		ob_start();
//		$username = authenticate('My Application','Please log in.');
//		ob_end_flush();

// $realm is the label that will appear in the pop-up window that
// asks for name and address, or as the title of the form.
// $message is the text that will be displayed if the user hits the 'Cancel'
// button in the pop-up

function session_auth()
{
	static $_defaults = array(
		'realm' => 'Restricted Area'
		, 'message' => 'Enter a valid name and password to access this area.'
		, 'validate_function' => 'my_validate_login'
	);
	static $_simple = array('realm','message');
	$args = func_get_args();
	$p = parse_arguments($args, $_simple, $_defaults);
	unset($p['_defaults']);
	unset($p['_simple']);

	$ok = FALSE;
	$PHP_AUTH_USER = NULL;
	$PHP_AUTH_PW = NULL;

	check_session();
	if (!isset($_SESSION))
		global $_SESSION;

	trace('_SESSION = ', $_SESSION);

	if (!empty($p['session_logout_key']) && !empty($_SESSION[$p['session_logout_key']]))
	{
		$_SESSION[$_SERVER['PHP_SELF']]['force_login'] = TRUE;
		// force login
		// error_log("session_logout_key={$p['session_logout_key']} _SESSION[{$p['session_logout_key']}]={$_SESSION[$p['session_logout_key']]}");
		unset($_SESSION[$p['session_logout_key']]);
	}
	elseif (read_login())
	{
		// error_log("after read_login: _SESSION = ".var_export($_SESSION, TRUE));
		if (empty($_SESSION[$_SERVER['PHP_SELF']]['force_login']))
			extract($_SESSION, EXTR_IF_EXISTS);
		else
			$_SESSION[$_SERVER['PHP_SELF']]['force_login'] = FALSE;

		$p['username'] = $PHP_AUTH_USER;
		$p['password'] = $PHP_AUTH_PW;

		if (
			is_string($p['validate_function'])
			&& function_exists($p['validate_function'])
		)
		{
			// function OK
		}
		elseif (
			is_array($p['validate_function'])
			&& count($p['validate_function']) == 2
			&& method_exists(
				$p['validate_function'][0]
				, $p['validate_function'][1]
			)
		)
		{
			// object method - hokey doke
		}
		else
		{
			$private_error = 'No such thing as '
				. var_export($p['validate_function'],TRUE)
			;
			user_error('Error: could not validate login - please contact the system administrator', E_USER_ERROR);
			exit;
		}

		list($validate_function) = array_values(array_key_remove($p,'validate_function'));
		$ok = call_user_func($validate_function, $p);

		if (!$ok)
		{ 
			if (isset($p['error_message']))
			{
				$p['message'] .= $p['error_message'];
			}
			else
			{
				$p['message'] .= <<<EOQ

<li>Could not find entry for username ({$p['username']}) -
please try again.

EOQ;
			}
		}
	}
	if (!$ok)
	{
		unset($_SESSION['PHP_AUTH_USER']);
		trace('after unset of PHP_AUTH_USER: _SESSION=', $_SESSION);
		unset($_SESSION['PHP_AUTH_PW']);
		trace('after unset of PHP_AUTH_PW: _SESSION=', $_SESSION);
// error_log("calling get_login()");
		get_login($p['realm'], $p['message']);
		session_write_close();
		exit;
	}
	return $PHP_AUTH_USER;
}
?>
