<?php

function db_validate_login()
{
	static $_defaults = array(
		'username' => NULL
		, 'password' => NULL
		, 'table' => 'admin'
		, 'username_field' => 'username'
		, 'password_field' => 'password'
		, 'crypt_function' => 'sha1'
		, 'extra' => NULL
	);
	static $_simple = array('username','password','table');
	extract($_defaults);
	$args = func_get_args();
	$p = parse_arguments($args, $_simple, $_defaults);
	extract($p, EXTR_IF_EXISTS);

	$ok = FALSE;
	$db = @db_connect();
	if ($db)
	{
		$query = 'select 1 as ok from ! where ! = ?  and ! = !(?)';
		$bind = array($table, $username_field, $username, $password_field
			, $crypt_function, $password
		);
		if (!empty($extra))
		{
			$query .= ' and !';
			$bind[] = $extra;
		}
		
		$ok = (bool)$db->getOne($query,$bind);
        if (!$ok)
            error_log($db->last_query);
	}
    else
    {
        error_log('could not connect to database');
    }
	return $ok;
}
?>
