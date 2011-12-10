<?php

// string page_title ([string text of page title])

// This function returns an HTML <h2> tag. It is used for the titles
// of pages in our examples. The reason to 
// display these via a function, rather than just literal <h2> tags,
// is to enable you to change the format of in one
// place, instead of in each script.

function page_title($what='')
{
	return "<h2>$what</h2>\n";
}

?>
