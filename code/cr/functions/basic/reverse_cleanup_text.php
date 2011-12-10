<?php
function reverse_cleanup_text($value)
{
	static $reverse_entities = NULL;
	if ($reverse_entities === NULL)
	{
		$reverse_entities = array_flip(
			get_html_translation_table(HTML_ENTITIES)
		);
	}
	return strtr($value,$reverse_entities);
}
?>
