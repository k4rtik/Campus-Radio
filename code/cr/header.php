<?php
ob_start();
require_once(dirname(__FILE__).'/cr.php');

// include the function definitions for this application
// (use a path from cr/ so the include will work if we're
// running a script in the admin directory)
//require_once('cr/lfunctions.php');

// connect to the database
pgsql_connect('crdb','crdbuser','crdbpass');


?>
