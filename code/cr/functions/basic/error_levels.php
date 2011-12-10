<?php
function error_levels($error_level=NULL,$default=FALSE)
{
	static $error_levels = NULL;
	if ($error_levels === NULL)
	{
		$error_levels = array(
		E_ERROR => 'E_ERROR'
		, E_WARNING => 'E_WARNING'
		, E_PARSE => 'E_PARSE'
		, E_NOTICE => 'E_NOTICE'
		, E_CORE_ERROR => 'E_CORE_ERROR'
		, E_CORE_WARNING => 'E_CORE_WARNING'
		, E_COMPILE_ERROR => 'E_COMPILE_ERROR'
		, E_COMPILE_WARNING => 'E_COMPILE_WARNING'
		, E_USER_ERROR => 'E_USER_ERROR'
		, E_USER_WARNING => 'E_USER_WARNING'
		, E_USER_NOTICE => 'E_USER_NOTICE'
		, E_ALL => 'E_ALL'
	);
	}
	if ($error_level !== NULL)
	{
		return array_key_value($error_levels,$error_level,$default);
	}
	return $error_levels;
}
?>
