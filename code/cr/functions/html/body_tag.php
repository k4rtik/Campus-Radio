<?php

// string body_tag ([string src [,array attributes]])

// This function returns an HTML image tag (<img>). The first argument
// gives theURL of the image to be displayed. Additional attributes
// may be supplied as an array in the third argument.

function body_tag()
{
	static $_defaults = array(
		'bgcolor' => '#FFFFFF'
		, 'allowed' => array('Common','onload','onunload','link','alink'
			,'vlink','text','background','bgcolor'
		)
	);
	static $_simple = array();
	$p = func_get_args();
	$p = parse_arguments($p, $_simple, $_defaults);
	$attlist = get_attlist($p);
	if(!isset($GLOBALS['loginstatus'])) {
		$GLOBALS['loginstatus'] = '';
		}
	$output = <<<EOQ
<body $attlist>
<div id="wrap">
<div class="clearer">&nbsp;</div>
<div id="head">
<h1>NITC Campus Radio</h1>
</div>
<div class="nav">
	<ul>
		<li><a href="/cr/index.php">HOME<br /><span>radio</span></a></li>
		<li><a href="/cr/about.php">ABOUT<br /><span>the station</span></a></li>
		<li><a href="/cr/rjs.php">RJs<br /><span>radio jockeys</span></a></li>
		<li><a href="/cr/archive.php">ARCHIVE<br /><span>old shows</span></a></li>
		<li><a href="/cr/contact.php">CONTACT<br /><span>email and address</span></a></li>
		<li><div class="clearer">&nbsp;</div></li>
	</ul>
</div>
<div class="clearer">&nbsp;</div>
<div id="right">
	<div class="full">
		<h2>News & Announcements</h2>
		<p class="announce">Latest News Item</p>
		<p class="more"><a href="/cr/news.php">more news</a></p>
	</div><!--
	<div class="full">
		<h2>Vote On!</h2>
		<p class="poll">Current Poll</p>
		<p class="more"><a href="/cr/polls.php">more polls</a></p>
	</div>-->
	<div class="full">
		<h2>Links</h2>
		<ul class="links">
			<li>{$GLOBALS['loginstatus']}</li>
			<li><a href="/cr/user">User Area</a></li>
			<li><a href="http://www.facebook.com/pages/NITC-Campus-Radio/121741197902422">Facebook Page</a></li>
			<li><a href="http://validator.w3.org/check?uri=referer">XHTML 1.0 Strict</a></li>
			<li><a href="http://jigsaw.w3.org/css-validator/check/referer">Valid CSS</a></li>
		</ul>
	</div>
	<div class="clearer">&nbsp;</div>
</div>
<div id="main">
EOQ;
	return $output;
}
?>
