<?php
function start_page()
{
	static $_defaults = array(
		'title' => 'Examples'
	);
	static $_simple = array('title');
	$p = func_get_args();
	$p = parse_arguments($p, $_simple, $_defaults);
	extract($p);
	array_key_remove($p,array('_simple','_defaults'));
	$head = head_tag($p);
	array_key_remove($p,'title');
	$body = body_tag($p);
	if (!isset($page_header))
	{
		$page_header = page_title($title);
	}

	$output = '';
	if (!@include('start_page.php'))
	{
		$output = <<<EOQ
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
$head
$body
$page_header

EOQ;
	}
	return $output;
}

?>
