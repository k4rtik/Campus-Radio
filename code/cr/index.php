<?php
require_once('header.php');

print start_page('Welcome');

echo <<<EOQ
<p>Welcome to the web portal of NIT Calicut's very own LAN based radio station.
 Completely run and maintained by students, more info about the campus radio can
  be found at <a href="about.php">About</a> page.</p>
<p>Here you will find the information about the shows, the RJs, news about latest events in the campus, and interesting polls.</p>
EOQ;

print subtitle('Schedule');
echo <<<EOQ
<p>Proposed schedule is 2 shows per week. The timings and exact schedule will be announced as soon as we get the setup ready.</p>
EOQ;

echo  end_page()
;
?>
