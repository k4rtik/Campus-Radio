 <?php
require_once('header.php');

print start_page('About');

$msg = <<<EOQ
This is web portal for the intranet based campus radio of NIT Calicut. The radio station seeks to:
EOQ;

echo paragraph($msg)
;
?>
<ul>
<li>Provide a common portal for exchange of ideas and views.</li>
<li>Showcase talent.</li>
<li>Update you with the latest trends in tech.</li>
<li>Discuss current affairs.</li>
<li>Gauge the pulse of the college - campus news et al.</li>
</ul>

<?php
$msg = <<<EOQ
With a healthy dose of good music!
EOQ;

echo paragraph($msg)
;

$msg = <<<EOQ

We're open to suggestions. If you are interested in the idea and want to contribute, <a href="contact.php">get in touch with us</a>.

EOQ;

echo paragraph($msg)
;

echo paragraph(end_page())
;

?>
