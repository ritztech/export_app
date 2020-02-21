
<?php
$host    = "localhost"; // Host name
$db_name = "retail";		// Database name
$db_user = "root";		// Database user name
$db_pass = "sudhir";			// Database Password


 $conn = mysql_connect($host,$db_user,$db_pass)or die(mysql_error());
         mysql_select_db($db_name,$conn)or die(mysql_error());

?>