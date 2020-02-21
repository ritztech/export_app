<?php
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }

$fid=$_SESSION['fid'];
?>
<?php include('../conf.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<script language="javascript">

function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		} 	
		return xmlhttp;
    }
	

function deleterecord(deleteId) {
	
    if (confirm("Are you sure you want to delete this record  ?!") == true) {
	     	var strURL="stockitem_delete.php?id="+deleteId;
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		
	alert('Record deleted.');
	window.location='stockitem_view.php';
	
	
	} else {
        x = "You pressed Cancel!";
    }

}


</script>
</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>

<div align="center">
<p>&nbsp;</p>

  <form id="form2" name="form2" method="post" action="godown_bck.php">
      
	    <h2 align="center"><span style="color:#F17327;">ADD NEW </span></h2>
		
      <div align="center">
        <table width="517" border="1" rules="none" frame="box" cellpadding="8">
		<tr>  <td> NAME </td>  <td> ADDRESS  </td>  <td> CONTACT NO   </td>   </tr>
				<tr>  <td> <input type="text"   size = "30" autofocus name="gname" required = "required"  /> </td> 
				<td> <input type="text"  size = "50" name="gaddress"  />  </td>  
				<td> <input type="text" name="gcontact"  />   </td>   </tr>
			
			

            <tr>
              <td>&nbsp;</td>
              <td><div align="center">
			    <?php  if($_SESSION['securitylevel']=="ADMIN" ||  $_SESSION['securitylevel']=="TRANSACTION RIGHTS" ) { ?>
<input type="submit" name="s" id="submit" value="Submit" />
<?php  } ?>

              </div></td>
			  

			  
            </tr>
     
        </table>
      </div>
    
      
    </form>
	

    
</div>
</body>
</html>
