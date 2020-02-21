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
 `vattax1`, `billvalue1`, `ledgername`,ledgername_n,supid,brkid,trid,freight_type,freight_receivable,contractnumber FROM `mandia6` WHERE siid=?";

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
			 $freight_type =$row['freight_type'];
			
			

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
			
			$freight_receivable = $row['freight_receivable'];
			
			$contractnumber = $row['contractnumber'];
			
			
			
			
			

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
			
			
						  if($freight_type == "1")
			  {
				  		$tot_1 = 	 round($billvalue1,2) + round($freight_receivable,2);
			  }
			  else
			  {
						$tot_1 = 	 round($billvalue1,2) - round($freight_receivable,2);  
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


/** 
*  Function:   convert_number 
*
*  Description: 
*  Converts a given integer (in range [0..1T-1], inclusive) into 
*  alphabetical format ("one", "two", etc.)
*
*  @int
*
*  @return string
*
*/ 
function convert_number($number) 
{  $no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'ONE', '2' => 'TWO',
    '3' => 'THREE', '4' => 'FOUR', '5' => 'FIVE', '6' => 'SIX',
    '7' => 'SEVEN', '8' => 'EIGHT', '9' => 'NINE',
    '10' => 'TEN', '11' => 'ELEVEN', '12' => 'TWELVE',
    '13' => 'THIRTEEN', '14' => 'FOURTEEN',
    '15' => 'FIFTEEN', '16' => 'SIXTEEN', '17' => 'SEVENTEEN',
    '18' => 'EIGHTEEN', '19' =>'NINETEEN', '20' => 'TWENTY',
    '30' => 'THIRTY', '40' => 'FORTY', '50' => 'FIFTY',
    '60' => 'SIXTY', '70' => 'SEVENTY',
    '80' => 'EIGHTY', '90' => 'NINETY');
   $digits = array('', 'HUNDRED', 'THOUSAND', 'LAKH', 'CRORE');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 'S' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' AND ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
//  echo $result . "RUPEES  " . $points . " Paise";
return ucwords(strtolower($result));
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

</head>

<body>
<form id="form1" name="form1" method="post" action="">

</br></br></br></br></br></br></br></br></br> </br> 

  <table width="100%"  align="center"  id = "ntable"  style="border-color:#FB5200;">
    <tr>
<td  align = "center"> 
<input type="button"  id = "printtable" name="btnprint" value="Print" onClick="jumpto() "/>
*****************<input type="button" id = "printtable1" name="CloseMe" value="Close Me" onClick="closeMe()"/>
  </td>
</tr>



    <tr>
      <td><table width="98%" border="0">
        <tr>
          <td width="43%">&#2325;&#2381;&#2352;&#2350;&#2366;&#2306;&#2325;  : <?php echo $billno;  ?>  </td>
         
          <td colspan="3" align="center">&#2342;&#2367;&#2344;&#2366;&#2306;&#2325; : .........<?php  echo  $date ?>................
            </td>
          </tr>
        <tr>
          <td colspan="4">&#2344;&#2366;&#2350; &#2325;&#2381;&#2352;&#2375;&#2340;&#2366; .........<?php  echo  strtoupper($p_name) ?>................ 
            </td>
          </tr>
        <tr>
          <td colspan="2">&#2360;&#2381;&#2341;&#2366;&#2344; .........<?php  echo  $off_addr1 ?>......................
            </td>
        
          <td colspan="2">TIN No..............<?php  echo  strtoupper($tinno1) ?>...........................</td>
          </tr>
        <tr>
          <td>&#2335;&#2381;&#2352;&#2325; &#2325;&#2367;&#2352;&#2366;&#2351;&#2366; ........<?php  echo  $freighttotal ?>..................
            </td>
          <td colspan="2">&#2319;&#2337;&#2357;&#2366;&#2306;&#2360;.. <?php  echo  $freightadv ?>...</td>
          
          <td width="32%">&#2358;&#2375;&#2359; .....<?php  echo  $freightpaid ?>.......
            </td>
          </tr>
        <tr>
          <td colspan="3">&#2342;&#2354;&#2366;&#2354; &#2358;&#2381;&#2352;&#2368; .........<?php  echo  strtoupper($brokername) ?>..CN - <?php echo $contractnumber  ?>............ 
            </td>
         
          <td >&#2335;&#2381;&#2352;&#2325; &#2344;....<?php  echo  strtoupper($truckno) ?>..
            </td>
          </tr>
		  
		    <?php 
			
			
		
$result13 = mysql_query("SELECT `stockid`, `bag`, `grswght`, `mandiwght`, `billwght`, `rot`, `rog`, `vale`, `vtou`, `bilvalue`, `remark`,stid ,w_per_bag
FROM `stock_ref` WHERE formid=$siid

and tempid='A6'");

?>


      </table></td>
    </tr>
	
	

    <tr>
      <td><table width="100%" border="1"  align = "cemter">
        <tr align="center" style="background-color:#FFE1D2;">
          <td width="31%">&#2357;&#2360;&#2381;&#2340;&#2369; &#2325;&#2366; &#2344;&#2366;&#2350;&nbsp; </td>
          <td width="7%">&#2349;&#2352;&#2340;&#2368; </td>
          <td width="9%">&#2340;&#2366;&#2342;&#2366;&#2342; </td>
          <td width="14%">&#2357;&#2332;&#2344; &#2325;&#2381;&#2357;&#2367;&#2306;&#2335;&#2354; &#2350;&#2375;&#2306; </td>
          <td width="9%">&#2349;&#2366;&#2357; &#2348;&#2379;&#2352;&#2368; /&#2325;&#2381;&#2357;&#2367;&#2306;&#2335;&#2354; </td>
			<td  width="12%" align="center">&#2350;&#2370;&#2354;&#2381;&#2351;   	 &#2352;&#2369;  </td>
        </tr>
		
		
		
		  <?php

 $i = 1;
 $tbill = 0;
 $t_bags3 = 0;
 $t_qty33 = 0;

while($row13 = mysql_fetch_array($result13))

  {   $i = $i + 1; ?>

 <tr>

 
 
 <td  style="width:9%;"> <?php  echo  $row13['stockid'] ?> </td>      
	     <td style="width:9%;"> <?php  echo  $row13['w_per_bag'] ?>  KG    </td> 
		 <td style="width:9%;"> <?php  echo  $row13['bag']  ?> Bags  </td> 
		    <td style="width:12%;"> <?php  echo number_format(round($row13['grswght'],2),2)   ?> </td> 
			   <td > <?php  echo   number_format(round($row13['rog'],2),2)    ?> </td> 
			      <td align = "right" > <?php  echo  number_format(round($row13['bilvalue'],2),2)     ?> </td> 
 
 
</tr>

 <?php  
 $tbill = $tbill +  $row13['bilvalue'];
  $t_bags3 =  $t_bags3 +  $row13['bag'];
  $t_qty33 = $t_qty33 + $row13['grswght'] ;


 }    ?>
 

    <?php 
   $count =$i;
   $roddd = 0;
   for($j=$count; $j<=8; $j++)
   {
	  $roddd = $roddd + 1; }
	  
	  
	    
   ?>
   

 
 <tr><td width="3%" > </td>  <td width="3%"> </td>  <td>   </td> <td>  </td>   <td>  </td> <td  align = "right"><br /><br /><br /><br />   </td>


</tr>

<tr> <td>   </td>    <td>  TOTAL   </td> <td> <?php echo   $t_bags3   ?>  Bags </td>    <td>   <?php echo  number_format(round($t_qty33,2),2)    ?>   </td>   <td>   </td>    <td  align = "right"> <?php  echo number_format(round($tbill,2),2)   ?>     </td>   </tr>
 
 <tr> <td  colspan = "4">  </td> <td  colspan = "1"  align = "right" >  &#2335;&#2381;&#2352;&#2325; &#2349;&#2366;&#2396;&#2366;	 </td> <td colspan = "1"  align = "right">   <?php echo  number_format(round($freight_receivable,2),2)    ?>  </td>    </tr>  

 
  <tr> <td  colspan = "4">  </td>  <td  colspan = "1"  align = "right">  &#2325;&#2369;&#2354; &#2351;&#2379;&#2327  </td> <td colspan = "1"  align = "right">  
    <?php echo  number_format(round($tot_1,2),2)    ?>  </td>    </tr>  

 
 

<tr>  <td colspan = "10", align = "left">Due Amount (in words): <?php $abc=round($tot_1);
	
$cheque_amt = $abc ; 
try
    {
    echo convert_number($cheque_amt) ;
    }
catch(Exception $e)
    {
    echo $e->getMessage();
    }    

  
  ?>
   	
      
         	

  
  only . </td>    </tr> 




  </table>
  
  
  
  
  
  
	
	
	
</form>
</body>
</html>

