        	<?php
            require('conf.php');
			session_start();
					//  code for database backup   start						$t_date = date("dmY");			$result1 = mysql_query("SELECT `bck_date` FROM `db_bck`");            $row1 = mysql_fetch_array($result1);			$bck_date = $row1['0'];			if($t_date != $bck_date )			{						include('db_backup_scr.php');							$sqlupd1="UPDATE `db_bck` SET `bck_date`='$t_date'";                        if (!mysql_query($sqlupd1,$connection))	               {            die('Error: ' . mysql_error());                } 							}				       // code for database backup   end		   
        	//already logged in
        	if(isset($_SESSION['logedin'])){ header('Location: index.php'); }
	        $uname = $_POST['uname'];
            $result = mysql_query("SELECT `uid`, `uname`, `pwd`, `username`, `address`, `mobile`, `securitylevel`, DATE_FORMAT(sdate,'%d/%m/%Y') as sdate, DATE_FORMAT(enddate,'%d-%m-%Y') as enddate, `status`, `newuser`, `fid`,fname FROM `appuser` WHERE uname = '$uname'");
             $row = mysql_fetch_array($result);
			// echo $row;
			
			 $pwd=$row['pwd'];
			 $uname=$row['uname'];
			 $username=$row['username'];
			 $enddate=$row['enddate'];			
			 $status=$row['status'];
			 $fid=$row['fid'];
			

		  
		 
				 //checking if the $_post fields are empty
				
				
		       $upaswd1 = $_POST['pwd'];
			   $uname1 =$_POST['uname'];
			   
			   
               $password1 = md5(hash("sha512", $upaswd1)); 
              
			   $passwd2 = substr($password1, 0, 15);
			  
				
			 //checking if the $_post fields are empty
        	if($uname1== '' || $upaswd1 == ''){
				echo "<script>alert('Invalid input');location.href='index.php'</script>";
        	}
			elseif($uname1 != $uname || $passwd2 != $pwd){
				
				echo "<script>alert('Invlaid username or password');location.href='index.php'</script>";
        	}
			
			else if($status=='INACTIVE')
			{
				echo "<script>alert('YOU ARE NOT AUTHORIZED FOR THIS APPLICATION');location.href='index.php'</script>";
				
				}
				
				
			else{
				
				
				
               $_SESSION['uname']=$row['uname'];
			   $_SESSION['securitylevel']=$row['securitylevel'];
			   $_SESSION['fid']=$fid; 
			   $_SESSION['fname'] = $row['fname'];
			   $_SESSION['app_id'] = $row['uid'];
			  // echo $_SESSION['app_id'];
		      $result_ddetails = mysql_query("SELECT `firmname`,`officeadd`,`cstno` FROM `firmcreation` WHERE  fid=$fid");              $row_fdetails = mysql_fetch_array($result_ddetails);	   			                  $_SESSION['myfirmnameeee']=$row_fdetails['firmname'];				 $_SESSION['myfirmaddress']=$row_fdetails['officeadd'];				  $_SESSION['myfirlutdetails']=$row_fdetails['cstno'];
			   
			   
			  // echo  $_SESSION['fid'];}
			  
			  $abc=$row['fname'];
			  $bcd=$row['uname'];
			  
			  $in_time=date("d/m/Y");
			  
			
			mysql_close($connection);
			if($_SESSION['securitylevel']=="ADMIN")
			{
				echo '<script>window.location="basicform/welcome1.php"</script>';
				
				}
				else{
        	echo '<script>window.location="basicform/welcome.php"</script>';
			
			}
			} 
			
			
			?>
