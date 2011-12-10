submit a form with hidden field named 'myfield[1]':
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<input type="hidden" name="myfield[1]" value="1" >
<input type="submit">
</form>
<?php
function testit($a)
{
	static $tick = 1;
	echo "<li>test ", $tick++, ":\n";
	var_dump($a, array_key_exists(key($a), $a), empty($a[1]), empty($a['1']));
}
testit(array("1"=>"1"));
testit(array_flip(array(1=>"1")));
testit(array_combine(array('1'),array('1')));
if (!empty($_POST['myfield'])) { testit($_POST['myfield']); }
?>
