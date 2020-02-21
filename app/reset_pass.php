<?php include('../conf.php');



session_start();

if(!isset($_SESSION['uname'])) { header('Location: ../index.php'); }

if($_SESSION['securitylevel']!="ADMIN")

			{

				header('Location: ../index.php');

				}

				





?>

<?php

if(isset($_POST['s'])) {
$password = trim(strip_tags(addslashes($_POST['pwd'])));
			$password = md5(hash("sha512", $password)); 
            $pwd = substr($password, 0, 15);


$uid = $_POST['uid'];

	$query = "UPDATE appuser SET  pwd='$pwd' WHERE uid='$uid'";


	if (!mysql_query($query,$connection))

  {

  die('Error: ' . mysql_error());

  }

   echo "<script>alert('User status updated successfully.');location.href='showalluser.php'</script>"; 

}



?>



<?php

try {

$query = "SELECT `uid`, `uname`, `pwd`, `username`, `fname`, `address`, `mobile`, `fid`, `securitylevel`, DATE_FORMAT(sdate,'%d/%m/%Y') as sdate, DATE_FORMAT(enddate,'%d/%m/%Y') as enddate, `status`, `newuser` FROM `appuser` WHERE uid=?";

$stmt = $dbc->prepare($query);

$stmt->bindParam(1, $_GET['uid']);

$stmt->execute();

$row=$stmt->fetch(PDO::FETCH_ASSOC);

$uname = $row['uname'];
$uid = $row['uid'];
$pwd = $row['pwd'];


} catch(PDOException $e) {

	echo "Error: " . $e->getMessage();

}

?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>

<head>

<title>Sunrise Associates</title>

<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />

<link href="../style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="../jquery-1.9.1.js"></script>



</head>

<body>

<?php include('../include/header.php'); ?>

<?php include('../include/sidemenu.php');?>

<div align="center">

  <form id="form1" name="form1" method="post" action=""  onSubmit="return ValidateForm()" >

    <div align="center">
	<br><br>
<h2 align="center"> Reset Password </h2>
    <table>

              <tr>

                <td width="708" height="202">
				<table width="816" height="104" border="0" frame="box" rules="none" cellpadding="10">

                <tr>

                 <td colspan="4" bgcolor="#14C4B6"><h4>Password Details</h4></td>

                </tr>

                <tr>

                    <td width="338"><div align="right">Enter New Password </div></td>

                  <td width="243"><input type="password"  name="pwd" />
				  <input type="hidden"  name="uid" id="uid"  value="<?php echo $uid; ?>" />
				  </td>

                    <td width="1">&nbsp;</td>

                     <td width="144">&nbsp;</td>
                </tr>

				

              </table>

       

              <p align="center">

                <input type="submit" name="s" id="submit2" value="Submit" />                

                

                </p>

            </td>

            

          </tr>

        </tbody>

        </table>

    </div>

  </form>
</div>


</body>

</html>

