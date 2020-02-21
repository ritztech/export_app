<?php
error_reporting(0);
session_start();

if(!isset($_SESSION['uname'])) {echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";}

$fid=$_SESSION['fid'];


require '../conf.php';
//$id = $_GET['id'];


try {

$query = "SELECT `siid`, `fid`, `soid`, `partyname`, `billno`,DATE_FORMAT(date,'%d/%m/%Y') as date, `stfcondition`, `etfcondition`, `mtfcondition`, `transportname`, `crosingtname`, `brokername`, `paymentterms`, `mandigatepass`, 
`issuesamiti`, `truckno`, `billtyno`, `otherdoc`, `porderno`, `freighttotal`, `freightadv`, `freightpaid`, `weightbridgename`,
 DATE_FORMAT(weightdate,'%d/%m/%Y') as weightdate, `kantano`, `unit`, `grossweight1`, `netweight1`, `tareweight`,
 DATE_FORMAT(billtydate,'%d/%m/%Y') as billtydate, `bag1`, `grossweight2`, `mandigatepass1`, `billweight`, `rateoftax1`, `rateofgoods1`, `value1`,
 `vattax1`, `billvalue1`, `ledgername`,ledgername_n,supid,brkid,trid FROM `mandia6` WHERE siid=?";

$stmt = $dbc->prepare($query);

$stmt->bindParam(1, $_GET['siid']);

$stmt->execute();

$row=$stmt->fetch(PDO::FETCH_ASSOC);


           			$ledgername_n_1 =$row['ledgername_n'];
			$supid_1 =$row['supid'];
            
			
			
				$result1 = mysql_query("SELECT 	leg_name,fac_addr,tinno from ledger_master  where legid = $supid_1");
$row1 = mysql_fetch_array($result1);

$p_name = $row1[0];

//echo $p_name;

$off_addr1 = $row1[1];
$tinno1 = $row1[2];



			$brkid111 =$row['brkid'];
			$trkid111 =$row['trid'];
			
			$partyname =$row['partyname'];
			
			//echo $partyname;

            $billno =$row['billno'];

			$weightbridgename=$row['weightbridgename'];

			$weightdate=$row['weightdate'];

			$kantano=$row['kantano'];

			$unit=$row['unit'];

			$grossweight1=$row['grossweight1'];

			$netweight1=$row['netweight1'];

			$tareweight=$row['tareweight'];

            $date =$row['date'];

            $bag =$row['bag'];

            $packing =$row['packing'];

            $grossweight =$row['grossweight'];

            $weight4billed = $row['weight4billed'];

            $netweight =$row['netweight'];

            $stfcondition =$row['stfcondition'];

            $etfcondition = $row['etfcondition'];

            $mtfcondition =$row['mtfcondition'];

            $transportname = $row['transportname'];

            $crosingtname = $row['crosingtname'];

            $brokername =$row['brokername'];

            $paymentterms =$row['paymentterms'];

            $mandigatepass = $row['mandigatepass'];

            $issuesamiti =$row['issuesamiti'];

            $quantity = $row['quantity'];

            $truckno = $row['truckno'];

            $billtyno = $row['billtyno'];

			$otherdoc = $row['otherdoc'];

			$porderno = $row['porderno'];

			$freighttotal = $row['freighttotal'];

			$freightadv = $row['freightadv'];

			$freightpaid = $row['freightpaid'];

			$bag1 =  $row['bag1'];

            $grossweight2 =  $row['grossweight2'];

            $mandigatepass1 =  $row['mandigatepass1'];

            $billweight =  $row['billweight'];

            $rateoftax1 =  $row['rateoftax1'];

            $rateofgoods1 =  $row['rateofgoods1'];

            $value1 =  $row['value1'];

            $vattax1 =  $row['vattax1'];

            $billvalue1 =  $row['billvalue1'];

			$billtydate =  $row['billtydate'];

			$ledgername =  $row['ledgername'];

            $siid = $row['siid'];
			$calmethod = "MINUS";
			
			
						  if($calmethod == "ADD")
			  {
				  		$tot_1 = 	 round($billvalue1,2) + round($freighttotal,2);
			  }
			  else
			  {
						$tot_1 = 	 round($billvalue1,2) - round($freighttotal,2);  
			  }
			
			

																							 

            $stfcondition_qry  = mysql_query("SELECT salestaxform,taxid from taxform  where taxid = $stfcondition");

            $stfcondition  = mysql_fetch_array($stfcondition_qry);

			

					

			$mtfcondition_qry  = mysql_query("SELECT  manditaxform,taxid from taxform  where taxid = $mtfcondition");

            $mtfcondition  = mysql_fetch_array($mtfcondition_qry);

			

			$etfcondition_qry  = mysql_query("SELECT 	entrytaxform,taxid from taxform  where taxid = $etfcondition");

            $etfcondition  = mysql_fetch_array($etfcondition_qry);

			

			

} catch(PDOException $e) {

	echo "Error: " . $e->getMessage();

}


function convert_number($number) 
{ 
    if (($number < 0) || ($number > 999999999)) 
    { 
    throw new Exception("Number is out of range");
    } 

    $Gn = floor($number / 1000000);  /* Millions (giga) */ 
    $number -= $Gn * 1000000; 
    $kn = floor($number / 1000);     /* Thousands (kilo) */ 
    $number -= $kn * 1000; 
    $Hn = floor($number / 100);      /* Hundreds (hecto) */ 
    $number -= $Hn * 100; 
    $Dn = floor($number / 10);       /* Tens (deca) */ 
    $n = $number % 10;               /* Ones */ 

    $res = ""; 

    if ($Gn) 
    { 
        $res .= convert_number($Gn) . " Million"; 
    } 

    if ($kn) 
    { 
        $res .= (empty($res) ? "" : " ") . 
            convert_number($kn) . " Thousand"; 
    } 

    if ($Hn) 
    { 
        $res .= (empty($res) ? "" : " ") . 
            convert_number($Hn) . " Hundred"; 
    } 

    $ones = array("", "One", "Two", "Three", "Four", "Five", "Six", 
        "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", 
        "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", 
        "Nineteen"); 
    $tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", 
        "Seventy", "Eigthy", "Ninety"); 

    if ($Dn || $n) 
    { 
        if (!empty($res)) 
        { 
            $res .= " and "; 
        } 

        if ($Dn < 2) 
        { 
            $res .= $ones[$Dn * 10 + $n]; 
        } 
        else 
        { 
            $res .= $tens[$Dn]; 

            if ($n) 
            { 
                $res .= "-" . $ones[$n]; 
            } 
        } 
    } 

    if (empty($res)) 
    { 
        $res = "zero"; 
    } 

    return $res; 
} 

	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style4 {font-size: 14px}
