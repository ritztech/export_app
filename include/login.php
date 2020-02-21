<?php
	session_start();
    require('conf.php');
			
            //already logged in
        	if(isset($_SESSION['logedin'])){ header('Location: welcome.php'); }
		  
	         $uname = $_POST['uname'];
			 
	
            $result = mysql_query("SELECT * FROM appuser WHERE uname = '$uname'");

             $row = mysql_fetch_array($result);
	
                //checking if the $_post fields are empty
				
				
		        $pwd = $_POST['pwd'];
                $pwd = md5(hash("sha512", $pwd)); 
                $result = substr($pwd, 0, 15);

				
				
				
        	if($_POST['uname'] == '' || $_POST['pwd'] == ''){
				
        	echo '<div style="margin-top:80px;margin-left:35%;margin-right:auto;margin-bottom:20px;"> <h3>Invalid input</h3></div>';
			
        	}
			elseif($_POST['uname'] != $row['uname'] || $result != $row['pwd'])
			{
        	echo '<div style="margin-top:80px;margin-left:35%;margin-right:auto;margin-bottom:20px;"> <h3>Invlaid username or password</h3></div>';
        	}	
		    elseif ($enddate <= $exp_month)
             {
			 unlink("sample1_left.php");
            header('Location: expiary_page.php');      
              }
			  
			
			else{
        	$_SESSION['uname']=$row['name'];
			$_SESSION['auth']=$row['auth'];
			 //mysql_close($con);
			header('Location: welcome.php');} ?>