<?php
function has_role($role='') {
	
if(in_array($role, $_SESSION['roles']))
	return true;
	}
?>