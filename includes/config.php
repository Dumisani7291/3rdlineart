<!-- DB configuration-->
<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "password";
$mysql_database = "3rdlineart_db";
// $bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password)
$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database)
or die("Opps some thing went wrong");
// mysqli_select_db($mysql_database, $bd) or die("Opps some thing went wrong");
?>
