<?php
function parse_arguments($args=array(),&$simple=array(),&$defaults=array())
{
	$args = (array)$args;
	$simple = (array)$simple;
	$defaults = (array)$defaults;

	$key = NULL;
	$result = $defaults;
	$result['_defaults'] = $defaults;
	$result['_simple'] = $simple;

	$i = 0;

	$sc = count($simple);

	foreach ($args as $arg)
	{
		if ($arg === NULL || (is_array($arg) && count($arg) == 0))
		{
			// do nothing
		}
		elseif (is_object($arg))	
		{
			$result = array_merge($result, get_object_vars($arg));
		}
		elseif (is_assoc($arg))	
		{
			$result = array_merge($result, $arg);
		}
		else
		{
			if ($i < $sc)
			{
				$key = $simple[$i++];
				if (!empty($arg) || !isset($result[$key]))
				{
					$result[$key] = $arg;
				}
			}
			else
			{
				if ($key === NULL)
				{
					user_error("Argument '$arg' was passed with no available target - aborting...\n", E_USER_ERROR);
				}
				if (isset($result[$key]))
				{
					if (!is_array($result[$key]))
					{
						$result[$key] = array($result[$key]);
					}
					$result[$key][] = $arg;
				}
				else
				{
					$result[$key] = $arg;
				}
			}
		}
	}
	$defaults = array_merge($defaults, $result['_defaults']);
	$simple = $result['_simple'];
	return $result;
}
?>
