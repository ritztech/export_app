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
<script language="javascript" type="text/javascript" src="jscode/printdiv.js"> </script>
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








</head>


<body>


<?php include('../include/header.php');?>


<?php include('../include/sidemenu.php');?>



<div align="center">

<br>
  <h2 align="center"><span style="color:#F17327;">mandi form 10 edit form</span></h2>


  <form id="form1" name="form1" method="post" action="">

<div id = "griddiv">
    <table width="680" border="1" cellpadding="6" frame="box" rules="none">


      <tbody>


        <tr>


          <td colspan="4"  bgcolor="#14C4B6"><h4 align="center">APPLICATION DETAILS </h4></td>
        </tr>


        


		<tr>


          <td width="74">&nbsp;</td>


          <td width="144">&nbsp;</td>


          <td width="180"><div align="right">&#2346;&#2367;&#2331;&#2354;&#2366; &#2360;&#2381;&#2335;&#2366;&#2373;&#2325;</div></td>


          <td width="214"><input type="text" value="<?php echo $stockopening ?>" name="stockopening"/></td>
        </tr>


		<tr>


          <td>&nbsp;</td>


          <td >&nbsp;</td>


          <td><div align="right">&#2344;&#2367;&#2325;&#2366;&#2360;&#2368;</div></td>


          <td><input type="text" name="stockgatepass" value="<?php echo $stockgatepass ?>"/></td>
        </tr>


		<tr>


          <td>&nbsp;</td>


          <td >&nbsp;</td>


          <td><div align="right">&#2358;&#2375;&#2359; &#2360;&#2381;&#2335;&#2366;&#2373;&#2325;</div></td>


          <td><input name="balance" type="text" id="balance" readonly="readonly" value="<?php echo $balance ?>" /></td>
        </tr>


		<tr>


          <td>&nbsp;</td>


          <td >&nbsp;</td>


          <td><div align="left">&#2346;&#2381;&#2352;&#2366;&#2352;&#2370;&#2346; - &#2342;&#2360;</div></td>


          <td></td>
        </tr>


		<tr>


          <td>&nbsp;</td>


          <td colspan="2" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#2309;&#2344;&#2369;&#2332;&#2381;&#2334;&#2366;-&#2346;&#2340;&#2381;&#2352; &#2361;&#2375;&#2340;&#2369; &#2328;&#2379;&#2359;&#2339;&#2366; &#2346;&#2340;&#2381;&#2352;</td>
          <td></td>
        </tr>


        <tr>


          <td>&nbsp;</td>


          <td colspan="3" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  &#2309;&#2343;&#2367;&#2344;&#2367;&#2351;&#2350; &#2325;&#2368; &#2343;&#2366;&#2352;&#2366; 19 &#2325;&#2368; &#2313;&#2346;&#2343;&#2366;&#2352;&#2366;(6) &#2319;&#2357;&#2306; &#2313;&#2346;&#2357;&#2367;&#2343;&#2368; 20 (1) &#2325;&#2375; &#2309;&#2306;&#2340;&#2352;&#2381;&#2327;&#2340;)</td>
        </tr>


        <tr>


          <td colspan="2">&#2325;&#2371;&#2359;&#2367; &#2313;&#2346;&#2332; &#2325;&#2375; &#2360;&#2381;&#2357;&#2366;&#2350;&#2368; /&#2357;&#2381;&#2351;&#2366;&#2346;&#2366;&#2352;&#2368; &#2325;&#2366; &#2344;&#2366;&#2350; </td>


          <td colspan="2"><input type="text" name="suppliername2" size="40" value="<?php echo $suppliername?>" id="suppliername" /></td>


        </tr>


		<tr>


          <td colspan="3">&#2325;&#2371;&#2359;&#2367; &#2313;&#2346;&#2332; &#2325;&#2375; &#2360;&#2381;&#2357;&#2366;&#2350;&#2367;&#2340;&#2381;&#2357; &#2360;&#2306;&#2348;&#2343;&#2368; &#2357;&#2367;&#2357;&#2352;&#2339; &#2325;-&#2357;&#2381;&#2351;&#2366;&#2346;&#2366;&#2352;&#2368; &#2325;&#2368; &#2342;&#2359;&#2366; &#2350;&#2306;&#2375;</td>


          


          <td></td>
        </tr>


		<tr>


          <td>&nbsp;</td>


          <td colspan="2" >1.&#2357;&#2366;&#2339;&#2367;&#2332;&#2381;&#2351;&#2367;&#2325; &#2325;&#2352; &#2309;&#2343;&#2367;&#2344;&#2367;&#2351;&#2350; &#2325;&#2375; &#2340;&#2361;&#2340; &#2346;&#2306;&#2332;&#2368;&#2351;&#2344; &#2325;&#2381;&#2352;&#2350;&#2306;&#2366;&#2325;</td>


        
          <td></td>
        </tr>


		<tr>


          <td>&nbsp;</td>


          <td colspan="3" >2.&#2350;&#2306;&#2339;&#2381;&#2337;&#2368; &#2360;&#2350;&#2367;&#2340;&#2367; &#2325;&#2368; &#2309;&#2344;&#2369;&#2332;&#2381;&#2334;&#2346;&#2381;&#2340;&#2367; (&#2354;&#2366;&#2312;&#2360;&#2375;&#2306;&#2360; &#2325;&#2381;&#2352;&#2350; &#2341;&#2379;&#2325;&#2307;	&#2366;&#2306;&#2325;) </td>
        </tr>


		<tr>


          <td colspan="2">&#2325;&#2371;&#2359;&#2367; &#2313;&#2346;&#2332; &#2350;&#2306;&#2339;&#2381;&#2337;&#2368; &#2360;&#2350;&#2367;&#2340;&#2367; &#2325;&#2366; &#2344;&#2366;&#2350;_________</td>


         


          <td>&#2340;&#2361;0________________</td>


          <td>&#2332;&#2367;&#2354;&#2366;____________________</td>
        </tr>


		


		<tr>


          <td colspan="2">&#2357;&#2381;&#2351;&#2325;&#2381;&#2340;&#2367; &#2351;&#2366; &#2313;&#2340;&#2381;&#2346;&#2366;&#2342;&#2325; &#2325;&#2368; &#2342;&#2359;&#2366; &#2350;&#2306;&#2375;</td>


          


          <td>_____________________________</td>


          <td></td>
        </tr>


		<tr>


          <td colspan="2">&#2327;&#2366;&#2306;&#2357; &#2325;&#2366; &#2344;&#2366;&#2350;/&#2340;&#2361;&#2360;&#2368;&#2354;/&#2332;&#2367;&#2354;&#2366;</td>


          


          <td>______________________________</td>


          <td></td>
        </tr>


		<tr>


          <td colspan="2">&#2325;&#2369;&#2354; &#2327;&#2366;&#2306;&#2357; &#2349;&#2370;&#2350;&#2367; &#2325;&#2366; &#2352;&#2325;&#2357;&#2366; &#2332;&#2379; &#2360;&#2381;&#2357;&#2366;&#2350;&#2367;&#2340;&#2381;&#2357; &#2350;&#2306;&#2375; &#2361;&#2379;&#2306;</td>


         


          <td>____________________________</td>


          <td></td>
        </tr>


		<tr>


          <td colspan="2">&#2352;&#2366;&#2332;&#2360;&#2381;&#2357; &#2315;&#2339; &#2346;&#2369;&#2360;&#2381;&#2340;&#2367;&#2325;&#2366; &#2344;&#2350;&#2381;&#2348;&#2352;</td>


         


          <td>_____________________________</td>


          <td></td>
        </tr>


        <tr>


          <td colspan="4">&#2346;&#2381;&#2352;&#2342;&#2375;&#2359;&#2325;&#2375; &#2348;&#2366;&#2361;&#2352; &#2325;&#2375; &#2348;&#2381;&#2351;&#2366;&#2346;&#2366;&#2352;&#2368;/&#2325;&#2381;&#2352;&#2375;&#2340;&#2366; &#2325;&#2366; &#2344;&#2366;&#2350; &#2332;&#2367;&#2360;&#2325;&#2379;&#2306; &#2325;&#2371;&#2359;&#2367; &#2313;&#2346;&#2332; &#2352;&#2366;&#2332;&#2381;&#2351; &#2325;&#2375; &#2348;&#2366;&#2361;&#2352; &#2349;&#2375;&#2332;&#2368; &#2332;&#2366; &#2352;&#2361;&#2368; &#2361;&#2376;&#2404;_______________________</td>
        </tr>


        <tr>


          <td colspan="3">&#2357;&#2367;&#2325;&#2381;&#2352;&#2351;&#2325;&#2352;/&#2357;&#2366;&#2339;&#2367;&#2332;&#2381;&#2351;&#2367;&#2325; &#2325;&#2352; &#2346;&#2306;&#2332;&#2368;&#2351;&#2344; &#2325;&#2381;&#2352;&#2306;&#2350;&#2366;&#2325; / &#2335;&#2367;&#2344; &#2344;&#2350;&#2381;&#2348;&#2352;_____________________</td>


         


       


          <td></td>
        </tr>


        <tr>


          <td colspan="3">&#2325;&#2375;&#2344;&#2381;&#2342;&#2381;&#2352;&#2368;&#2351; &#2357;&#2367;&#2325;&#2381;&#2352;&#2351; &#2325;&#2352; &#2309;&#2343;&#2367;&#2344;&#2367;&#2351;&#2350; &#2325;&#2375; &#2309;&#2306;&#2344;&#2381;&#2340;&#2352;&#2381;&#2327;&#2340; &#2346;&#2306;&#2332;&#2368;&#2351;&#2344; &#2325;&#2381;&#2352;&#2350;&#2366;&#2306;&#2325;________________</td>


        


          <td></td>
        </tr>


        <tr>


          <td colspan="2">&#2325;&#2371;&#2359;&#2367; &#2313;&#2346;&#2332; &#2325;&#2375; &#2357;&#2367;&#2357;&#2352;&#2339;</td>


         


          <td>____________________________</td>


          <td></td>
        </tr>


        <tr>


          <td colspan="2">&#2325;&#2371;&#2359;&#2367; &#2313;&#2346;&#2332; &#2325;&#2366; &#2344;&#2366;&#2350; </td>



          <td><input type="text" name="stockitem" value="<?php echo $stockitem?>" id="textfield10" /></td>


          <td></td>
        </tr>


        <tr>


          <td>&#2350;&#2366;&#2340;&#2381;&#2352;&#2366; (&#2344;&#2327;) </td>


          <td ><input type="text" name="bag" value="<?php echo $bag ?>"/></td>


          <td>&nbsp;</td>


          <td></td>
        </tr>


        <tr>


          <td>&#2325;&#2381;&#2369;&#2354; &#2348;&#2332;&#2344; </td>


          <td ><input type="text" name="netqty" value="<?php echo $netqty ?>"/></td>


          <td>&#2325;&#2371;&#2359;&#2367; &#2357;&#2332;&#2344;</td>


          <td><input type="text" name="grossqty" id="textfield2" value="<?php echo $grossqty ?>" /></td>
        </tr>


		<tr>


          <td>&#2342;&#2352;:</td>


          <td >&nbsp;</td>


          <td>&#2350;&#2370;&#2354;&#2381;&#2351;</td>


          <td><input type="text" name="value" id="textfield5" value="<?php echo $value ?>" /></td>
        </tr>


		<tr>


          <td colspan="3">&#2357;&#2381;&#2351;&#2366;&#2346;&#2366;&#2352;&#2368; &#2342;&#2381;&#2357;&#2366;&#2352;&#2366; &#2332;&#2366;&#2352;&#2368; &#2311;&#2344;&#2381;&#2357;&#2366;&#2312;&#2360; &#2325;&#2381;&#2352;&#2350;&#2366;&#2306;&#2325;	&#2307;		&#2342;&#2367;&#2344;&#2306;&#2366;&#2325;________________________</td>


          <td></td>
        </tr>


		<tr>


          <td colspan="4">&#2313;&#2340;&#2381;&#2346;&#2366;&#2342;&#2325; &#2325;&#2368; &#2342;&#2359;&#2366; &#2350;&#2306;&#2375; &#2327;&#2381;&#2352;&#2366;&#2350; &#2346;&#2306;&#2330;&#2366;&#2351;&#2340; &#2325;&#2375; &#2360;&#2352;&#2346;&#2306;&#2330; &#2325;&#2366; &#2346;&#2381;&#2352;&#2350;&#2366;&#2339;-&#2346;&#2340;&#2381;&#2352; &#2351;&#2366; &#2315;&#2339;&#2346;&#2369;&#2360;&#2381;&#2340;&#2367;&#2325;&#2366; &#2325;&#2375; &#2360;&#2350;&#2381;&#2348;&#2343;&#2367;&#2340; &#2349;&#2366;&#2327; &#2325;&#2368; &#2331;&#2366;&#2351;&#2366;&#2346;&#2381;&#2352;&#2340;&#2367; &#2332;&#2367;&#2360;&#2350;&#2306;&#2375; &#2313;&#2340;&#2381;&#2346;&#2366;&#2342;&#2325; &#2342;&#2381;&#2357;&#2366;&#2352;&#2366; &#2343;&#2366;&#2352;&#2367;&#2340; &#2325;&#2369;&#2354; &#2325;&#2371;&#2359;&#2367; &#2349;&#2370;&#2350;&#2367; &#2325;&#2366; &#2313;&#2354;&#2381;&#2354;&#2375;&#2326; &#2361;&#2379;&#2306;</td>
        </tr>


		<tr>


          <td colspan="2">&#2346;&#2352;&#2367;&#2357;&#2361;&#2344; /&#2335;&#2381;&#2352;&#2366;&#2306;&#2360;&#2346;&#2379;&#2352;&#2381;&#2335; &#2325;&#2350;&#2381;&#2346;&#2344;&#2368; &#2325;&#2366; &#2344;&#2366;&#2350; &#2324;&#2352; &#2346;&#2340;&#2366;/&#2360;&#2381;&#2357;&#2366;&#2350;&#2368; &#2325;&#2366; &#2344;&#2366;&#2350;</td>



          <td colspan="2"><input type="text" name="transportername" size="49" value="<?php echo $transportername ?>" id="textfield" /></td>
        </tr>


        <tr>


          <td>&#2327;&#2366;&#2337;&#2368; &#2350;&#2366;&#2354;&#2367;&#2325;</td>


          <td ><input type="text" name="truckno" value="<?php echo $truckno ?>" id="textfield3" /></td>


          <td>&#2337;&#2381;&#2352;&#2366;&#2312;&#2357;&#2352; &#2325;&#2366; &#2344;&#2366;&#2350;</td>


          <td><input type="text" name="drivername" size="30" id="textfield4" value="<?php echo $drivername ?>" /></td>
        </tr>


        <tr>
          <td colspan="2">&#2357;&#2366;&#2361;&#2344; &#2325;&#2381;&#2352;&#2350;&#2306;&#2366;&#2325;_________________</td>
        
          <td>&nbsp;</td>
          <td></td>
        </tr>
        <tr>


          <td colspan="2">&#2350;&#2306;&#2339;&#2381;&#2337;&#2368; &#2358;&#2369;&#2354;&#2381;&#2325; &#2325;&#2366; &#2352;&#2360;&#2368;&#2342; &#2344;&#2350;&#2381;&#2348;&#2352; &#2319;&#2357;&#2306; &#2342;&#2367;&#2344;&#2366;&#2306;&#2325;</td>


        
          <td><input type="text" name="mtaxrecieptno" value="<?php echo $mtaxrecieptno ?>" id="textfield7" size="30" /></td>


          <td>&nbsp;</td>
        </tr>


        <tr>


          <td colspan="4">&#2325;&#2371;&#2359;&#2367; &#2313;&#2346;&#2332; &#2325;&#2375; &#2360;&#2381;&#2357;&#2366;&#2350;&#2368; &#2325;&#2366; &#2344;&#2366;&#2350;) &#2319;&#2340;&#2342;&#2381; &#2342;&#2381;&#2357;&#2366;&#2352;&#2366; &#2343;&#2379;&#2359;&#2339;&#2366; &#2325;&#2352;&#2340;&#2366; &#2361;&#2370;&#2306;&#2404; &#2325;&#2367; &#2313;&#2346;&#2352;&#2379;&#2325;&#2381;&#2340; &#2357;&#2367;&#2357;&#2352;&#2339; &#2350;&#2375;&#2352;&#2368; &#2360;&#2352;&#2381;&#2357;&#2379;&#2340;&#2381;&#2340;&#2350; &#2332;&#2366;&#2344;&#2325;&#2366;&#2352;&#2368; &#2360;&#2375;&#2306; &#2360;&#2340;&#2381;&#2351; &#2361;&#2376;&#2404; &#2309;&#2340;&#2307; &#2309;&#2344;&#2369;&#2332;&#2381;&#2334;&#2366;-&#2346;&#2340;&#2381;&#2352; &#2346;&#2381;&#2352;&#2342;&#2366;&#2351; &#2325;&#2352;&#2344;&#2375; &#2325;&#2366; &#2325;&#2359;&#2381;&#2336; &#2325;&#2352;&#2375;&#2306;&#2404;</td>
        </tr>


        <tr>


          <td>&#2342;&#2367;&#2344;&#2366;&#2306;&#2325;:</td>


          <td >___________________</td>


          <td colspan="2">&#2361;&#2360;&#2381;&#2340;&#2366;&#2325;&#2381;&#2359;&#2352; &#2319;&#2357;&#2306; &#2313;&#2344;&#2325;&#2368; &#2360;&#2381;&#2341;&#2367;&#2340;&#2367;__________________________________</td>
        </tr>


        <tr>


          <td>&#2360;&#2381;&#2341;&#2366;&#2344;</td>


          <td >__________________</td>


          <td colspan="2">&#2352;&#2381;&#2350; &#2351;&#2366; &#2325;&#2350;&#2381;&#2346;&#2344;&#2368; &#2351;&#2366; &#2357;&#2381;&#2351;&#2366;&#2346;&#2366;&#2352;&#2368; &#2325;&#2368; &#2342;&#2359;&#2366; &#2350;&#2306;&#2375; &#2350;&#2369;&#2342;&#2381;&#2352;&#2366;____________________</td>
        </tr>


              


        <tr>


          <td>&nbsp;</td>


          <td><input type="hidden" name="fid" id="textfield13" value="<?php echo $fid; ?>" />&nbsp;


          <input type="hidden" name="mfid" value="<?php echo $mfid ?>"/></td>


          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
    </table>
</div>

  <p align="left">
    <input type="button" name="btnprint" value="Print" onclick="PrintMe('griddiv')"/></p>
  </form>
   


</div>



</body>


</html>