.style5 {color: #FF0000}
-->
</style>

<script language="javascript" type="text/javascript" >
function jumpto(){

document.getElementById("ntable").deleteRow(0);
			
			document.location.href = "salesinvoice_view.php";
			window.print();
	
}

function closeMe()
{
document.location.href = "salesinvoice_view.php";	
}


</script>

<style>

.noprint {
display: none;
}
</style>


</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="0" id = "ntable"  align="center">
  <tr>
<td  align = "center"> 
<input type="button"  id = "printtable" name="btnprint" value="Print" onClick="jumpto() "/>
*****************<input type="button" id = "printtable1" name="CloseMe" value="Close Me" onClick="closeMe()"/>
  </td>
</tr>
<tr>
<td colspan="8"> 
<pre>











</pre>
 </td>
</tr>
   
  
    
   
    <tr>
      <td>
	  <table width="100%" border="0">
        <tr>
		<td style="width:40px;" ></td>
          <td><?php echo $billno;  ?> </td>
         
          <td colspan="3" align="right"> 
		  <span style="margin-right:80px;"><?php  echo  $date ?></span>
            </td>
          </tr>
		  
		   <tr>		
          <td colspan="5" style="height:10px;"></td>
          </tr>
		  
        <tr>
		<td style="width:40px;"></td>
          <td colspan="4"><?php  echo  $p_name ?>
            </td>
          </tr>
		  
		   <tr>		
          <td colspan="5" style="height:11px;"></td>
          </tr>
        <tr>
		<td style="width:40px;"></td>
          <td colspan="2"><?php  echo  $off_addr1 ?> </td>
        
          <td style="width:200px;"></td>
		  <td><?php  echo  $tinno1 ?></td>
          </tr>
		  
		   <tr>		
          <td colspan="5" style="height:12px;"></td>
          </tr>
        <tr>
		<td style="width:40px;"></td>
          <td><?php  echo  $freighttotal ?>
            </td>
          <td colspan="2" style="text-indent:40px;"> <?php  echo  $freightadv ?></td>
          
          <td width="32%" style="text-indent:50px;"><?php  echo  $freightpaid ?>
            </td>
          </tr>
		  
		   <tr>		
          <td colspan="5" style="height:11px;"></td>
          </tr>
        <tr>
		<td style="width:40px;"></td>
          <td colspan="3"><?php  echo  $brokername ?>
            </td>
         
          <td style="text-indent:40px;"><?php  echo  strtoupper($truckno) ?></td>
          </tr>
		   <tr>		
          <td colspan="5" style="height:70px;"></td>
          </tr>
		  
      </table></td>
    </tr>

	
    <tr>
      <td colspan="8">
	  <table width="100%" border="0">
          
		  
  <?php 

$result13 = mysql_query("SELECT `stockid`, `bag`, `grswght`, `mandiwght`, `billwght`, `rot`, `rog`, `vale`, `vtou`, `bilvalue`, `remark`,stid 
FROM `stock_ref` WHERE formid=$siid

and tempid='A6'");

?>

  <?php

 $i = 1;

while($row13 = mysql_fetch_array($result13))

  {   $i = $i + 1; ?>

 <tr>
 <td></td>
   <td colspan="2" style="width:39.5%;"> <?php  echo  $row13['stockid'] ?> </td> 
      <td  style="width:9%;"> <?php  echo  $row13['remark'] ?> </td> 
	     <td style="width:9%;"> <?php  echo  $row13['bag'] ?> </td> 
		    <td style="width:12%;"> <?php  echo  $row13['grswght'] ?> </td> 
			   <td > <?php  echo  $row13['rog'] ?> </td> 
			      <td> <?php  echo  $row13['bilvalue'] ?> </td> 
 
 
</tr>

 <?php  }    ?>

 <tr>
   <td colspan="8">

   <?php 
   $count =$i;
   for($j=$count; $j<=13; $j++)
   {
	   
	   echo nl2br("\n");
   }
   
   ?>
   </td> 
     
 
 
</tr>

		
		
		
		
		
      
		
		
		
        <tr>
          

 
            <td COLSPAN = "8" align="right"  >
			 <span style="margin-right:50px;"><?php echo $freighttotal  ?>  </span>
            </td>
        
         
          
        </tr>
		 <tr>		
          <td colspan="8" style="height:1px;"></td>
          </tr>
		
		
		
		
		
		 <tr >
        
		 <td COLSPAN = "8" align="right"  >
			 <span style="margin-right:50px;"><?php echo $tot_1  ?>  </span>
            </td>
		
        
          
        </tr>
		
		
		
		
		
		
		
      </table></td>
    </tr>
	<tr>		
          <td colspan="15" style="height:3px;"></td>
          </tr>
	    <tr>
		
      <td style="text-indent:110px;">
	  
	 
      <?php
	//  $abc=$_POST['netpay'];
	
$cheque_amt = $tot_1 ; 
try
    {
    echo convert_number($cheque_amt);
    }
catch(Exception $e)
    {
    echo $e->getMessage();
    }
?>    Only

-</td>
    </tr>
	
   
    
  </table>
</form>
</body>
</html>




