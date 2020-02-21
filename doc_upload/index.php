<?php include('../conf.php');
session_start();

$fid=$_SESSION['fid'];

if(!isset($_SESSION['uname'])) { header('Location: ../index.php'); }

if($_SESSION['securitylevel']!="ADMIN")

			{

				header('Location: ../index.php');

				}

?>
<?php
$query_dispMake="SELECT `fid`, `firmname`, `businessfirm`, `officeadd`, `shopadd`, `phonno`, `faxnumber`, `mobile`, `contactperson`, `firmtype`, `email`, `mpvat`, `midate`, `mandilicenseno`, `mandidate`, `cstno`, `cstdate`, `tinno`, `tindate`, `fssaino`, `fdate`, `otherdoc`, `propname`, `place`, `state`, `contactperson1`, `email1`, `itnumber`, `itndate`, `otherdoc1`, `pcontact`, `pstatus`, `bankname`, `banktype`, `bankaccnumber`, `ifsccode` FROM `firmcreation`  order by firmname";
$result_dispMake=mysql_query($query_dispMake);

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

<?php include('../include/sidemenu.php');?>

<div align="center">
 <div id="maindiv">

            <div id="formdiv">
                  <form enctype="multipart/form-data" action="" method="post">
                     <div id="filediv">
                       <p>&nbsp;</p>
                       <table width="858" border="1" align="center" cellpadding="7" style="border-collapse:collapse;">
                         <tr>
                           <th  width="211" scope="col"><div align="left" class="style1">
                            <span style="color:black;"> Firm Name: </span>
                           </div></th>
                           <th width="601" scope="col"><div align="left">
                             <select name="fid" style="width:299px">
                               <option   value="" selected="selected"> </option>
                               <?php 

	while($query_data = mysql_fetch_array($result_dispMake)){
	 
	 echo"<option  value = {$query_data['fid']}>{$query_data['firmname']}</option>"; 

	 }
	 ?>
                             </select>
                           </div></th>
					   
						   
                         </tr>
						 
						 <tr>     <th width="211" scope="col"><div align="left" class="style1">
                               <span style="color:black;">Financial year: </span>
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
                <?php include "upload.php"; ?>
            </div>
           
		   <!-- Right side div -->
        </div>
</div>
</body>
</html>

