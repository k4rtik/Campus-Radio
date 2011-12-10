<?php
include('is_assoc.php');

//demo code - uncomment this and run the file with "php is_assoc.php"

$a = array(1,2,3);
print "<li>is ".var_export($a,TRUE)." an assoc? : ".(is_assoc($a) ? "Yes!" : "No :(")."\n";
$a = array('a'=>1,'b'=>2,'c'=>3);
print "<li>is ".var_export($a,TRUE)." an assoc? : ".(is_assoc($a) ? "Yes!" : "No :(")."\n";
$a = array('1'=>'a','2'=>'b','3'=>'c');
print "<li>is ".var_export($a,TRUE)." an assoc? : ".(is_assoc($a) ? "Yes!" : "No :(")."\n";
$a = array('a'=>1,'b'=>2,'c'=>3,'dog');
print "<li>is ".var_export($a,TRUE)." an assoc? : ".(is_assoc($a) ? "Yes!" : "No :(")."\n";
$a = array();
print "<li>is ".var_export($a,TRUE)." an assoc? : ".(is_assoc($a) ? "Yes!" : "No :(")."\n";
$a = array ( '_defaults' => array ( 'link' => 'purple', ), );
print "<li>is ".var_export($a,TRUE)." an assoc? : ".(is_assoc($a) ? "Yes!" : "No :(")."\n";

?>
