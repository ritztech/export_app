<?php
session_start();
if(!isset($_SESSION['uname'])) { header('Location: ../index.php'); }

include('../conf.php');




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />

<link href="..//style.css" rel="stylesheet" type="text/css" />
    <link href="js/jquery-ui.css" rel="stylesheet">
      <script src="js/jquery-1.10.2.js"></script>
      <script src="js/jquery-ui.js"></script>
	  

<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>


	  
	  

<script language="javascript">
	
 function hledger112(thelist) {

	
	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;
	
    document.form1.stkname.value = content;
  

  
		
}


function validform()
{
	
	    var dt=document.form1.fromdate

	    if (isDate(dt.value)==false){

	           dt.focus()

              return false

    }
	
		    var dt=document.form1.notedate

	    if (isDate(dt.value)==false){

	           dt.focus()

              return false

    }
	
		    var dt=document.form1.todate

	    if (isDate(dt.value)==false){

	           dt.focus()

              return false

    }
	

return true

	
	
	
}


</script>



  

</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>

<div>
<p>&nbsp;</p>
  <h2 align="center"><span style="color:#F17327;">ADD EXCHNAGE RATE </span></h2>
  
    
    <form id="form1" name="form1" method="post" onsubmit="return validform()" enctype="multipart/form-data"  action="add_curr_exchange_bck.php">
     
      <div align="center">
        <table  border="2" rules="none" frame="box" cellpadding="1"  bgcolor="white"  style="font-style:bold;font-weight:bold;"  >
          <tbody>

    			            <tr>
              <td width="208"><label for="textfield">YEAR</label></td>
              <td width="233"><input type="text"   value = "2019-2020"  name="yearrr"  /></td>
            </tr>
			
			


            <tr>
              <td width="208"><label for="textfield">Select Exchnage type:</label></td>
              <td width="233">   	              <select name="echange_type" style="width:200px">

                                      <?php               

				$query = mysql_query("SELECT `tab_auto_id`, `remarks` FROM `curr_exchange_main` ");

				while($row = mysql_fetch_array($query)){

					$brid = $row['tab_auto_id'];

					$brokername = $row['remarks'];

			?>

                       <option value = "<?php echo $brid; ?>"> <?php echo $brokername; ?></option>

                       <?php } ?>

                 
				 

          </select>  </td>
            </tr>
			
			








	
			



            <tr>
              <td width="208"><label for="textfield">Currency  name:</label></td>
              <td width="233">   	              <select name="currid" style="width:200px">

                 
                       <?php               

				$query = mysql_query("SELECT `tab_auto_id`, `curr_name`  FROM `currency_master`");

				while($row = mysql_fetch_array($query)){

					$brid = $row['tab_auto_id'];

					$brokername = $row['curr_name'];

			?>

                       <option value = "<?php echo $brid; ?>"> <?php echo $brokername; ?></option>

                       <?php } ?>

                 
				 

          </select>  </td>
            </tr>
			
			
					            <tr>
              <td width="208"><label for="textfield">From Date:</label></td>
              <td width="233"><input type="text"  placeholder="DD/MM/YYYY"  onchange = "isDate(this.value)"  value = ""  name="fromdate"  id="fromdate"   /></td>
            </tr>
			
			
						
					            <tr>
              <td width="208"><label for="textfield">To  date:</label></td>
              <td width="233"><input type="text"  placeholder="DD/MM/YYYY" onchange = "isDate(this.value)"   value = ""  name="todate"  id="todate"  /></td>
            </tr>
			
						
					            <tr>
              <td width="208"><label for="textfield">IMPORT EXANGE RATE :</label></td>
              <td width="233"><input type="text"  required="required" value = ""  name="impexrate"  /></td>
            </tr>
			
						
					            <tr>
              <td width="208"><label for="textfield">EXPORT EXANGE :</label></td>
              <td width="233"><input type="text"  required="required"   value = ""  name="expexrate"  /></td>
            </tr>
			
						
					            <tr>
              <td width="208"><label for="textfield">NOTIFICATION NUMBER :</label></td>
              <td width="233"><input type="text" required="required"    value = ""  name="notenum"  /></td>
            </tr>
			
			
							            <tr>
              <td width="208"><label for="textfield">NOTIFICATION DATE :</label></td>
              <td width="233"><input type="text"  placeholder="DD/MM/YYYY"  onchange = "isDate(this.value)"   value = ""  name="notedate"  /></td>
            </tr>
			
					
							            <tr>
              <td width="208"><label for="textfield">REMARK :</label></td>
              <td width="233"><input type="text"   value = ""  name="remarksss"  /></td>
            </tr>
			
			
			
			
			
			
			
			
			
			

            <tr>
              <td>&nbsp;</td>
              <td><div align="center">
			    <?php  if($_SESSION['securitylevel']=="ADMIN" ||  $_SESSION['securitylevel']=="TRANSACTION RIGHTS" ) { ?>
<input type="submit" name="s" id="submit" value="Submit" />
<?php  } ?>

              </div></td>
			  
			  
			  

 
			  
			  
			  
			  
            </tr>
          </tbody>
        </table>
      </div>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>
        <label for="textfield2"><br />
        </label>
      </p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
	  
	  <input  type = "text"  size = "20" name = "stkname"  value = "None" id = "stkname"  /> 
	  
	    <script>
  $( function() {
    $( "#fromdate" ).datepicker();
	$( "#todate" ).datepicker();
	 
	
  } );
  </script>
  
  
  
    </form>
    <p>&nbsp;</p>
  </blockquote>
</div>
<?php include('../include/footer.php');?>
</body>
</html>
