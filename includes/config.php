<!-- DB configuration-->
<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "g3n0typ3";
$mysql_database = "3rdlineart_db";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password)
or die("Opps some thing went wrong");
mysql_select_db($mysql_database, $bd) or die("Opps some thing went wrong");
?>
