<?php
function set_defaults(&$old_defaults=array(), &$args=array())
{
	if (is_assoc($old_defaults) and is_assoc($args))
	{
		$defaults = array();
		extract((array)array_key_remove($args, 'defaults', array()));
		if (count($defaults) > 0 && is_assoc($defaults))
		{
			$old_defaults = array_merge((array)$old_defaults, $defaults);
		}
	}
	return $old_defaults;
}

?>
