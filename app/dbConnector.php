<?php

class DbConnector {

var $theQuery;
var $link;

function DbConnector(){

        // Get the main settings from the array we just loaded
        $host = 'localhost';
        $db = 'mandi1';
        $user = 'root';
        $pass = '';

        // Connect to the database
        $this->link = mysql_connect($host, $user, $pass);
        mysql_select_db($db);
        register_shutdown_function(array(&$this, 'close'));

    }
	
  //*** Function: query, Purpose: Execute a database query ***
    function query($query) {

        $this->theQuery = $query;
        return mysql_query($query, $this->link);

    }

    //*** Function: fetchArray, Purpose: Get array of query results ***
    function fetchArray($result) {

        return mysql_fetch_array($result);

    }

    //*** Function: close, Purpose: Close the connection ***
    function close() {

        mysql_close($this->link);

    }
	
}

?>
<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "mandi1";
$connection = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die ('MySQL connect failed. ' . mysql_error());
mysql_select_db($mysql_database, $connection) or die('Cannot select database. ' . mysql_error());
?>
<?php
try {
$dbc = new PDO('mysql:host=localhost; dbname=mandi1', 'root', '');
} catch (PDOException $e) {
	echo "Error: " . $e->getMessage();
}
?>