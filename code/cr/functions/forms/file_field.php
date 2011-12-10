<?php

// string file_field ([string name])

// This function returns an HTML file field. These are used to specify
// files on the user's local hard drive, typically for uploading as
// part of the form. (See http://www.zend.com/manual/features.file-upload.php
// for more information about this subject.)

function file_field ()
{
	static $_defaults = array(
		'type' => 'file'
		, 'name' => 'filefield'
		, 'allowed' => array('Common','name','type')
	);
	static $_simple = array('name');
	$p = func_get_args();
	$p = parse_arguments($p, $_simple, $_defaults);
	array_key_remove($p,array('_defaults','_simple'));
	return input_field($p);
}

?>
