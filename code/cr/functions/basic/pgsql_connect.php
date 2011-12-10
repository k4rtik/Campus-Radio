<?php
function pgsql_connect()
{
	static $_defaults = array(
		'hostname' => 'localhost'
		, 'username' => 'joeuser'
		, 'password' => 'resueoj'
		, 'database' => ''
	);
	static $_simple = array('database','username','password');
	$args = func_get_args();
	$p = parse_arguments($args, $_simple, $_defaults);
	$link = @pg_pconnect("host=${p['hostname']} dbname=${p['database']} user=${p['username']} password=${p['password']}"); //);
	if ($link === FALSE)
	{
		$private_error = 'pgsql_dbconnect: could not open connection to postgresql:'
			.'<li>error:'.pg_last_error()
		;
		error_log($private_error, 0);
		die('Error: could not connect to database. Please contact the system administrator.');
		exit;
	}
	return $link;
}
?>
