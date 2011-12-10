<?php
require_once('header.php');

print start_page('Contact Us');

$msg = <<<EOQ
Mail us at radionitc@gmail.com<br />
<br />
<h3>Concept and Idea</h3>
<address>
<strong>Aravindhan Sundar</strong><br />
aravindhansundar@gmail.com<br />
+91 99954 66039<br /><br />
<strong>Girish Kishnan</strong><br />
girishstar1@gmail.com<br />
+91 99467 07250<br /><br />
<strong>S Angappan Dinesh</strong><br />
+91 99956 07756
</address>
<p>&nbsp;</p>
<h3>Web Team</h3>
<address>
<strong>Kartik Singhal</strong><br />
kartiksinghal@gmail.com<br />
+91 97468 87377<br /><br />
<strong>Aviral Nigam</strong><br />
avi.1922@gmail.com<br />
+91 96336 30645<br /><br />
</address>
EOQ;

echo $msg;

echo paragraph(end_page())
;

?>