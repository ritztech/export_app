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
$uname = $_POST['uname'];
$username = $_POST['username'];
$address = $_POST['address'];
$mobile = $_POST['mobile'];
$securitylevel = $_POST['securitylevel'];
$sdate = $_POST['sdate'];
$enddate = $_POST['enddate'];
$status = $_POST['status'];
$uid = $_POST['uid'];
$fid = $_POST['fiddd'];

    
	
	$query = "SELECT firmname  from firmcreation WHERE fid=$fid";
$stmt = $dbc->prepare($query);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$fnnname = $row['firmname'];

    



	$query = "UPDATE appuser SET
    username='$username',
    address='$address',
    mobile='$mobile',
    securitylevel='$securitylevel',
    sdate=STR_TO_DATE('$sdate','%d/%m/%Y'),
    enddate=STR_TO_DATE('$enddate','%d/%m/%Y'),
    status='$status',
    newuser='OLD',
	fid=$fid,
	fname = '$fnnname'
    WHERE uid='$uid'";
//	mysql_query($query);
	

	//echo $query;
	


   
	

	if (!mysql_query($query,$connection))
  {
  die('Error: ' . mysql_error());
  }

  
  $result1 = mysql_query("SELECT fname from appuser    where fid = $fid");

$row1 = mysql_fetch_array($result1);
   $_SESSION['fname'] = $row1[0]; 
   $_SESSION['fid']=$fid;
   
   
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
$pwd = $row['pwd'];
$username = $row['username'];
$address = $row['address'];
$mobile = $row['mobile'];
$fid = $row['fid'];
$securitylevel = $row['securitylevel'];
$sdate = $row['sdate'];
$enddate = $row['enddate'];
$status = $row['status'];
$newuser = $row['newuser'];
$uid = $row['uid'];
$fname = $row['fname'];
$fidd = $row['fid'];


if ($sdate == "00/00/0000") {	$sdate = " ";}
if ($enddate == "00/00/0000") {	$enddate = " ";}

} catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../jquery-1.9.1.js"></script>
<script type="text/javascript">


function ValidateForm(){
		
	   
 if( document.form1.fiddd.value == 0 )
   {
     alert( "Please assign a firm!" );
     document.form1.fiddd.focus() ;
     return false;
   }
   
  

return true 

}



function phappycode(){
document.form1.securitylevel.value = document.form1.securitylevel1.value;
}

function phappycode1(){
document.form1.status.value = document.form1.status1.value;
}


function phappycode2(){
document.form1.fiddd.value = document.form1.fid.value;
}



$(document).ready(function(){
	$('#username').keyup(function(){ // Keyup function for check the user action in input
		var Username = $(this).val(); // Get the username textbox using $(this) or you can use directly $('#username')
		var UsernameAvailResult = $('#username_avail_result'); // Get the ID of the result where we gonna display the results
		if(Username.length > 2) { // check if greater than 2 (minimum 3)
			UsernameAvailResult.html('Loading..'); // Preloader, use can use loading animation here
			var UrlToPass = 'action=username_availability&username='+Username;
			$.ajax({ // Send the username val to another checker.php using Ajax in POST menthod
			type : 'POST',
			data : UrlToPass,
			url  : 'checker.php',
			success: function(responseText){ // Get the result and asign to each cases
				if(responseText == 0){
					UsernameAvailResult.html('<span class="success">Username name available</span>');
				}
				else if(responseText > 0){
					UsernameAvailResult.html('<span class="error">Username already taken</span>');
				}
				else{
					alert('Problem with sql query');
				}
			}
			});
		}else{
			UsernameAvailResult.html('Enter atleast 3 characters');
		}
		if(Username.length == 0) {
			UsernameAvailResult.html('');
		}
	});
	
	$('#password, #username').keydown(function(e) { // Dont allow users to enter spaces for their username and passwords
		if (e.which == 32) {
			return false;
  		}
	});
	$('#password').keyup(function() { // As same using keyup function for get user action in input
		var PasswordLength = $(this).val().length; // Get the password input using $(this)
		var PasswordStrength = $('#password_strength'); // Get the id of the password indicator display area
		
		if(PasswordLength <= 0) { // Check is less than 0
			PasswordStrength.html(''); // Empty the HTML
			PasswordStrength.removeClass('normal weak strong verystrong'); //Remove all the indicator classes
		}
		if(PasswordLength > 0 && PasswordLength < 4) { // If string length less than 4 add 'weak' class
			PasswordStrength.html('weak');
			PasswordStrength.removeClass('normal strong verystrong').addClass('weak');
		}
		if(PasswordLength > 4 && PasswordLength < 8) { // If string length greater than 4 and less than 8 add 'normal' class
			PasswordStrength.html('Normal');
			PasswordStrength.removeClass('weak strong verystrong').addClass('normal');			
		}	
		if(PasswordLength >= 8 && PasswordLength < 12) { // If string length greater than 8 and less than 12 add 'strong' class
			PasswordStrength.html('Strong');
			PasswordStrength.removeClass('weak normal verystrong').addClass('strong');
		}
		if(PasswordLength >= 12) { // If string length greater than 12 add 'verystrong' class
			PasswordStrength.html('Very Strong');
			PasswordStrength.removeClass('weak normal strong').addClass('verystrong');
		}
	});
});
</script>
<style type="text/css">
body{
	margin: 0;
	padding: 0;
	font-family: arial;
	color: #2C2C2C;
	
}
h1 a{
	color:#2C2C2C;
	text-decoration:none;
}
h1 a:hover{
	text-decoration:underline;
}
.as_wrapper{
	margin: 0 auto;
	width: 1000px;
}
.mytable{
	margin: 0 auto;
	padding: 20px;
	border:2px dashed #17A3F7;
}
.success{
	color:#009900;
}
.error{
	color:#F33C21;
}
.talign_right{
	text-align:right;
}
.username_avail_result{
	display:block;
	width:180px;
}
.password_strength {
	display:block;
	width:180px;
	padding:3px;
	text-align:center;
	color:#333;
	font-size:12px;
	backface-visibility:#FFF;
	font-weight:bold;
}
/* Password strength indicator classes weak, normal, strong, verystrong*/
.password_strength.weak{
	background:#e84c3d;
}
.password_strength.normal{
	background:#f1c40f;
}
.password_strength.strong{
	background:#27ae61;
}
.password_strength.verystrong{
	background:#2dcc70;
	color:#FFF;
}
.password_strength1 {	display:block;
	width:180px;
	padding:3px;
	text-align:center;
	color:#333;
	font-size:12px;
	backface-visibility:#FFF;
	font-weight:bold;
}
.password_strength1 {	background:#e84c3d;
}
.password_strength1 {	background:#f1c40f;
}
.password_strength1 {	background:#27ae61;
}
.password_strength1 {	background:#2dcc70;
	color:#FFF;
	
	
	
}
</style>
</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>

