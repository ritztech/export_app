
<?php 
			session_start();
			if(isset($_SESSION['uname'])){ header('Location: welcome.php'); } 
			include("config.php");
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

    
  </head>

  <body>
 <br><br><br><br>
	<div class="login-card" style="border-radius:5px;">
	
 
    <p align="center" style="color:brown; font-size:29px; font-family: DaunPenh; font-weight:bold;">
	 <img src="ritz_logo.jpg" style="width:90px; height:90px; border-radius:13px; " align="left">
	 <b>Ritz Technologies</b>
 </p>
    <h1 style="color:white; font-size:24px; font-family: Lucida Handwriting; font-weight:bold; background-color:#4000ff; border-radius:5px;">
	Login Form
	</h1>
		<form  name = "form1"  action="check_login.php" method="post">
		
		  <select style="font-size:12px; font-weight:bold;" name="username" autofocus class="input" autocomplete="off" required >
			   <option selected="selected" disabled="disabled"><i>SELECT USER</i></option>
			   <?php               

				$query = mysql_query("SELECT `id`, `pass`, `name`, `auth`, `m_auto` FROM `muser` WHERE 1");

				while($row = mysql_fetch_array($query)){

					//$id = $row['id'];

					$uname = $row['id'];

			?>

                       <option style="font-weight:bold;"><?php echo $uname; ?></option>

                       <?php } ?>
			   </select>
    <input type="password" name="password" value="" placeholder="Password">
	<p align="center" style="color:red; font-size:12px;"><b>**** Invalid id or password , please try again. ****</b> </p>
	
    <input type="submit" name="Submit" class="login login-submit" value="Login">
		
		
		
		
		
		
		</form>
	
    <div class="login-help">
    <p align="center" style="color:brown; font-size:12px;"><b>Call us : +91-9721045577</b>
 <br><br>
 <b>Email : ritzz.technologies@gmail.com</b></p>
  </div>
    </div>
 <script>
window.onload=document.form1.username.focus() ; 

</script>

  </body>
</html>
