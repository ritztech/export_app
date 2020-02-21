<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "mandi";
$connection = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die ("Please check your connection");
mysql_select_db($mysql_database, $connection) or die("Please check your database");
?>