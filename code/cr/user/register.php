<?php 

require_once(dirname(__FILE__).'/../header.php');
require_once(dirname(__FILE__).'/functions.php');

print start_page('New User Registration');

$submit = array_key_value($_POST,'submit');

if ($submit == 'Register!')
{

	$name = array_key_value($_POST,'name');
	$pass = array_key_value($_POST,'pass');
	$email = array_key_value($_POST,'email');
	$created = array_key_value($_POST,'created');
	$access = array_key_value($_POST,'access');

	$errmsg = create_user($name,$pass,$email,$created,$access);

	if (empty($errmsg)) 
	{ 
		print end_page();
		exit; 
	}
}
?>

<form method=post>

<table>

<?php 

print_input_fields('name','pass','email'); 

?>

</table>

<input type=submit name=submit value="Register!">
<input type=reset name=reset value="Start Over">

</form>

<?php

print end_page();

?>