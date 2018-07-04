<?php

include "webconfig.php";

$projectid = $_POST['projectid'];
$title = $_POST['title'];
$username = $_POST['username'];
$date_created = date('Y-m-d');
	
$q = "
INSERT INTO project 
SET 
projectid = '$projectid', 
title = '$title', 
username = '$username', 
date_created = '$date_created',
pi_status = '<font color=\"FF0000\"><strong>Incomplete</strong></font>',
cir_status = '<font color=\"FF0000\"><strong>Incomplete</strong></font>',
pvc_status = '<font color=\"FF0000\"><strong>Incomplete</strong></font>',
proposal_status = '<font color=\"FF0000\"><strong>Incomplete</strong></font>',
pim_status = '<font color=\"FF0000\"><strong>Incomplete</strong></font>'
";


if (!mysql_query($q,$link))
{
	die('Error: ' . mysql_error());
}

?>
<meta http-equiv="refresh" content="0;url=project.php" />