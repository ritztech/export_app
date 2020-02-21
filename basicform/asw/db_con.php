<?php

$mysqli = @new mysqli('localhost',$mysql_user,$mysql_password,$mysql_database);

// Works as of PHP 5.2.9 and 5.3.0.
if ($mysqli->connect_error) {
    die('Connect Error: ' . $mysqli->connect_error);
}

?>