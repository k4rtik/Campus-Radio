<?php 

$username = require_once('header.php'); 

print start_page('News Management');

if( !( has_role('manager') || has_role('admin') ) ) {
	echo <<<EOQ
Access Denied!<br />
EOQ;

header('Refresh: 5;URL=index.php');
echo("\n\nRedirecting...");
echo end_page();
}

else {
$submit = (string)array_key_value($_POST,'submit','');
$heading = cleanup_text((string)array_key_value($_POST,'heading',''));
$created = array_key_value($_POST,'created','');
$body = cleanup_text((string)array_key_value($_POST,'body',''));
$nid = (int)array_key_value($_REQUEST,'nid',0);
$uid = (int)$_SESSION['uid'];

if ($submit == 'Save')
{
	// update existing question or create new one

	$pgsql_heading = pg_escape_string($heading);
	$pgsql_created = $created;
	$pgsql_body = pg_escape_string($body);
	
	if(!empty($pgsql_heading))
	{
		
		if (!$nid)
		{
		$query = "insert into news_item (heading, uid, body, created)
					 values ('$pgsql_heading', '$uid', '$pgsql_body', '$pgsql_created') RETURNING nid";
		$result = pgsql_query($query);
		$insert_row = pg_fetch_row($result);
		$nid = $insert_row[0];
		}
		else
		{
		// if we do have a value in $nid, that means a record 
		// for this question already exists in the database.
		// update it.
		$query = "update news_item set (heading, created, body) =
		 ('$pgsql_heading', '$pgsql_created', '$pgsql_body') 
			where nid = $nid
		";
		$result = pgsql_query($query);
		}
		print subtitle("News item saved!");
		print "<hr>\n";
	}
	elseif(empty($pgsql_heading)) {
		print subtitle("News heading can't be empty!");
		print "<hr>\n";
	}
}
elseif ($submit == 'Delete News Item')
{
	// make administrator confirm the deletion.
	print paragraph(
		start_form(array('action'=>'edit_news.php'))
		, "Delete news item $nid - '$heading'?<br>"
		, hidden_field(array('name'=>'nid', 'value'=>$nid))
		, submit_field(array('name'=>'submit', 'value'=>'Yes, sure!'))
		, submit_field(array('name'=>'submit', 'value'=>'Whoops, no!'))
		, end_form()
	);
	print end_page();
	exit;
}
elseif ($submit == 'Yes, sure!')
{

	pgsql_query('delete from news_item where nid = '.$nid);

	print subtitle("Deleted news item {$nid}!");
	print "<hr>\n";
}

	// as the ID of a user is passed in, retrieve its information
	// from the database for editing.
	
if (!empty($submit)) { $nid = ''; }

if (empty($nid))
{
	// if no particular question is identified, print out a list of 
	// existing questions as links back to this page for editing.

	$nid = '';
	print subtitle('List of News Items');
	$result = pgsql_query('select nid, heading from news_item order by nid desc');
	$lines = array();
	while (list($nid,$heading) = pg_fetch_row($result))
	{
		$lines[] = anchor_tag('edit_news.php?nid='.$nid,$heading).'<br>';
	}
	pg_free_result($result);
	print paragraph($lines);

	// set the $question variable to an empty string, since the
	// form should be empty for creating a new question. ($question
	// would have a value if we had saved or deleted a question
	// above.)
	$heading = '';
	$body = '';

	// set the form heading to indicate the action the user can perform
	$sform_heading = 'Add A News Item';
}
else 
{
	// if the ID of a question is passed in, retrieve its information
	// from the database for editing.
	extract(fetch_news_item($nid));

	// set the form heading to indicate the action the user can perform
	$sform_heading = 'Edit A News Item : #'.$nid;
}

print subtitle($sform_heading);

print start_form('edit_news.php');

print paragraph(
 'Heading: *'
 , text_field(array(
    'name'=>'heading','value'=>$heading,'size'=>20
 ))
 );  print paragraph(
 '<br />Body:'
 , textarea_field(array(
    'name'=>'body','value'=>$body
 ))
 , hidden_field(array(
    'name'=>'created', 'value'=>time()
 ))
 );  

if (empty($nid))
{
	$delete_button = '';
}
else
{
	$delete_button = submit_field('Delete News Item');
}

print paragraph(
	submit_field('Save')
	, $delete_button
);

if (!empty($nid))
{
	print paragraph(
		anchor_tag('edit_news.php', 'Return to News List')
	);
}
echo end_form(), end_page();

}

?>