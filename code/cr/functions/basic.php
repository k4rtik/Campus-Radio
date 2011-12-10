<?php
/*
********************************************************
*** This script from MySQL/PHP Database Applications ***
***         by Jay Greenspan and Brad Bulger         ***
***                                                  ***
***   You are free to resuse the material in this    ***
***   script in any manner you see fit. There is     ***
***   no need to ask for permission or provide       ***
***   credit.                                        ***
********************************************************
*/

if (!defined('STANDALONE'))
	define('STANDALONE','STANDALONE'.time());

// utility functions
require_once('basic/check_timing.php');
require_once('basic/array_key_remove.php');
require_once('basic/array_key_value.php');
require_once('basic/is_assoc.php');
require_once('basic/get_constant.php');
require_once('basic/get_local_ref.php');
require_once('basic/nlecho.php');
require_once('basic/array_tonull.php');
require_once('basic/notempty.php');
require_once('basic/makepath.php');
require_once('basic/get_session_id.php');
require_once('basic/check_session.php');

// authentication
require_once('basic/authenticate.php');
require_once('basic/http_auth_ok.php');
require_once('basic/session_auth.php');
require_once('basic/read_login.php');
require_once('basic/logout.php');
require_once('basic/get_login.php');
require_once('basic/my_validate_login.php');
require_once('basic/db_validate_login.php');


// debugging and error handling functions
require_once('basic/error_levels.php');
require_once('basic/trace.php');
require_once('basic/watch.php');
require_once('basic/unwatch.php');
require_once('basic/dumpvar.php');
require_once('basic/debug_file.php');
require_once('basic/error_debugging.php');
require_once('basic/error_logging.php');
require_once('basic/error_handler.php');
require_once('basic/set_handler.php');
require_once('basic/push_handler.php');
require_once('basic/pop_handler.php');
require_once('basic/whereami.php');

// defensive and text handling functions
require_once('basic/charset.php');
require_once('basic/cleanup_text.php');
require_once('basic/reverse_cleanup_text.php');
require_once('basic/make_page_title.php');
require_once('basic/get_host.php');
require_once('basic/make_url.php');
require_once('basic/regular_url.php');
require_once('basic/secure_url.php');
require_once('basic/labelize.php');
require_once('basic/semivalidate_email.php');

// argument handling functions
require_once('basic/parse_arguments.php');
require_once('basic/defaults.php');
require_once('basic/set_defaults.php');

// PostgreSQL functions
require_once('basic/pgsql_connect.php');
require_once('basic/pgsql_query.php');

// miscellaneous functions
require_once('basic/money.php');
require_once('basic/states.php');
require_once('basic/countries.php');

// send out the character-set header
charset();

?>
