<?php

// string head_tag ([string src [,array attributes]])


function head_tag()
{
	static $_defaults = array(
		'contents' => ''
		, 'allowed' => array('I18N','profile')
	);
	static $_simple = array();
	$p = func_get_args();
	$p = parse_arguments($p, $_simple, $_defaults);
	$attlist = get_attlist($p);
	if (stristr($p['contents'],'<title') === FALSE)
	{
		$p['contents'] .= "\n".title_tag($p)."\n";
	}

	$output = <<<EOQ
<head $attlist>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="NIT Calicut's very own radio station - NITC Campus Radio, an LAN based radio station for the whole campus." />
<meta name="keywords" content="nitc, radio station, campus radio, lan radio, NIT Calicut" />
<link rel="stylesheet" type="text/css" href="/cr/theme/style.css" media="screen" title="style (screen)" />
<style type="text/css">

 .ui-timepicker-div .ui-widget-header{ margin-bottom: 8px; }
 .ui-timepicker-div dl{ text-align: left; }
 .ui-timepicker-div dl dt{ height: 25px; }
 .ui-timepicker-div dl dd{ margin: -25px 0 10px 65px; }
 .ui-timepicker-div td { font-size: 90%; }
</style>
<script type="text/javascript" src="/cr/jquery/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="/cr/jquery/jquery-ui-1.8.6.custom.min.js"></script>
<script type="text/javascript" src="/cr/jquery/jquery-ui-timepicker-addon.js"></script>


{$p['contents']}
</head>
EOQ;
	return $output;
}
?>
