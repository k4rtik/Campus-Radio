<?php 


$username = require_once('header.php'); 

print start_page('Edit RJ Profile');

if(!has_role('rj')) {
	echo <<<EOQ
Access Denied. You are not an RJ!<br />
EOQ;

header('Refresh: 5;URL=index.php');
echo("\n\nRedirecting...");
echo end_page();
}
elseif($_REQUEST['uid'] == NULL) {
	header('Location: index.php');
	}
else{
$submit = (string)array_key_value($_POST,'submit','');
$fname = cleanup_text((string)array_key_value($_POST,'fname',''));
$lname = cleanup_text((string)array_key_value($_POST,'lname',''));
$about = cleanup_text((string)array_key_value($_POST,'about',''));
$phone = cleanup_text((string)array_key_value($_POST,'phone',''));
$fbprofile = cleanup_text((string)array_key_value($_POST,'fbprofile',''));
$uid = (int)array_key_value($_REQUEST,'uid',0);

if ($submit == 'Save Changes')
{
	// update existing question or create new one

	$pgsql_fname = pg_escape_string($fname);
	$pgsql_lname = pg_escape_string($lname);
	$pgsql_about = pg_escape_string($about);
	$pgsql_phone = pg_escape_string($phone);
   $pgsql_fbprofile = pg_escape_string($fbprofile);
   
if($pgsql_fname != '') {	
	if (!fetch_profile($uid))
	{
		$query = "insert into profile (uid, fname, lname, about, phone, fbprofile)
					 values (${uid}, '$pgsql_fname', '$pgsql_lname', '$pgsql_about', '$pgsql_phone', '$pgsql_fbprofile') RETURNING uid";
		$result = pgsql_query($query);
		$insert_row = pg_fetch_row($result);
		$uid = $insert_row[0];
	}
	else
	{
		// if we do have a value in $uid, that means a record 
		// for this question already exists in the database.
		// update it.
		$query = "update profile set (fname, lname, about, phone, fbprofile) =
		 ('$pgsql_fname', '$pgsql_lname', '$pgsql_about', '$pgsql_phone', '$pgsql_fbprofile') 
			where uid = $uid
		";
		$result = pgsql_query($query);
	}
		print subtitle("Changes saved!");
	print "<hr>\n";
	}
	else {
				print subtitle("First Name can't be empty!");
	print "<hr>\n";

		}
}
elseif ($submit == 'Delete Profile')
{
	// make administrator confirm the deletion.
	print paragraph(
		start_form(array('action'=>'edit_profile.php'))
		, "Delete your RJ profile?<br>"
		, hidden_field(array('name'=>'uid', 'value'=>$uid))
		, submit_field(array('name'=>'submit', 'value'=>'Yes, sure!'))
		, submit_field(array('name'=>'submit', 'value'=>'Whoops, no!'))
		, end_form()
	);
	print end_page();
	exit;
}
elseif ($submit == 'Yes, sure!')
{

	pgsql_query('delete from profile where uid = '.$uid);

	print subtitle("Deleted RJ profile!");
	print "<hr>\n";
}

	// as the ID of a user is passed in, retrieve its information
	// from the database for editing.
	extract(fetch_profile($uid));



print start_form('edit_profile.php');

print paragraph(
 'First Name: *'
 , text_field(array(
    'name'=>'fname','value'=>$fname,'size'=>20
 ))
 ); print paragraph(
 '<br />Last Name:'
 , text_field(array(
    'name'=>'lname','value'=>$lname,'size'=>20
 ))
 ); print paragraph(
 '<br />About Me:'
 , textarea_field(array(
    'name'=>'about','value'=>$about
 ))
 );  print paragraph(
 '<br />Phone:'
 , text_field(array(
    'name'=>'phone','value'=>$phone,'size'=>20
 ))
 );   print paragraph(
 '<br />Facebook Profile:'
 , text_field(array(
    'name'=>'fbprofile','value'=>$fbprofile,'size'=>40
 ))
 , hidden_field(array(
    'name'=>'uid', 'value'=>$_SESSION['uid']
 ))
);

	$delete_button = submit_field('Delete Profile');

print paragraph(
	submit_field('Save Changes')
	, $delete_button
);

echo end_form(), end_page();
}
?>
