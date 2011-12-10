<?php
require_once('header.php');

print start_page('User Area');

?>
<ul>

<li><a href="#">Edit user information</a> (<em>Currently disabled</em>)</li>
<?php
if(has_role('rj')) {
	echo <<<EOQ
<li><a href="edit_profile.php?uid={$_SESSION['uid']}">Edit RJ profile</a></li>
EOQ;
}

if(has_role('manager') || has_role('admin')) {
?>
<li><a href="edit_shows.php">Show management</a></li>
<li><a href="edit_news.php">News management</a></li>
<!--<li><a href="edit_polls.php">Polls management</a></li>-->

<?php 
}
?>
</ul>

<?php

print end_page();

?>
