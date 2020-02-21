<?php
$mysql_hostname = "localhost";
$mysql_user = "ritztech";
$mysql_password = "Sonali@123";
$mysql_database = "mandi";
$connection = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die ('MySQL connect failed. ' . mysql_error());
mysql_select_db($mysql_database, $connection) or die('Cannot select database. ' . mysql_error());
?>
<?php
try {
$dbc = new PDO('mysql:host=localhost; dbname=mandi', 'ritztech', 'Sonali@123');
} catch (PDOException $e) {
	echo "Error: " . $e->getMessage();
}
?>