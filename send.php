<?php

include "webconfig.php";

$projectid = $_POST['projectid'];
$reviewer = $_POST['reviewer'];
$date_send = date('Y-m-d');

$q = "
		UPDATE project
		SET 
		reviewer = '$reviewer',
		date_send = '$date_send'
		WHERE 
		projectid = '$projectid'
		";

		if (!mysql_query($q,$link))
		{
			die('Error: ' . mysql_error());
		}

?>
<meta http-equiv="refresh" content="0;url=project.php" />