<?php
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }
$fid=$_SESSION['fid'];
?>
<?php

include("../conf.php");

?>
<?php 

if(isset($_POST['s'])) {
            $m1 =$_POST['m1'];
            $m2= $_POST['m2'];
           // $m3 =$_POST['m3'];
            $m4 =$_POST['m4'];
            $m5 =$_POST['m5'];
            $m6 =$_POST['m6'];
            $m7 =$_POST['m7'];
            $m8 = $_POST['m8'];
             $n1 =$_POST['n1'];
            $n2 = $_POST['n2'];
            $n3 =$_POST['n3'];
            $n4 =$_POST['n4'];
            $n5 =$_POST['n5'];
            $n6 =$_POST['n6'];
            $n7 =$_POST['n7'];
           // $n8 = $_POST['n8'];
			$qtotal =$_POST['qtotal'];
            $amtotal =$_POST['amtotal'];
            $ratetotal =$_POST['ratetotal'];
            $mtaxid = $_POST['mtaxid'];
			
	$query = "UPDATE mandia12m SET
	 srno='$m2',
	 recieptdate=STR_TO_DATE('$n3','%d/%m/%Y'),
	 deposittax='$m4',
	 paymentmode='$m5',
	 chequeno='$m6',
	 bankname='$m7',
	 chequedate=STR_TO_DATE('$m8','%d/%m/%Y'),
	 qtotal='$qtotal',
	 amtotal='$amtotal',
	 ratetotal='$ratetotal'
	 WHERE mtaxid='$mtaxid'";
	        mysql_query($query);
	 //echo $query;
	 if (!mysql_query($query,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  $query1 = "UPDATE mandia12n SET
	  srno='$n2',
	 recieptdate=STR_TO_DATE('$n3','%d/%m/%Y'),
	 deposittax='$n4',
	 paymentmode='$n5',
	 chequeno='$n6',
	 bankname='$n7',
	 chequedate=STR_TO_DATE('$m8','%d/%m/%Y'),
	 qtotal='$qtotal',
	 amtotal='$amtotal',
	 ratetotal='$ratetotal'
	 WHERE ntaxid='$mtaxid'";
	        mysql_query($query1);
	 //echo $query;
	 if (!mysql_query($query1,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
   echo "<script>alert('Data updated successfully.');location.href='a12mandinirastrittax_view.php'</script>"; 

        

}
?>
<?php

try {
$query = "SELECT  `mtaxid`,`taxtype`, `srno`,DATE_FORMAT(recieptdate,'%d/%m/%Y') as recieptdate, `paymentmode`, `chequeno`, `bankname`,DATE_FORMAT(chequedate,'%d/%m/%Y') as chequedate, `deposittax`, `qtotal`, `amtotal`, `ratetotal` FROM `mandia12m` WHERE mtaxid=?";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['mtaxid']);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
            $m1= $row['taxtype'];
            $m2= $row['srno'];
            $m3 =$row['recieptdate'];
			$m4 = $row['deposittax'];
            $m5 =$row['paymentmode'];
            $m6 =$row['chequeno'];
            $m7 =$row['bankname'];
            $m8 =$row['chequedate'];
			$qtotal =$row['qtotal'];
            $amtotal =$row['amtotal'];
            $ratetotal =$row['ratetotal'];
            $mtaxid = $row['mtaxid'];
} catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
?>
<?php

try {
$query = "SELECT `ntaxid`, `fid`, `entrydate`, `taxtype`, `srno`,DATE_FORMAT(recieptdate,'%d/%m/%Y') as recieptdate, `paymentmode`, `chequeno`, `bankname`,DATE_FORMAT(chequedate,'%d/%m/%Y') as chequedate, `deposittax`, `qtotal`, `amtotal`, `ratetotal` FROM `mandia12n` WHERE ntaxid=$mtaxid";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['ntaxid']);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
            $n1= $row['taxtype'];
            $n2= $row['srno'];
            $n3 =$row['recieptdate'];
			$n4 = $row['deposittax'];
            $n5 =$row['paymentmode'];
            $n6 =$row['chequeno'];
            $n7 =$row['bankname'];
            $n8 =$row['chequedate'];			
            $ntaxid = $row['ntaxid'];
} catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/a12code.js">  </script>
</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>

<div align="center"><p align="left">&nbsp;</p>
  <h2 align="center"><span style="color:#F17327;">mandi tax & nirasrit tax deposit</span></h2>
  <form id="form1" name="form1" method="post" action="">
  
  <div>
    <table border="0">
        <tbody>
          <tr>
            <td width="702"><table width="690" border="1" frame="box" rules="none">
              <tbody>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
				  <td>TRANSACTION DATE</td>
                  <td><input id="dstart1"   name = "n3"  onchange = "isDate(this.value)"  type = "text" size="17" value="<?php echo $n3 ?>" required="required" />  <a href="javascript:NewCal('dstart1','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>&nbsp;&nbsp;</td>
                </tr>
                
                <tr bgcolor="#14C4B6">
                  <td colspan="2"><h4 align="center">Mandi tax</h4></td>
                  <td colspan="2"><h4 align="center">Nirasrit Tax</h4></td>                  
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>TAX FOR DEPOSITED TAX </td>
                  <td><input id="dstart2"   name = "m8"  onchange = "isDate(this.value)"  type = "text"  size="17" required="required" value="<?php echo $m8 ?>" />
                    <a href="javascript:NewCal('dstart2','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date" /></a>&nbsp;&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td width="112">TYPE OF TAX:</td>
                  <td width="186">
				  <input type="text" name="m1" id="textfield" readonly="readonly" value="<?php echo $m1 ?>" /></td>
                  <td width="152">TYPE OF TAX:</td>
                  <td width="212">
				  <input type="text" name="n1" id="textfield3"  readonly="readonly" value="<?php echo $n1 ?>" /></td>
                </tr>
                <tr>
                  <td>REC EIPTS SR. NO:</td>
                  <td><input type="text" name="m2" id="textfield2" value="<?php echo $m2 ?>"/></td>
                  <td>REC EIPTS SR. NO:</td>
                  <td><input type="text" name="n2" id="textfield4" value="<?php echo $n2 ?>" /></td>
                </tr>
                
                <tr>
                  <td>DEPOSIT TAX</td>
                  <td><input type="text" name="m4" id="textfield5" value="<?php echo $m4 ?>" />
				  <input type="hidden" name="mtaxid" id="textfield5" value="<?php echo $mtaxid ?>" /></td>
                  <td>DEPOSIT TAX</td>
                  <td><input type="text" name="n4" id="textfield9" value="<?php echo $n4 ?>" /></td>
                </tr>
                <tr>
                  <td>MODE OF PAYMENT</td>
                  <td><input type="text" name="m5" id="textfield6" value="<?php echo $m5 ?>" /></td>
                  <td>MODE OF PAYMENT</td>
                  <td><input type="text" name="n5" id="textfield10" value="<?php echo $n5 ?>" /></td>
                </tr>
                <tr>
                  <td>CHEQUE NO.</td>
                  <td><input type="text" name="m6" id="textfield7" value="<?php echo $m6 ?>" /></td>
                  <td>CHEQUE NO.</td>
                  <td><input type="text" name="n6" id="textfield11" value="<?php echo $n6 ?>" /></td>
                </tr>
                <tr>
                  <td>BANK NAME</td>
                  <td><input type="text" name="m7" id="textfield8" readonly="readonly" value="<?php echo $m7 ?>" /></td>
                  <td>BANK NAME</td>
                  <td><input type="text" name="n7" id="textfield12" readonly="readonly" value="<?php echo $n7 ?>" /></td>
                </tr>
                
                <tr>
                  <td colspan="4"> 
                  
 
 <table width="686" border='1' cellpadding='1'   id="dataTable"   >

  <tr>
   <th>TOTAL</th> 
   <th> <input  type = "text"  size = "3" name = "qtotal" id = "qtotal" value="<?php echo $qtotal ?>" /> </th>
   <th> <input  type = "text"  size = "5" name = "amtotal" id = "amtotal" value="<?php echo $amtotal ?>" /> </th>
   <th> <input  type = "text"  size = "5" name = "ratetotal" id = "ratetotal" value="<?php echo $ratetotal ?>" />  </th> 
</tr>

<tr>
 

  <th>ITEM NAME</th> <th>QUANTITY</th><th>AMOUNT</th> <th> RATE </th> <th>  REMARK </th>  </tr>
   <?php 
$result13 = mysql_query("SELECT `stockitem`, `quantity`, `amount`, `rate`,`remark` FROM `mandia12_ref` WHERE `formidm` = $mtaxid   and `tempid` = 'A12'");




?>
  <?php
 
$i = 0;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1; ?>
 
 <tr>
   
   <td> <input type = "text" size="10"  name = "" value = "<?= $row13['0'] ?>" />  </td>
   <td> <input type = "text" size="5"  name = "" value = "<?= $row13['1'] ?>" />  </td>
   <td> <input type = "text" size="5"  name = "" value = "<?= $row13['2'] ?>" />  </td>
   <td> <input type = "text" size="5"  name = "" value = "<?= $row13['3'] ?>" />  </td>
   <td> <input type = "text" size="5"  name = "" value = "<?= $row13['4'] ?>" />  </td>
</tr>
 <?php  }    ?>
</table> 


<input  type = "hidden"  size = "5" name = "totalcnt" id = "totalcnt" /> &nbsp;</td>
                  </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td><input type="submit" name="s" id="submit" value="Submit" /></td>
                  <td>&nbsp;</td>
                </tr>
              </tbody>
        </table></td>
            <td width="10"><p>&nbsp;</p>
              <p align="left">&nbsp;</p>
              <p>&nbsp;</p></td>
          </tr>
        </tbody>
      </table>
    </div>
  </form>&nbsp;
</div>
</body>
</html>
