<?php
include("webconfig.php");

$projectid = $_GET["track"];

mysql_query("DELETE FROM project WHERE projectid = '$projectid'") or die(mysql_error());
mysql_query("DELETE FROM pi WHERE projectid = '$projectid'") or die(mysql_error()); 
mysql_query("DELETE FROM cir WHERE projectid = '$projectid'") or die(mysql_error()); 
mysql_query("DELETE FROM pvc WHERE projectid = '$projectid'") or die(mysql_error()); 
mysql_query("DELETE FROM proposal WHERE projectid = '$projectid'") or die(mysql_error()); 
mysql_query("DELETE FROM pvc WHERE projectid = '$projectid'") or die(mysql_error()); 
?>
<meta http-equiv="refresh" content="0;url=project.php?username=<?php echo $username; ?>" />