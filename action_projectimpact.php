<?php
//include db configuration file
include "webconfig.php";
$projectid = $_POST['projectid'];
$project_impact = $_POST['project_impact'];

$q = "
INSERT INTO project_impact
SET 
projectid = '$projectid', 
project_impact = '$project_impact'";

if (!mysql_query($q,$link))
{
	die('Error: ' . mysql_error());
}

$r = mysql_query("SELECT * FROM project_impact WHERE projectid = '$projectid'");
$no = mysql_num_rows($r);
?>

<tr id="<?php echo $no; ?>">
	<td width=3%><?php echo $no; ?></td>
	<td width=87%><?php echo $project_impact; ?></td>
	<td width=10%><a href="#" class="delete_projectimpact" title="Delete"><font color="26B8F2"><strong>Delete</strong></font></a></td>
</tr>					