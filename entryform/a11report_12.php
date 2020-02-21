<?php
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";}

$fid=$_SESSION['fid'];
?>
<?php

include("../conf.php");

?>
<?php 

if(isset($_POST['s'])) {
            $suppliername =$_POST['suppliername'];
            $stockitem =$_POST['stockitem'];
            $stockopening =$_POST['stockopening'];
            $stockgatepass =$_POST['stockgatepass'];
            $bag =$_POST['bag'];
            $netqty =$_POST['netqty'];
            $grossqty =$_POST['grossqty'];
            $value = $_POST['value'];
            $transportername =$_POST['transportername'];
            $truckno =$_POST['truckno'];
            $drivername = $_POST['drivername'];
            $mtaxrecieptno =$_POST['mtaxrecieptno'];
            $declaration = $_POST['declaration'];
            $applicationdate =$_POST['applicationdate'];
            $status =$_POST['status'];
            $mfid = $_POST['mfid'];
	$query = "UPDATE mandia11 SET
	        suppliername ='$suppliername',
            stockitem ='$stockitem',
            stockopening ='$stockopening',
            stockgatepass ='$stockgatepass',
            bag ='$bag',
            netqty ='$netqty',
            grossqty ='$grossqty',
            value = '$value',
            transportername ='$transportername',
            truckno ='$truckno',
            drivername = '$drivername',
            mtaxrecieptno ='$mtaxrecieptno',
            declaration ='$declaration',
            applicationdate = STR_TO_DATE('$applicationdate','%d/%m/%Y'),
			status ='$status'
            WHERE mfid='$mfid'";
	        mysql_query($query);
	 //echo $query;
	 if (!mysql_query($query,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
   echo "<script>alert('Data updated successfully.');location.href='a11mandiform10_view.php'</script>"; 

        

}
?>
<?php

try {
$query = "SELECT `mfid`, `fid`, `suppliername`, `stockitem`, `stockopening`, `stockgatepass`, `bag`, `netqty`, `grossqty`, `value`, `transportername`, `truckno`, `drivername`, `mtaxrecieptno`, `declaration`, `status`,DATE_FORMAT(applicationdate,'%d/%m/%Y')  as applicationdate,DATE_FORMAT(entrydate,'%d/%m/%Y')  as entrydate,`balance` FROM `mandia11` WHERE mfid=?";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['mfid']);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
            $suppliername =$row['suppliername'];
            $stockitem =$row['stockitem'];
            $stockopening =$row['stockopening'];
            $stockgatepass =$row['stockgatepass'];
            $bag =$row['bag'];
            $netqty =$row['netqty'];
            $grossqty =$row['grossqty'];
            $value = $row['value'];
            $transportername =$row['transportername'];
            $truckno =$row['truckno'];
            $drivername = $row['drivername'];
            $mtaxrecieptno =$row['mtaxrecieptno'];
            $declaration = $row['declaration'];
            $entrydate =$row['entrydate'];
			 $applicationdate =$row['applicationdate'];
            $status =$row['status'];
			$balance =$row['balance'];
            $mfid = $row['mfid'];
} catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="..//style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>
<script type="text/javascript">
function phappycode1(){
document.form1.suppliername.value = document.form1.s1.value;
}
function phappycode2(){
document.form1.stockitem.value = document.form1.s2.value;
}
function phappycode3(){
document.form1.transportername.value = document.form1.s3.value;
}


</script>

<style>
pre{
	font-size:13px;
	
}
</style>
</head>
<body>
<?php include('../include/header.php');?>
<?php include('../include/menu1.php');?>
<div id="gutter"></div>
<div id="col1">
  <h2>Menu</h2>
  <?php include('../include/sidemenu.php');?>
  <p>&nbsp;</p>
</div>
<div id="col4">
  <h2 align="center"><span style="color:#F17327;">mandi form 10 edit form</span></h2>
  <p align="center">&nbsp;</p>
  <form id="form1" name="form1" method="post" action="">
    
	<div>

<table style="width:100%">
  <tr>
  <td>
    <center><h2>प्रारूप - दस</h2></center>
	
	<center><h2>अनुज्ञा-पत्र हेतु घोषणा पत्र</h2></center>
	
	<center><p><b>(अधिनियम की धारा 19 की उपधारा(6) एवं</b></p></center>
	
	<center><p><b>उपविधी 20 (1) के अंतर्गत)</b></p></center>
	</td>

	
	<td>

	<table border="1"; style="border-collapse: collapse";>
	<tr>
	<td>पिछला स्टाॅक </td>
	<td> <?php echo $stockopening ?> </td>
	</tr>
	<tr>
	<td>निकासी</td>
	<td><?php echo $stockgatepass ?></td>
	</tr>
	<tr>
	<td>शेष स्टाॅक </td>
	<td><?php echo $balance ?></td>
	</tr>
	
	</td>
	</tr>
	</table>
	</table>
	
	</div>
	<pre>
	1-	कृषि उपज के स्वामी /व्यापारी का नाम-..........................<?php echo $suppliername?>.........................</pre>
	<pre>
	2-	कृषि उपज के स्वामित्व संबधी विवरण-..................................................................</pre>
	<pre>
                   क-व्यापारी की दषा मंे 	-</pre>

      <pre>                   1-	वाणिज्यिक कर अधिनियम के तहत पंजीयन क्रमंाक	.............................................</pre>

                    <pre>                   2-	मंण्डी समिति की अनुज्ञप्ति (लाईसेंस क्रमांक)...............................थोक...................</pre>

                      <pre>                   कृषि उपज मंण्डी समिति का नाम -.................,तहसील-..................जिला-..................</pre>
				
		   <pre>                   ख-व्यक्ति या उत्पादक की दषा मंे </pre>
	                 
			<pre>                   1-	गांव का नाम/तहसील/जिला</pre>
	                 
			<pre>                   2-	कुल गांव भूमि का रकवा जो स्वामित्व मंे हों</pre>
	   
	        <pre>                   3-	राजस्व ऋण पुस्तिका नम्बर</pre>
			
		<pre>	3-	   1.   प्रदेषके बाहर के ब्यापारी/क्रेता का नाम जिसकों कृषि उपज राज्य के बाहर भेजी जा रही है।</pre>

<pre>                   2.	विक्रयकर/वाणिज्यिक कर पंजीयन क्रंमाक / टिन नम्बर:</pre>

<pre>                   3.	केन्द्रीय विक्रय कर अधिनियम के अंन्तर्गत पंजीयन क्रमांक:</pre>

<pre>        4-     	   कृषि उपज के विवरण</pre>

<pre>                   1. कृषि उपज का नाम:  <?php echo $stockitem?> </pre>

<pre>                   2. मात्रा (नग):  <?php echo $bag ?> </pre>			

<pre>                   3. क्ुल बजन	 <?php echo $netqty ?>  ः		कृषि वजन <?php echo $grossqty ?> 	ः	दर:</pre>

<pre>                   4. मूल्य    <?php echo $value ?>  </pre>

<pre>        5-	   व्यापारी द्वारा जारी इन्वाईस क्रमांक	ः		दिनंाक 		ः</pre>

<pre>                  (उत्पादक की दषा मंे ग्राम पंचायत के सरपंच का प्रमाण-पत्र या ऋणपुस्तिका के सम्बधित भाग की छायाप्रति जिसमंे उत्पादक द्वारा</pre>

 <pre>                   धारित कुल कृषि भूमि का उल्लेख हों)</pre>

<pre>        6-         परिवहन /ट्रांसपोर्ट कम्पनी का नाम और पता/स्वामी का नाम:</pre>

<pre>                   गाडी मालिक:	 <?php echo $transportername ?> 		ड्राईवर का नाम    <?php echo $drivername ?>  </pre>

<pre>        7-	   मंण्डी शुल्क का रसीद नम्बर एवं दिनांक:    <?php echo $mtaxrecieptno ?>  </pre>

<pre>        8- 	   वाहन क्रमंाक     <?php echo $truckno ?>   </pre>
<br>

<pre>                               मंे ............................................ (कृषि उपज के स्वामी का नाम) एतद् द्वारा</pre>

 <pre>                    धोषणा करता हूं। कि उपरोक्त विवरण मेरी सर्वोत्तम जानकारी सें सत्य है। अतः अनुज्ञा-पत्र प्रदाय करने का कष्ठ करें।</pre>
 <br>
 
 
 <pre>                    दिनांक:                                                            स्वामी के हस्ताक्षर एवं उनकी स्थिति  </pre>
 
 <pre>                    स्थान:	                                              फर्म या कम्पनी या व्यापारी की दषा मंे मुद्रा  </pre>
	
	
	
</form>&nbsp;
</div>
<?php include('../include/footer.php');?>
</body>
</html>
