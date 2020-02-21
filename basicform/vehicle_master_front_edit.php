<?php
session_start();
if(!isset($_SESSION['uname'])) { header('Location: ../index.php'); }

include('../conf.php');

$id=$_GET['id'];



$query_color="SELECT `legid`,`leg_name` FROM `ledger_master` WHERE `transported`=1 ";
$result_color=mysql_query($query_color);

$query_color1="SELECT `id`,`name`  FROM `stk_grp`   ";
$result_color1=mysql_query($query_color1);


$result1 = mysql_query("SELECT v1.auto_id as autiid,v1.transportid as tidd,v1.vehicl_num as vehnum,v1.drivernum as drbameee,l1.leg_name as transname ,l1.legid as legid ,v1.registration_img_file as regfile, v1.insurance_img_file as insfile, v1.drlicence_img_file as drlincefile, v1.aadhar_img_file as adharfile, v1.driversign_img_file as drsignfile, v1.othtefilee_img_file as othreimgfile  FROM vehicle_master v1 ,ledger_master l1
where l1.legid=v1.transportid  and l1.transported=1  and v1.auto_id=$id");
$row1 = mysql_fetch_array($result1);

$vehnum = $row1['vehnum'];

$legid = $row1['legid'];






?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>

<script language="javascript">

 function hledger112(thelist) {

	
	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;
	
    document.form1.stkname.value = content;
  

  
		
}



   var loadFile = function(event) {
    var output = document.getElementById('regfile');
    output.src = URL.createObjectURL(event.target.files[0]);
	document.form1.zregistration_file.value=1;
  };
  
     var loadFile1 = function(event) {
    var output = document.getElementById('insfile');
    output.src = URL.createObjectURL(event.target.files[0]);
	document.form1.zinsurance_file.value=1;
  };
  
     var loadFile2 = function(event) {
    var output = document.getElementById('drlincefile');
    output.src = URL.createObjectURL(event.target.files[0]);
	document.form1.zdrivin_licence_file.value=1;
  };
  
     var loadFile3 = function(event) {
    var output = document.getElementById('adharfile');
    output.src = URL.createObjectURL(event.target.files[0]);
	document.form1.zaadhar_card_file.value=1;
  };
  
     var loadFile4 = function(event) {
    var output = document.getElementById('drsignfile');
    output.src = URL.createObjectURL(event.target.files[0]);
	document.form1.zdriver_sign_file.value=1;
  };
  
     var loadFile5 = function(event) {
    var output = document.getElementById('othreimgfile');
    output.src = URL.createObjectURL(event.target.files[0]);
	document.form1.zany_other_file.value=1;
  };
  
  
  
  function printImg(url) {
	  
	 if(url==0 || url=='NONE')
	 { alert('No Image found')
	 }
else
{	
  var win = window.open('');
  win.document.write('<img src="' + url + '" onload="window.print();window.close()" />');
  win.focus();
}

}



</script>



</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>

<div>
<p>&nbsp;</p>
  <h2 align="center"><span style="color:#F17327;">Update Vehicle details</span></h2>
  
    
    <form id="form1" name="form1" method="post"  enctype="multipart/form-data"  action="vehicle_master_bck_edit.php">
     
      <div align="center">
        <table width="517" border="2" rules="none" frame="box" cellpadding="8"  style="font-style:bold"  >
          <tbody>
            <tr>
              <td width="208"><label for="textfield">Vehicle Number:</label></td>
              <td width="233"><input type="text"  value= "<?php echo $vehnum; ?>" name="stockitem"  /></td>
            </tr>
			
			
					            <tr>
              <td width="208"><label for="textfield">Driver Name:</label></td>
              <td width="233"><input type="text"   value= "<?php echo $row1['drbameee']; ?>"  name="idetails"  /></td>
            </tr>
			
			
			
			       		
			
			

			

			
					            <tr>
              <td>Transporter Name </td>
              <td>      <select name = "p_category"  onchange = "hledger112(this)"   style="width:170px" >
      <?php 

	while($query_data = mysql_fetch_array($result_color)){
	 
	 echo"<option  value = '{$query_data['0']}'>{$query_data['1']}  </option>"; 

	 }
	 ?> </select>  </td>
	 

	 
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
		
		
		<table border="2" style="font-weight:bold">
		
		
		<tr>

<td> Registration Image </td>
<td> Insurance Image </td>
<td> Driving Licence Image </td>
<td> Aadhar card Image </td>
<td> Driver Sign Image </td>
		<td> Any other Image </td>
		</tr>
		
		<tr>

  <td> <img src="<?php echo $row1['regfile'] ?>"  width="200"  height="200" alt="Registration file" id="regfile"  > </td>
  <td> <img src="<?php echo $row1['insfile'] ?>" width="200"  height="200" alt="Insurance file" id="insfile"  > </td>
  <td> <img src="<?php echo $row1['drlincefile'] ?>" width="200"  height="200" alt="Driving Licence file"  id="drlincefile"  > </td>
  <td> <img src="<?php echo $row1['adharfile'] ?>" width="200"  height="200" alt="Aadhar file" id="adharfile"  > </td>
  <td> <img src="<?php echo $row1['drsignfile'] ?>" width="200"  height="200" alt="Driver sign file"  id="drsignfile"  > </td>
  <td> <img src="<?php echo $row1['othreimgfile'] ?>" width="200"  height="200" alt="Othre file"  id="othreimgfile"  > </td>
  
  
		</tr>
		
	<tr>  

<td> <input name="registration_file"  id="registration_file" type="file"  onChange="loadFile(event)"   /> </td>
<td> <input name="insurance_file"  id="insurance_file" type="file"  onChange="loadFile1(event)"   /> </td>
<td> <input name="drivin_licence_file"  id="drivin_licence_file" type="file"  onChange="loadFile2(event)"   /> </td>
<td> <input name="aadhar_card_file"  id="aadhar_card_file" type="file"  onChange="loadFile3(event)"   /> </td>
<td> <input name="driver_sign_file"  id="driver_sign_file" type="file"  onChange="loadFile4(event)"   /> </td>
<td> <input name="any_other_file"  id="any_other_file" type="file"  onChange="loadFile5(event)"   /> </td>




	</tr>	
	
	
	<tr>  
	
	<td>  
	<input  type = "button" value="Print" onclick="printImg('<?php echo $row1['regfile'] ?>')"   />
	<input  type = "text" readonly   size = "5" name = "zregistration_file"  id = "zregistration_file"  value = "<?php echo $row1['regfile'] ?>"  />    </td>
		<td><input  type = "button" value="Print" onclick="printImg('<?php echo $row1['insfile'] ?>')"  />  <input  type = "text" readonly  size = "5" name = "zinsurance_file"  id = "zinsurance_file"  value = "<?php echo $row1['insfile'] ?>"  />    </td>
			<td>  <input  type = "button" value="Print" onclick="printImg('<?php echo $row1['drlincefile'] ?>')"   /> <input  type = "text"  readonly  size = "5" name = "zdrivin_licence_file"  id = "zdrivin_licence_file"  value = "<?php echo $row1['drlincefile'] ?>"  />    </td>
				<td> <input  type = "button" value="Print" onclick="printImg('<?php echo $row1['adharfile'] ?>')"   />  <input  type = "text" readonly  size = "5" name = "zaadhar_card_file"  id = "zaadhar_card_file"  value = "<?php echo $row1['adharfile'] ?>"  />    </td>
					<td>  <input  type = "button" value="Print" onclick="printImg('<?php echo $row1['drsignfile'] ?>')"   /> <input  type = "text" readonly  size = "5" name = "zdriver_sign_file"  id = "zdriver_sign_file"  value = "<?php echo $row1['drsignfile'] ?>"  />    </td>
						<td> <input  type = "button" value="Print" onclick="printImg('<?php echo $row1['othreimgfile'] ?>')"   />  <input  type = "text"  readonly  size = "5" name = "zany_other_file"  id = "zany_other_file"  value = "<?php echo $row1['othreimgfile'] ?>"  />    </td>
						
	</tr>
		
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

	  <input  type = "hidden"  size = "20" name = "vehicl_id"  value = "<?php echo $id ?>" id = "vehicl_id"  />	  
	  
	  
    </form>
    <p>&nbsp;</p>
  </blockquote>
</div>
<?php include('../include/footer.php');?>

<script>



document.form1.p_category.value="<?php echo $legid ?>"; 

</script>



</body>
</html>
