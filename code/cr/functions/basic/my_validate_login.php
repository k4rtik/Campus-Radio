<?php

function my_validate_login()
{
	static $_defaults = array(
		'username' => NULL
		, 'password' => NULL
		, 'table' => 'admin'
		, 'username_field' => 'username'
		, 'password_field' => 'password'
		, 'crypt_function' => 'password'
	);
	static $_simple = array('username','password','table');
	$args = func_get_args();
	$p = parse_arguments($args, $_simple, $_defaults);
	extract($p);

	$ok = FALSE;
	if (pg_ping())
	{
		$query = sprintf(
			"select 1 as ok from %s where %s = '%s' and %s = %s('%s')"
			, $table, $username_field, $username, $password_field
			, $crypt_function, $password
		);
		$result = @pg_query($query);
		if ($result)
		{
			list($ok) = pg_fetch_row($result);
			pg_free_result($result);
		}
	}
	return $ok;
}
?>
