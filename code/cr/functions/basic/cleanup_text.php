<?php
// string cleanup_text ([string value [, string preserve [, string allowed_tags]]])

// This function uses the PHP function htmlentities() to convert
// special HTML characters in the first argument (e.g., &,",',<, and >) 
// to the equivalent HTML entities. If the optional second argument is empty,
// any HTML tags in the first argument will be removed. The optional
// third argument lets you specify specific tags to be spared from
// this cleansing. The format for the argument is "<tag1><tag2>".

function cleanup_text ($value='', $preserve='', $allowed_tags='')
{
	if (empty($preserve)) 
	{ 
		$value = strip_tags($value, $allowed_tags);
	}
	$value = htmlentities($value);
	return $value;
}

?>
