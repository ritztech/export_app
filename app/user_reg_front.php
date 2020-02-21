
<?php 
session_start();
include('../conf.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jquery-1.9.1.js"></script>
<script type="text/javascript">
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
					UsernameAvailResult.html('<span class="error">Username already Exits</span>');
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

<?php include('../include/sidemenu.php');?>

<div align="center">
  <form id="form1" name="form1" method="post" action="user_reg_back.php">
    <div align="center">
      <table width="741" border="0" bordercolor="#4762A3">
        <tbody>
          <tr>
            <td colspan="4"><h2 align="center">Dealer Registration Form</h2></td>
          </tr>
          <tr>
            <td width="597"><table>
              <tr>
                <td width="708" height="202">
				<table width="675"  border="1" cellpadding="5" align="center" style="border-collapse:collapse" rules="rows"  >
                <tr>
                    <td width="338" align="right">User Name</td>
                    <td width="491"><input type="text" name="username" size="24"/></td>
                    
                    </tr>
                    <tr>
                    <td width="138" align="right">Address</td>
                    <td width="491"><p>
                      <textarea name="address" id="textarea2" cols="25" rows="3"></textarea>
                    </p></td>
                    
                    </tr>
                  <tr>
                    <td width="138" align="right">User ID</td>
                    <td width="491"><p>
                      <input type="text" name="uname" id="username"/>
                      </p><div class="username_avail_result" id="username_avail_result"></div></td>
                    
                  </tr>
                  <tr>
                    <td align="right">Password</td>
                    <td><input type="password" name="pwd" id="password"/></td>
                  </tr>
                  <tr>
                    <td align="right">Firm Name</td>
					<td>
					<input type="text" name="fname" id="fname"/>  </td>
                    
					
					
                  </tr>
                  <tr>
                    <td align="right">Mobile</td>
                    <td><input type="text" name="mobile" id="textfield3"/></td>
                  </tr>
                  <tr>
                    <td align="right"><p>Security Level</p></td>
                    <td><p>
                      <select name="securitylevel" id="select2">
                        <option></option>
                        <option>ADMIN</option>
                        <option>VIEW RIGHTS</option>
                        <option>TRANSACTION RIGHTS</option>
                      </select>
                    </p></td>
                    
                    </tr>

					<tr> <td>&nbsp;</td>
                     <td><div align="left">
                       <input type="submit" name="s" id="s" value="Submit" />
                       <input type="reset" name="reset" id="reset" value="Reset" />
                     </div></td> </tr>
                  </table></td>
                </tr>
              </table>
              
              <div align="center">
                <table width="200" border="0">
                  <tbody>
                    <tr>
                      <td><input type="hidden" name="sdate" id="textfield" /></td>
                      <td><input type="hidden" name="enddate" id="textfield4" /></td>
                    </tr>
                    <tr>
                      <td><input type="hidden" name="status" id="textfield5" /></td>
                      <td><input type="hidden" name="newuser" id="textfield6" /></td>
                    </tr>
                  </tbody>
                </table>
                <p>&nbsp;</p>
              </div>
              
            </td>
            
          </tr>
        </tbody>
        </table>
    </div>
  </form>

  <div align="center"></div>
  <p>&nbsp;</p>
</div>
<div id="col3">
 
</div>
</body>
</html>
