<?php

include "webconfig.php";

$projectid = $_POST['projectid'];
$date_pim = date('Y-m-d');

$target_pim = "upload/pim/";
$target_pim = $target_pim . basename( $_FILES['file_pim']['name']); 

move_uploaded_file($_FILES['file_pim']['tmp_name'], $target_pim);

if ($_FILES['file_pim'] != "") 
{
	$completion_status = "<font color=\"74E059\"><strong>Complete</strong></font>";
}
else
{
	$completion_status = "<font color=\"FF0000\"><strong>Incomplete</strong></font>";
}

$s = "SELECT * FROM pim WHERE projectid = '$projectid'";
$g = mysql_query($s);
while ($row = mysql_fetch_array($g))
{	
	$mark = $row['projectid'];
}


if($_POST['button'] == 'upload')
{
	if ($mark == "")
	{
		$q = "
		INSERT INTO pim
		SET 
		projectid = '$projectid', 
		target_pim = '$target_pim',
		date_pim = '$date_pim'
		";

		if (!mysql_query($q,$link))
		{
			die('Error: ' . mysql_error());
		}
	}
	else
	{
		$q = "
		UPDATE pim 
		SET 
		target_pim = '$target_pim',
		date_pim = '$date_pim'
		WHERE 
		projectid = '$projectid'
		";

		if (!mysql_query($q,$link))
		{
			die('Error: ' . mysql_error());
		}
	}	
	
	$q2 = "
	UPDATE project
	SET 
	pim_status = '$completion_status'
	WHERE
	projectid = '$projectid'
	";

	if (!mysql_query($q2,$link))
	{
		die('Error: ' . mysql_error());
	}

}


	


?>
<meta http-equiv="refresh" content="0;url=project.php" />