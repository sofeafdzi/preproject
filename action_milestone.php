<?php
//include db configuration file
include "webconfig.php";
$date_milestone = date('Y-m-d');
$projectid = $_POST['projectid'];
$date_milestone = $_POST['date_milestone'];
$milestone = $_POST['milestone'];

$q = "
INSERT INTO milestone
SET 
projectid = '$projectid', 
date_milestone = '$date_milestone',
milestone = '$milestone'";

if (!mysql_query($q,$link))
{
	die('Error: ' . mysql_error());
}

$r = mysql_query("SELECT * FROM milestone WHERE projectid = '$projectid'");
$no = mysql_num_rows($r);
?>

<tr id="<?php echo $no; ?>">
	<td width=3%><?php echo $no; ?></td>
	<td width=10%><?php echo $date_milestone; ?></td>
	<td width=77%><?php echo $milestone; ?></td>
	<td width=10%><a href="#" class="delete" title="Delete"><font color="26B8F2"><strong>Delete</strong></font></a></td>
</tr>					