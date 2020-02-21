<?php

session_start();

if(!isset($_SESSION['uname'])) { header('Location: ../index.php'); }

if($_SESSION['securitylevel']!="ADMIN")

			{

				header('Location: ../index.php');

				}

				

				

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

<?php include('../include/header.php'); ?>

<?php 

include('../include/sidemenu.php'); 

?>

<div id="gutter"></div>

<div id="col1">

   <h2 align="center">Side Menu</h2>

  <?php include('../include/sidemenu.php');?>

  <p>&nbsp;</p>

  <p>&nbsp;</p>

  <p>&nbsp;</p>

  <p>&nbsp;</p>

  <p>&nbsp;</p>

  <p>&nbsp;</p>

  <p>&nbsp;</p>

</div>

<div id="col4">

  <h2 align="center"><span style="color:#F17327;">welcome <?php echo $uname2; ?></span></h2>

  <form id="form1" name="form1" method="post" action="broker_back.php">

    <div align="left">

      

       

          <tr>

            <td width="907" height="583"><div align="center">

              <table width="519" height="191" border="1">

                <tbody>

                 

                  <tr>

                    <td style="background-color:#39CDB4" height="40" colspan="3"><h2 align="center">ADMIN OPTIONS</h2></td>

                    </tr>

                  <tr>

                    <td width="241">  </td>

                    <td width="174"><a href="../app/newuser_view.php"><h5>Show Firm Information</h5></a></td>

                    

                    </tr>

                    <tr>

                    <td height="26"><a href="../app/user_reg_view.php"><h5> New Inactive User </h5></a></td>

                    <td><a href="../app/showalluser.php"> <h5>Show All User</h4></a></td>

                    

                    </tr>

                    <tr>

                    <td><a href="taxform_front.php"><h5>ADD tax form</h5></a></td>

                    <td><a href="../user_reg_front.php"><h5>Add new user</h5></a></td>

                   

                  

                  </tr>

				  <tr>

                    <td><a href="bankmaster_front.php"><h5>ADD Accountin Group</h5></a></td>

                    <td><a href="bankmaster_view.php"><h5>Show Accountin Group</h5></a></td>

                   

                  

                  </tr>

				  <tr>

                    <td><a href="voucher_front.php"><h5>ADD Accounting Voucher Type</h5></a></td>

                    <td><a href="voucher_view.php"><h5>Show Accounting Voucher Type</h5></a></td>

                   

                  

                  </tr>

                  <tr>   <td style="text-align:center" colspan="2"  ><a href="../app/user_reg_edit.php?uid=<?php echo $_SESSION['app_id'] ?>"> <h5>CHANGE FIRM</h4></a></td> </tr>
				  

                    

                </tbody>

              </table>

            </div>

            <p>&nbsp;</p></td>

          </tr>

    </div>

  </form>&nbsp;

</div>

<?php include('../include/footer.php');?>

</body>

</html>

