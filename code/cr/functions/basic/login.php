<?php
if (!isset($message) || empty($message))
{
	$message = 'Please enter your username and password to log in.';
}
if (!isset($username) || empty($username))
{
	if (isset($_SESSION['PHP_AUTH_USER']))
	{
		$username = $_SESSION['PHP_AUTH_USER'];
	}
	elseif (isset($_SERVER['PHP_AUTH_USER']))
	{
		$username = $_SERVER['PHP_AUTH_USER'];
	}
	else
	{
		$username = '';
	}
}
if (!isset($password) || empty($password))
{
	if (isset($_SESSION['PHP_AUTH_PW']))
	{
		$password = $_SESSION['PHP_AUTH_PW'];
	}
	elseif (isset($_SERVER['PHP_AUTH_PW']))
	{
		$password = $_SERVER['PHP_AUTH_PW'];
	}
	else
	{
		$password = '';
	}
}

print start_page('User Login');
?>

<form action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="POST">
<p><?php echo $message; ?></p>
<p>
Username: <input type="text" name="PHP_AUTH_USER" value="<?php echo $username; ?>"></p>
     
<p>Password: <input type="password" name="PHP_AUTH_PW" value="<?php echo $password; ?>"></p>
     
      <p><input type="submit" name="submit" value="Log In"></p>
</form>

<p>New user? <a href="#" >Register an account</a> (<em>Currently disabled</em>).</p>
<?php
print end_page();
?>