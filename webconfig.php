 <?php
$host = "localhost"; //database location
$user = "root"; //database username
$pass = ""; //database password
$db_name = "preproject"; //database name

//database connection
$link = mysql_connect($host, $user, $pass);
mysql_select_db($db_name);
?>
