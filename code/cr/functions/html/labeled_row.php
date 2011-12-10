<?php
function labeled_row($label=NULL,$value=NULL)
{
	return table_row(table_header_cell($label), table_cell($value));
}
?>
