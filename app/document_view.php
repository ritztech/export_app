<?php include('../conf.php');
session_start();

if(!isset($_SESSION['uname'])) { header('Location: ../index.php'); }

if($_SESSION['securitylevel']!="ADMIN")

			{

				header('Location: ../index.php');

				}

?>
<?php
$query_dispMake="SELECT `fid`, `firmname`, `businessfirm`, `officeadd`, `shopadd`, `phonno`, `faxnumber`, `mobile`, `contactperson`, `firmtype`, `email`, `mpvat`, `midate`, `mandilicenseno`, `mandidate`, `cstno`, `cstdate`, `tinno`, `tindate`, `fssaino`, `fdate`, `otherdoc`, `propname`, `place`, `state`, `contactperson1`, `email1`, `itnumber`, `itndate`, `otherdoc1`, `pcontact`, `pstatus`, `bankname`, `banktype`, `bankaccnumber`, `ifsccode` FROM `firmcreation`";
$result_dispMake=mysql_query($query_dispMake);

?>
<html>
<head>

<title>Sunrise Associates</title>
<script src="jquery.min.js"></script>
        <script src="script.js"></script>
<link href="../style.css" rel="stylesheet" type="text/css" />
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
                       <table width="593" border="0" align="center" cellpadding="10">
                         <tr>
                           <th width="243" scope="col"><div align="left">Firm Name: </div></th>
                           <th width="334" scope="col"><div align="left">
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
                         <tr>
                           <th scope="row"><div align="left">Comment:</div></th>
                           <td><textarea name="desc1" style="width:300px; text-align:left;">						 
						   </textarea></td>
                         </tr>
                         <tr>
                           <th scope="row"><div align="left">Upload Documents: </div></th>
                           <td><p></p>
                             <p>
                               <input name="file[]" type="file" id="file"/>
                           </p></td>
                         </tr>
                         <tr>
                           <th scope="row">&nbsp;</th>
                           <td><input name="button" type="button" class="upload" id="add_more" value="Add More Files"/>
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

