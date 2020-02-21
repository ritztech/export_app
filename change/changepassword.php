<?php

include("../conf.php");

?>
<?php
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }
$fid=$_SESSION['fid'];
$uname=$_SESSION['uname'];
?>
<html>
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="styles.css" />

<script type="text/javascript">
function validatePassword() {
var pwd,newPassword,confirmPassword,output = true;

pwd = document.frmChange.pwd;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!pwd.value) {
	currentPassword.focus();
	document.getElementById("currentPassword").innerHTML = "required";
	output = false;
}
else if(!newPassword.value) {
	newPassword.focus();
	document.getElementById("newPassword").innerHTML = "required";
	output = false;
}
else if(!confirmPassword.value) {
	confirmPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "required";
	output = false;
}
if(newPassword.value != confirmPassword.value) {
	newPassword.value="";
	confirmPassword.value="";
	newPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "not same";
	output = false;
} 	
return output;
}
</script>
</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>

<div align="center">
  <h2>&nbsp;</h2>
 
    <h2 align="center"><span style="color:#F17327;">CHANGE PASSWORD</span></h2>
    
<?php

if(count($_POST)>0) {
	            $result = mysql_query("SELECT * FROM appuser WHERE uname = '$uname'");

             $row = mysql_fetch_array($result);
	
                //checking if the $_post fields are empty
				
				
		        $pwd = $_POST['pwd'];
                $pwd = md5(hash("sha512", $pwd)); 
                $result = substr($pwd, 0, 15);
				
if($result == $row["pwd"]) {	
	 $password = $_POST['newPassword'];
			$password = md5(hash("sha512", $password)); 
            $newPassword = substr($password, 0, 15);
mysql_query("UPDATE appuser set pwd='$newPassword' WHERE uname='$uname'");
$message = "Password Changed";
} else $message = "Current Password is not correct";
}
?>


<form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
<div>
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<table width="571" border="0">

<tr>
<td></td>
<td><label>Current Password</label></td>
<td><input type="password" name="pwd" class="txtField"/><span id="currentPassword"  class="required"></span></td>
</tr>
<tr><td></td>
<td><label>New Password</label></td>
<td><input type="password" name="newPassword" class="txtField"/><span id="newPassword" class="required"></span></td>
</tr><tr><td></td>
<td><label>Confirm Password</label></td>
<td><input type="password" name="confirmPassword" class="txtField"/><span id="confirmPassword" class="required"></span></td>
</tr>
<tr><td></td><td></td>
<td></td>
</tr>

<tr><td></td><td></td>
<td><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
</tr>
</table>
</div>
</form>

    <p align="center">&nbsp; </p>
    <p align="center">&nbsp;</p>
  <p>&nbsp;</p>
    <p>&nbsp;</p>
  </blockquote>
</div>
</body>
</html>
