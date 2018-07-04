<?php

include "webconfig.php";

$projectid = $_POST['projectid'];
$manager_status = $_POST['manager_status'];
$remarks = $_POST['remarks'];
$approval_date = date('Y-m-d');

$q = "
		UPDATE project
		SET 
		manager_status = '$manager_status',
		remarks = '$remarks',
		approval_date = '$approval_date'
		WHERE 
		projectid = '$projectid'
		";

		if (!mysql_query($q,$link))
		{
			die('Error: ' . mysql_error());
		}


?>
<meta http-equiv="refresh" content="0;url=manager.php" />