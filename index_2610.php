<?php 
//include('access.php');

	session_start();
if(isset($_SESSION['uname'])) {
		
if($_SESSION['securitylevel']=="ADMIN")
			{
				echo '<script>window.location="basicform/welcome1.php"</script>';
				//header('Location: basicform/welcome1.php');
				}
				
				else {
					
					echo '<script>window.location="basicform/welcome.php"</script>';
					//header('Location: basicform/welcome.php');
					
				}
				
}

			
		?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Ritz Technology </title>
    
    
    
    
        <link rel="stylesheet" href="login_page/css_123/style.css">

    
    
    
  </head>

  <body>

    <div class="wrapper">
	<div class="container">
		<div style="background-color:#E5E5E5;">
       
        <h1 style="font-size:50px; text-align:left;"><img src="ritz_logo.jpg" style="text-align:left; vertical-align:top;" width="200" height="150">&nbsp;&nbsp;&nbsp;Ritz Technology</h1>
		<h4 style="text-align:center; font-weight:bold; margin-left:200px; margin-top:-63px;">Phone:  +91-9721045577<br>
Web:     www.ritzech.co.in<br>
Email:    ritzz.technologies@gmail.com</h4></div>
		<form  name = "form1"  action="login.php" method="post">
			<input type="text"  autofocus  name="uname" placeholder="Username" value="" />
            <input   type="password" name="pwd" value="" placeholder="Password" />
            
			<input type="submit" name="Submit" value="Login" style="width:250px" />
		</form>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		 <li></li>
         <li></li>
         <li></li>
         <li></li>
         <li></li>
         <li></li>
         <li></li>
         <li></li>
        <li>
        </li>
       
    
    </ul>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="login_page/js_123/index.js"></script>

    
    
 <script>
window.onload=document.form1.username.focus() ; 

</script>

  </body>
</html>
