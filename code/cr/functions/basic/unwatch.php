<?php
function unwatch($files=array())
{
	call_user_func('watch', $files, FALSE);
}
?>
