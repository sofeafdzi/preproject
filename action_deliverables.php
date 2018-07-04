<?php
//include db configuration file
include "webconfig.php";
$projectid = $_POST['projectid'];
$deliverables = $_POST['deliverables'];

$q = "
INSERT INTO deliverables
SET 
projectid = '$projectid', 
deliverables = '$deliverables'";

if (!mysql_query($q,$link))
{
	die('Error: ' . mysql_error());
}

$r = mysql_query("SELECT * FROM deliverables WHERE projectid = '$projectid'");
$no = mysql_num_rows($r);
?>

<tr id="<?php echo $no; ?>">
	<td width=3%><?php echo $no; ?></td>
	<td width=87%><?php echo $deliverables; ?></td>
	<td width=10%><a href="#" class="delete_deliverables" title="Delete"><font color="26B8F2"><strong>Delete</strong></font></a></td>
</tr>					