<?php
include('../access.php');
session_start();
include('../conf.php');


$p_name = 100;


if(!isset($_SESSION['uname'])) { header('Location: ../index.php'); }


$abc=$_SESSION['fid'];

$uname2=$_SESSION['uname'];

//echo $_SESSION['app_id'];





?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title>Sunrise Associates</title>

<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />

<link href="../style.css" rel="stylesheet" type="text/css" />

</head>

<body>

<?php  include('../include/header.php'); ?>

<?php 

include('../include/sidemenu.php'); 

?>


<?php   if(5==8) { ?>

<div align="center">
<br><br>
<table  width="40%">
<tr>

<td><b><span style="color:maroon;"> FIRM NAME : </span><span style="color:black;"> <?php echo strtoupper($_SESSION['fname'] ) ?> </span></b></td>
<td align="right">
<b><span style="color:maroon;">WELCOME:  </span><span style="color:black;"><?php echo strtoupper($uname2) ?></span></b></td>
</tr>
</table>


  <form id="form1" name="form1" method="post" action="broker_back.php">

    <div align="left">

      
<br><br>

              <table  border="1" style="border-collapse:collapse;" align="center" width="50%" cellpadding="7">

                
             <tr>


                    <td width="174" colspan =2  align = "center"><a href="../app/newuser_view.php" style="text-decoration:none;"><h5>
					FINANCIAL YEAR : 01/04/2015 TO 31/03/2016  , LAST ENTRY  DATE:<?php  echo $p_name ?></h5></a></td>

                    

                    </tr>
                 

                  <tr>

                    <td style="background-color:maroon" colspan="3"><h4 align="center" style="color:white;">ADMIN OPTIONS</h4></td>

                    </tr>

                  <tr>


                    <td width="174" colspan =2  align = "center"><a href="../app/newuser_view.php" style="text-decoration:none;"><h5>SHOW ALL FIRMS</h5></a></td>

                    

                    </tr>

                    <tr>

                    <td height="26"><a href="../app/user_reg_view.php" style="text-decoration:none;"><h5> New Inactive User </h5></a></td>

                    <td><a href="../app/showalluser.php" style="text-decoration:none;"> <h5>Show All User</h4></a></td>

                    

                    </tr>

                    <tr>

                    <td><a href="taxform_front.php" style="text-decoration:none;"><h5>ADD tax form</h5></a></td>

                    <td><a href="../app/user_reg_front.php" style="text-decoration:none;"><h5>Add new user</h5></a></td>

                   

                  

                  </tr>

				  <tr>

                    <td><a href="bankmaster_front.php" style="text-decoration:none;"><h5>ADD Accountin Group</h5></a></td>

                    <td><a href="bankmaster_view.php" style="text-decoration:none;"><h5>Show Accountin Group</h5></a></td>

                   

                  

                  </tr>

				  <tr>

                    <td><a href="voucher_front.php" style="text-decoration:none;"><h5>ADD Accounting Voucher Type</h5></a></td>

                    <td><a href="voucher_view.php" style="text-decoration:none;"><h5>Show Accounting Voucher Type</h5></a></td>

                   

                  

                  </tr>

                  <tr>   <td style="text-align:center" colspan="2"  ><a style="text-decoration:none;" href="../app/user_reg_edit.php?uid=<?php echo $_SESSION['app_id'] ?>"> <h5>CHANGE FIRM</h4></a></td> </tr>
				  

                    

                

              </table>

            </div>

           

    </div>
	
<?php }  ?>



 <p align="center" style="margin-top:0px; margin-top:-5px; margin-bottom:-230px">
 <img src="../img/main_center.jpg" width="100%" height="680" style="border:19px solid:black;"></p>


  </form>&nbsp;

</div>


</body>

</html>

