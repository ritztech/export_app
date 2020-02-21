<?php
session_start();

    
			
  $aname=$_SESSION['uname'];
  
  require 'conf.php';

			  


if(isset($_SESSION['uname']))
  unset($_SESSION['uname']);
  session_destroy();
  
  //header('Location: report/my_export_script.php');
  
    header('Location: index.php');

?>