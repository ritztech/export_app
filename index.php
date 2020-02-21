
<?php 
			session_start();
			if(isset($_SESSION['uname'])){ header('Location: basicform/welcome1.php'); } 
			
		?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
   
    
    <title>Ritz Technologies</title>

<style>

body {
  background: url(wallpaper.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  font-family: 'Roboto', sans-serif;
}

.login-card {
  padding: 40px;
  width: 274px;
  background-color: #F7F7F7;
  margin: 0 auto 10px;
  border-radius: 2px;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  overflow: hidden;
}

.login-card h1 {
  font-weight: 100;
  text-align: center;
  font-size: 2.3em;
}

.login-card input[type=submit] {
  width: 100%;
  display: block;
  margin-bottom: 10px;
  position: relative;
}

.login-card input[type=text], input[type=password],select {
  height: 44px;
  font-size: 16px;
  width: 100%;
  margin-bottom: 10px;
  -webkit-appearance: none;
  background: #fff;
  border: 1px solid #d9d9d9;
  border-top: 1px solid #c0c0c0;
  /* border-radius: 2px; */
  padding: 0 8px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}

.login-card input[type=text]:hover, input[type=password]:hover {
  border: 1px solid #b9b9b9;
  border-top: 1px solid #a0a0a0;
  -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
}

.login {
  text-align: center;
  font-size: 14px;
  font-family: 'Arial', sans-serif;
  font-weight: 700;
  height: 36px;
  padding: 0 8px;
/* border-radius: 3px; */
/* -webkit-user-select: none;
  user-select: none; */
}

.login-submit {
  /* border: 1px solid #3079ed; */
  border: 0px;
  color: #fff;
  text-shadow: 0 1px rgba(0,0,0,0.1); 
  background-color: #4d90fe;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#4787ed)); */
}

.login-submit:hover {
  /* border: 1px solid #2f5bb7; */
  border: 0px;
  text-shadow: 0 1px rgba(0,0,0,0.3);
  background-color: #357ae8;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#357ae8)); */
}

.login-card a {
  text-decoration: none;
  color: #666;
  font-weight: 400;
  text-align: center;
  display: inline-block;
  opacity: 0.6;
  transition: opacity ease 0.5s;
}

.login-card a:hover {
  opacity: 1;
}

.login-help {
  width: 100%;
  text-align: center;
  font-size: 12px;
}
</style>

 
  <style>
        .black_overlay{
            display: none;
            position: absolute;
            top: 0%;
            left: 0%;
            width: 100%;
            height: 100%;
            background-color: black;
            z-index:1001;
            -moz-opacity: 0.8;
            opacity:.80;
            filter: alpha(opacity=80);
        }
        .white_content {
            display: none;
            position: absolute;
            top: 25%;
            left: 25%;
            width: 40%;
			border-radius:10px;
           
            padding: 16px;
            border: 2px solid brown;
            background-color: white;
            z-index:1002;
            overflow: auto;
        }
    .style1 {color: #FF6600}
 .style2 {color: #003300}
 </style>
 <script language="javascript">
 function f1()
 {
// alert('hi');
 document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block';
 document.form111.cname.focus();
 
 }
  
           
        </script>

    
  </head>

  <body>
  
  
  	<div id="light" class="white_content" style="margin-top:-50px;">
 <p align="right">
 
 <table align="center" border="0" width="100%" style="margin-top:-30px;">
 
 <tr>
 <td style="vertical-align:top;"><h3 style="font-family: myFirstFont; font-size:20px; text-shadow:4px 4px 8px blue;" align="center">Term & Conditions</h3></td>
<td align="right" style="vertical-align:top;">
<a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">
<img src="close_button.png" style="width:20px; height:20px;"  alt="Close">
 </a></td>
 
 </tr>
  <tr>
 <td></td><td></td>
 
 </tr>
 
 </table>
 
 
 



			
   
    <div class="button"><a ><span>
	
	
	
	</span></a></div><br class="clear" />
	</form> 
 </p>
 </div>
 <div id="fade" class="black_overlay"></div>
  <br><br><br><br>
	<div class="login-card" style="border-radius:5px;">
	 <p align="center" style="color:brown; font-size:29px; font-family: DaunPenh; font-weight:bold;">
	 <img src="ritz_logo.jpg" style="width:90px; height:90px; border-radius:13px; " align="left">
	 <b>Ritz Technologies</b>
 </p>
    <h1 style="color:white; font-size:18px; font-family: Lucida Handwriting; font-weight:bold; background-color:#4000ff; border-radius:3px;">
	<span >Login Form</span>
	</h1>
	
 
		<form  name = "form1"  action="login.php" method="post">
		
		
		 <input type="text" name="uname" value=""  autofocus  placeholder="username" autocomplete="off">
			
	
		
		
    <input type="password" name="pwd" value="" placeholder="Password" autocomplete="off">
    <input type="submit" name="Submit" class="login login-submit" value="Login">
		
		
		
		
		
		
		</form>
	
    <div class="login-help">
    <!--
	 <input style=" background-color: #4CAF50; border: none; color: white; padding: 5px 5px; text-align: center; text-decoration: none; display: inline-block;font-size: 13px; cursor: pointer;" type="button"  onclick="f1()" value="Term & Conditions"   />
	-
    <input style=" background-color: #4CAF50; border: none; color: white; padding: 5px 5px; text-align: center; text-decoration: none; display: inline-block;font-size: 13px; cursor: pointer;" type="button"  onclick="f1()" value="Forgot Password"   />
	
-->
 <p align="center" style="color:brown; font-size:12px;"><b>Call us : +91-9721045577</b>
 <br><br>
 <b>Email us : ritzz.technologies@gmail.com</b></p>
  </div>
    </div>
 <script>
window.onload=document.form1.username.focus() ; 

</script>

  </body>
</html>
