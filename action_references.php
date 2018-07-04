<?php
//include db configuration file
include "webconfig.php";
$projectid = $_POST['projectid'];
$references = $_POST['references'];

$q = "
INSERT INTO reference
SET 
projectid = '$projectid', 
reference = '$references'";

if (!mysql_query($q,$link))
{
	die('Error: ' . mysql_error());
}

$r = mysql_query("SELECT * FROM reference WHERE projectid = '$projectid'");
$no = mysql_num_rows($r);
?>

<tr id="<?php echo $no; ?>">
	<td width=3%><?php echo $no; ?></td>
	<td width=87%><?php echo $references; ?></td>
	<td width=10%><a href="#" class="delete_references" title="Delete"><font color="26B8F2"><strong>Delete</strong></font></a></td>
</tr>					