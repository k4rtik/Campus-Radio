<?php

// string subtitle ([string text of subtitle])

// This function returns an HTML <h3> tag. It is used for the titles
// of secondary areas within pages in our examples. The reason to 
// display these via a function, rather than just literal <h3> tags,
// is to enable you to change the format of these subtitles in one
// place, instead of in each script.

function subtitle($what='')
{
	return "<h3>$what</h3>\n";
}
?>
