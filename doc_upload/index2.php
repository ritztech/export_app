<?php include('../conf.php');
session_start();

$fid=$_SESSION['fid'];

if(!isset($_SESSION['uname'])) { header('Location: ../index.php'); }



?>

<html>
<head>

<title>Sunrise Associates</title>
<script src="jquery.min.js"></script>
        <script src="script.js"></script>
<link href="../style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {font-size: 16px}
-->
</style>
</head>
<body>

<?php include('../include/header.php'); ?>

<?php include('../include/menu1.php');?>

<div id="gutter"></div>

<div id="col4" style="text-align:center;">
 <div id="maindiv">

            <div id="formdiv">
                  <form enctype="multipart/form-data" action="" method="post">
                     <div id="filediv">
                       <p>&nbsp;</p>
                       <table width="858" border="1" align="center" cellpadding="10">
                  
						 
						 <tr>     <th width="211" scope="col"><div align="left" class="style1">
                             <div align="right">Financial year: </div>
                           </div></th>						 
						   
						   <td>     <select name="financialyr" >
<option>  </option>
<option>FIRM CREATION DOCUMENTS</option>
<option>2013-2014</option>
<option>2014-2015</option>
<option>2015-2016</option>
<option>2016-2017</option>
<option>2017-2018</option>
<option>2018-2019</option>
<option>2019-2020</option>


</select></td>

	</tr>
						 

						 
                  
                         <tr>
                           <th scope="row"><div align="left"> UPLOAD DOCUMENTS  </div></th>
                           <td><p>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						     File Description:</p>
                             <p>
                               <input name="file[]" type="file" id="file"/>
                               <input name="desc10" id="desc10" type="text">
                             </p>
							 
							 <input name="button" type="button" class="upload" id="add_more" value="Add More Files"/>
							 
							 </td>
                         </tr>
                         <tr>
                           <th scope="row">&nbsp;</th>
                           <td>
                             <input type="submit" value="Upload File" name="submit" id="upload" class="upload"/></td>
                         </tr>
                       </table>
                       <p>&nbsp;                       </p>
                       <p>
                         <label></label>
                       </p>
                       <p>
                         <label></label>
                       </p>
                    </div>
              </form>
                <br/>
                <br/>
				<!-------Including PHP Script here------>
                <?php include "upload1.php"; ?>
            </div>
           
		   <!-- Right side div -->
        </div>
</div>
</body>
</html>

