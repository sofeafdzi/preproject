<?php
include "webconfig.php";
if($_POST['id'])
{
$id=mysql_real_escape_string($_POST['id']);
$delete = "DELETE FROM reference WHERE id='$id'";
mysql_query( $delete);
}
?>