<div align="center">
  <form id="form1" name="form1" method="post" action=""  onSubmit="return ValidateForm()" >
    <div align="center">
	
    <table width="741" border="0" bordercolor="#4762A3">
        <tbody>
          <tr>
            <td colspan="4"><h2 align="center">
			<br>
			User Validation Form</h2></td>
          </tr>
          <tr>
            <td width="597"><table >
              <tr>
                <td width="708">
				
				<div align="left">
                <table width="816" height="88" border="1"  cellpadding="1" style="border-collapse:collapse">
                  <tbody>
                  <tr>
                  <td colspan="4" bgcolor="#14C4B6"><h4>Login Validation</h4></td>
                  
                  </tr>
                    <tr><td width="112"><label>Start Date</label></td>
                      <td width="244"><input id="sdate"   name = "sdate"   type = "text"  size="17"  value="<?php echo $sdate; ?>" />  <a href="javascript:NewCal('sdate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
                  
                    
                   </div>
                      </td>
                      <td width="125"><label>End Date</label></td>
                      <td width="206"><input id="enddate"   name = "enddate"   type = "text"  size="17"  value="<?php echo $enddate; ?>" />  <a href="javascript:NewCal('enddate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
                  
                    
                   </div></td>
                    </tr>
					
					<tr> 
					
					<td>Select Firm Name</td>
                    <td><select name="fid"  onChange="phappycode2()"  autofocus   style="width:200px">
                      <option>Select Firm Name</option>
                        <?php 

	$query = mysql_query("SELECT * FROM firmcreation  order by firmname");
				while($row = mysql_fetch_array($query)){
					$fid = $row['fid'];
					$firmname = $row['firmname'];
	 
	 echo"<option value = $fid>$firmname</option>"; 

	 }
	 ?>
                    </select></td>

					</tr>
					
					
					
					
                    <tr>
                      <td><label>Status</label> </td>
                      <td colspan="2"><input type="text" name="status" id="textfield5" value="<?php echo $status; ?>" />
                      <select name="status1" onChange="phappycode1()" id="select2" style="width:170px;">
                    <option></option>
                    <option>ACTIVE</option>
                       <option>INACTIVE</option>
                       
                     </select>
                      </td>
                     
                      <td>
                        <input type="hidden" name="uid" id="textfield6" value="<?php echo $uid; ?>" />
						 <input type="submit" name="s" id="submit2" value="Submit" />   
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            
            </td>
            
          </tr>
        </tbody>
        </table>
    </div>
				
				
				
				<table width="816" height="104" border="1"  cellpadding="1" style="border-collapse:collapse">
                <tr>
                 <td colspan="4" bgcolor="#14C4B6"><h4>Login Details</h4></td>
                </tr>
                <tr>
                    <td width="111">User Name</td>
                    <td width="242"><input type="text"  name="username" id="username"  value="<?php echo $username; ?>" /></td>
                    <td>User ID</td>
                     <td width="265"><input type="text"  name="uname" id="username" value="<?php echo $uname; ?>" /></td>
                    </tr>
                    <tr>
                    <td width="111">Address</td>
                    <td width="242"><p>
                      <textarea name="address" id="textarea2" cols="17" rows="1"><?php echo $address; ?></textarea>
                    </p></td>
                    <td>Mobile</td>
                     <td><input type="text" name="mobile" id="textfield3" value="<?php echo $mobile; ?>" /></td>
                    </tr>
                    <tr>
                    <td width="111">Security Level</td>
                    <td width="242"><input type="text" name="securitylevel" id="textfield3" value="<?php echo $securitylevel; ?>" /></td>
                    <td><select name="securitylevel1" onChange="phappycode()"  id="select2">
                    <option> Select access</option>
                      <option>ADMIN</option>
                        <option>VIEW RIGHTS</option>
                        <option>TRANSACTION RIGHTS</option>
                     </select></td>
                     <td>
                    
                    
                    </td>
                    </tr>
                  <tr>
                    <td width="111">Firm Name</td>
                    <td width="242">
                    <br />
                    <input type="text" name="fname" id="fname"  value="<?php echo $fname; ?>"  /><p>
                        <input type="hidden" name="fiddd" id="fiddd" value="<?php echo $fidd; ?>"  />
                    </p></td>
                    <td width="180"></td>
                    <td></td>
                  </tr>
				
                  </table></td>
                </tr>
              </table>
        
  </form>
    
  <div align="center"></div>
  <p>&nbsp;</p>
</div>
<div id="col3">
 
</div>

</body>
</html>
