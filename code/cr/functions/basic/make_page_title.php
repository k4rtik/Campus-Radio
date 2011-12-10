<?php
// string make_page_title ([string title])

// This function will clean up a string to make it suitable for use
// as the value of an HTML <TITLE> tag, removing any HTML tags and
// replacing any HTML entities with their literal character equivalents.

function make_page_title ($title='')
{
	return reverse_cleanup_text(cleanup_text($title));
}


?>
