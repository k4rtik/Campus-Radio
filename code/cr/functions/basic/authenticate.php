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

function authenticate(
	$realm = 'Restricted Area'
	, $message = 'Enter a valid name and password to access this area.'
)
{
	if (!isset($_SESSION))
	{
		if (PHP_SAPI != 'cli')
		{
			session_start();
		}
		else
		{
			global $_SESSION;
			$_SESSION = array();
		}
	}

// check if we can use HTTP authentication - as of now, that means checking
// if we are running as an Apache module

// $_SERVER['PHP_AUTH_USER'] and $_SERVER['PHP_AUTH_PW'] are values 
// supplied by PHP, corresponding to the user name and password the user has 
// entered in the pop-up window created by an HTTP authentication header. 
// If no authentication header has ever been sent, these variables will be 
// empty. If we are not using HTTP authentication, the login form will
// create entries in the $_POST superglobal with the same names.

	foreach (array('PHP_AUTH_USER','PHP_AUTH_PW') as $v)
	{
		if (!isset($_SESSION[$v]) or empty($_SESSION[$v]))
		{
			if (http_auth_ok())
			{
				$_SESSION[$v] = array_key_value($_SERVER,$v,'');
			}
			else
			{
				$_SESSION[$v] = array_key_value($_POST,$v,'');
			}
		}
	}

	$username = NULL;
	$uid=NULL;
	if (!empty($_SESSION['PHP_AUTH_USER']))
	{
// ignore case, even if PostgreSQL has been set to pay attention to it
		$query = "select name, uid from users
			where pass = sha1('{$_SESSION['PHP_AUTH_PW']}')
				and lower(name) = lower('{$_SESSION['PHP_AUTH_USER']}')
		";
		$result = pgsql_query($query);
		if ($row = pg_fetch_row($result))
		{
			$username = array_shift($row);
			$uid = array_shift($row);
		}
		pg_free_result($result);

// if the query ran but didn't find a match for the user name and password, 
// $found_user will not be set to anything. if this is so, have the user 
// try again.  

		if ($username == NULL)
		{ 
			$message .= <<<EOQ

<blockquote>Could not identify user <em>{$_SESSION['PHP_AUTH_USER']}</em> -
please check the username and password again.</blockquote>

EOQ;
			unset($_SESSION['PHP_AUTH_USER']);
			unset($_SESSION['PHP_AUTH_PW']);
		}
	}
	if ($username == NULL)
	{ 
		if (http_auth_ok())
		{
// Send a WWW-Authenticate header, to perform HTTP authentication.
			Header('WWW-Authenticate: Basic realm="'.$realm.'"');
			Header('HTTP/1.0 401 Unauthorized');

// The user should only see this after hitting the 'Cancel' button
// in the pop-up form.
			print $message;
			exit;
		}
		else
		{
// Print out an HTML form to obtain a name and password for authentication.

			if (!empty($message))
			{
				$message = paragraph($message);
			}
			include('login.php');
			exit;
		}
	// should never get here
		$private_error = 'authenticate: error: continued after requesting password';
		user_error('System error: please contact the system administrator.', E_USER_ERROR);
	}
	else
	{
		$GLOBALS['loginstatus'] = "<a href=\"/cr/user/logout.php\">Logout {$_SESSION['PHP_AUTH_USER']}</a>";
		$_SESSION['roles'] = array();
		$query = "SELECT role.name as role 
						from users_roles ur natural join users u, role
						where role.rid=ur.rid and u.name='{$_SESSION['PHP_AUTH_USER']}'
						order by role.name
		";
		$result = pgsql_query($query);
		$_SESSION['roles'] = pg_fetch_all_columns($result,0);
		$_SESSION['uid'] = $uid;
		//var_dump($_SESSION['uid']);
		pg_free_result($result);
	}
	return ($username);
}
?>
