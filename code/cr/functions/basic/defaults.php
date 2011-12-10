<?php
function defaults(&$defaults, $args='',$default='')
{
	if (is_string($args) && !empty($args))
	{
		return array_key_value($defaults,$args,$default);
	}

	if (is_array($args) || is_object($args))
	{
		$defaults = array_merge($defaults, (array)$args);
	}
	return $defaults;
}

?>
