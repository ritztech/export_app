<?php
error_reporting(0);
session_start();

if(!isset($_SESSION['uname'])) {echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";}

$fid=$_SESSION['fid'];


require '../conf.php';
//$id = $_GET['id'];


try {

$query = "SELECT `siid`, `fid`, `soid`, `partyname`, `billno`,DATE_FORMAT(date,'%d/%m/%Y') as date, `bag`, `packing`, `grossweight`, `weight4billed`, 
`netweight`, `stfcondition`, `etfcondition`, `mtfcondition`, `transportname`, `crosingtname`, `brokername`, `paymentterms`, `mandigatepass`, 
`issuesamiti`, `quantity`, `truckno`, `billtyno`, `otherdoc`, `porderno`, `freighttotal`, `freightadv`, `freightpaid`, `weightbridgename`,
 DATE_FORMAT(weightdate,'%d/%m/%Y') as weightdate, `kantano`, `unit`, `grossweight1`, `netweight1`, `tareweight`,
 DATE_FORMAT(billtydate,'%d/%m/%Y') as billtydate, `bag1`, `grossweight2`, `mandigatepass1`, `billweight`, `rateoftax1`, `rateofgoods1`, `value1`,
 `vattax1`, `billvalue1`, `ledgername`,ledgername_n,supid,brkid,trid,calmethod FROM `mandia6` WHERE siid=?";

$stmt = $dbc->prepare($query);

$stmt->bindParam(1, $_GET['siid']);

$stmt->execute();

$row=$stmt->fetch(PDO::FETCH_ASSOC);


           			$ledgername_n_1 =$row['ledgername_n'];
			$supid_1 =$row['supid'];
            
			
			
				$result1 = mysql_query("SELECT 	leg_name,fac_addr,tinno from ledger_master  where legid = $supid_1");
$row1 = mysql_fetch_array($result1);

$p_name = $row1[0];
$off_addr1 = $row1[1];
$tinno1 = $row1[2];



			$brkid111 =$row['brkid'];
			$trkid111 =$row['trid'];
			
			$partyname =$row['partyname'];

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
			$calmethod = $row['calmethod'];
			
			
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
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="4" align="center" style="border-color:#FB5200;">
    <tr>
      <td width="100%"><table width="100%" border="0">
        <tr>
          <td width="23%">Tin No-23647802148<br />
            <br /><br /><br /></td>
          <td width="49%" align="center"><span class="style4">||&#2358;&#2381;&#2352;&#2368; &#2366;&#2332;&#2367;&#2340;&#2344;&#2366;&#2341;&#2366;&#2351; &#2344;&#2350;&#2307; || &#2358;&#2381;&#2352;&#2368; &#2330;&#2367;&#2306;&#2340;&#2366;&#2350;&#2339;&#2368; &#2346;&#2366;&#2352;&#2381;&#2358;&#2381;&#2357; &#2344;&#2366;&#2341;&#2366;&#2351; &#2344;&#2350;&#2307; || </span><br />
		  ||&#2358;&#2381;&#2352;&#2368; &#2325;&#2381;&#2359;&#2375;&#2340;&#2381;&#2352;&#2346;&#2366;&#2354; &#2342;&#2375;&#2357;&#2366;&#2351; &#2344;&#2350;&#2307; ||<br />
		  &#2360;&#2349;&#2368; &#2346;&#2381;&#2352;&#2360;&#2306;&#2327;&#2379;&#2306; &#2325;&#2366; &#2344;&#2381;&#2351;&#2366;&#2351; &#2325;&#2381;&#2359;&#2375;&#2340;&#2381;&#2352; &#2335;&#2368;&#2325;&#2350;&#2327;&#2397; &#2344;&#2381;&#2351;&#2366;&#2351;&#2366;&#2354;&#2351; &#2361;&#2379;&#2327;&#2366; |<br /> 
		  <br /></td>
          <td width="28%" align="right">Rajesh- +91-9425141830<br />
           Sanjeev- +91- 9425141819<br />
		   +91-9806711919<br />
            Mill - +91-07683-241161</td>
        </tr>
      </table>      </td>
    </tr>
    <tr style="background-color:#FF0000; color:#FFFFFF;">
      <td> <table width="100%" border="0">
  <tr >
    <td width="40%" align="center">
     <span style="font-size:24px;"><strong> &#2346;&#2381;&#2352;&#2375;&#2352;&#2339;&#2366; &#2398;&#2370;&#2337; &#2346;&#2381;&#2352;&#2379;&#2360;&#2375;&#2360;&#2367;&#2306;&#2327;</strong></span></td>
    <td width="22%"><img  src="PRERNA.png" width="154" /></td>
    <td width="38%" align="center"><span style="font-size:14px;"><strong>PRERNA FOOD PROCESSING</strong></span></td>
  </tr>
</table></td>
    </tr>
    <tr>
      <td>&#2346;&#2381;&#2354;&#2366;&#2335; &#2344;. &#2407;.&#2408;.&#2409; &#2344;&#2357;&#2368;&#2344; &#2324;&#2342;&#2381;&#2351;&#2379;&#2327;&#2367;&#2325; &#2325;&#2381;&#2359;&#2375;&#2340;&#2381;&#2352; &#2338;&#2380;&#2306;&#2327;&#2366;, &#2335;&#2368;&#2325;&#2350;&#2327;&#2397; (&#2350;. &#2346;&#2381;&#2352;.) </td>
    </tr>
    <tr>
      <td align="center" style="font-size:14px;">&#2346;&#2381;&#2352;&#2375;&#2352;&#2339;&#2366; &#2348;&#2381;&#2352;&#2366;&#2306;&#2337; ,&#2325;&#2354; &#2328;&#2379;&#2337;&#2366; , &#2325;&#2381;&#2354;&#2366;&#2360;&#2367;&#2325; &#2324;&#2352; SS &#2348;&#2381;&#2352;&#2366;&#2306;&#2337; ,&#2360;&#2379;&#2335;&#2375;&#2306;&#2325;&#2381;&#2360; &#2325;&#2381;&#2354;&#2368;&#2344; &#2313;&#2396;&#2342; &#2327;&#2379;&#2335;&#2366;/&#2313;&#2396;&#2342; &#2350;&#2379;&#2327;&#2352; &#2330;&#2369;&#2344;&#2368; &#2346;&#2358;&#2369; &#2310;&#2361;&#2366;&#2352; &#2325;&#2375; &#2344;&#2367;&#2352;&#2381;&#2350;&#2366;&#2340;&#2366; &#2319;&#2357;&#2306; &#2357;&#2367;&#2325;&#2381;&#2352;&#2375;&#2340;&#2366; </td>
    </tr>
    <tr>
      <td><table width="95%" border="0">
        <tr>
          <td width="43%">&#2325;&#2381;&#2352;&#2350;&#2366;&#2306;&#2325; </td>
         
          <td colspan="3" align="center">&#2342;&#2367;&#2344;&#2366;&#2306;&#2325; .................................
            </td>
          </tr>
        <tr>
          <td colspan="4">&#2344;&#2366;&#2350; &#2325;&#2381;&#2352;&#2375;&#2340;&#2366; ................................... 
            </td>
          </tr>
        <tr>
          <td colspan="2">&#2360;&#2381;&#2341;&#2366;&#2344; ........................................
            </td>
        
          <td colspan="2">TIN No...............................................................</td>
          </tr>
        <tr>
          <td>&#2335;&#2381;&#2352;&#2325; &#2325;&#2367;&#2352;&#2366;&#2351;&#2366; ................................
            </td>
          <td colspan="2">&#2319;&#2337;&#2357;&#2366;&#2306;&#2360;.....</td>
          
          <td width="32%">&#2358;&#2375;&#2359; ..............
            </td>
          </tr>
        <tr>
          <td colspan="3">&#2342;&#2354;&#2366;&#2354; &#2358;&#2381;&#2352;&#2368; .............................. 
            </td>
         
          <td >&#2335;&#2381;&#2352;&#2325; &#2344;......
            </td>
          </tr>
      </table></td>
    </tr>

    <tr>
      <td><table width="100%" border="1">
        <tr align="center" style="background-color:#FFE1D2;">
          <td width="31%">&#2357;&#2360;&#2381;&#2340;&#2369; &#2325;&#2366; &#2344;&#2366;&#2350;&nbsp; </td>
          <td width="7%">&#2349;&#2352;&#2340;&#2368; </td>
          <td width="9%">&#2340;&#2366;&#2342;&#2366;&#2342; </td>
          <td width="14%">&#2357;&#2332;&#2344; &#2325;&#2381;&#2357;&#2367;&#2306;&#2335;&#2354; &#2350;&#2375;&#2306; </td>
          <td width="9%">&#2349;&#2366;&#2357; &#2348;&#2379;&#2352;&#2368; /&#2325;&#2381;&#2357;&#2367;&#2306;&#2335;&#2354; </td>
          <td colspan="2">
            <table width="100%" border="0">
              <tr>
                <td colspan="2" align="center">&#2350;&#2370;&#2354;&#2381;&#2351; </td>
                </tr>
              <tr>
                <td align="left">&#2352;&#2369;</td>
                <td align="right">&#2346;&#2376;&#2360;&#2375;</td>
              </tr>
            </table>            </td>
        </tr>
        <tr >
          <td rowspan="3">
		    <span class="style5">Bank-Allahabad Bank Tikamgarh(M.P.) <br />
		  A/C No. 50008266846<br />
		  RTGS No.-Alla0210444</span></td>
          <td rowspan="3">&nbsp;</td>
          <td rowspan="3">&nbsp;</td>
          <td rowspan="3">&nbsp;</td>
          <td rowspan="3">&nbsp;</td>
          <td width="20%">&nbsp;</td>
          <td width="10%">&nbsp;</td>
        </tr>
        <tr>
        
          <td>&#2335;&#2381;&#2352;&#2325; &#2349;&#2366;&#2396;&#2366;(-) 
            </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
       
          <td>&#2325;&#2369;&#2354; &#2351;&#2379;&#2327;- 
            </td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td>&#2348;&#2366;&#2325;&#2368; &#2352;&#2370;&#2346;&#2351;&#2375; &#2354;&#2375;&#2344;&#2375; &#2358;&#2375;&#2359; &#2352;&#2361;&#2375; -</td>
    </tr>
    <tr>
      <td><p>&#2344;&#2379;&#2335; - (1) &#2348;&#2367;&#2354; &#2325;&#2366; &#2349;&#2369;&#2327;&#2340;&#2366;&#2344;&nbsp; &#2337;&#2381;&#2352;&#2366;&#2347;&#2381;&#2335; &#2342;&#2381;&#2351;&#2366;&#2352;&#2366; &#2351;&#2366; &#2326;&#2366;&#2340;&#2375; &#2350;&#2375;&#2306; &#2342;&#2381;&#2351;&#2366;&#2352;&#2366; &#2361;&#2368; &#2360;&#2381;&#2357;&#2368;&#2325;&#2366;&#2352; &#2325;&#2367;&#2351;&#2366; &#2332;&#2366;&#2351;&#2375;&#2327;&#2366; |</p>
      (2) C &#2347;&#2366;&#2352;&#2381;&#2350; &#2342;&#2375;&#2344;&#2366; &#2309;&#2344;&#2367;&#2357;&#2366;&#2352;&#2381;&#2351; &#2361;&#2375; | &#2309;&#2344;&#2381;&#2351;&#2341;&#2366; &#2335;&#2376;&#2325;&#2381;&#2360; &#2325;&#2368; &#2332;&#2348;&#2366;&#2348;&#2342;&#2366;&#2352;&#2368; &#2326;&#2352;&#2368;&#2342;&#2342;&#2366;&#2352; &#2325;&#2368; &#2352;&#2361;&#2375;&#2327;&#2368; <br />
      (3) &#2344;&#2327;&#2342; &#2325;&#2367;&#2351;&#2366; &#2327;&#2351;&#2366; &#2349;&#2369;&#2327;&#2340;&#2366;&#2344; &#2325;&#2367;&#2360;&#2368; &#2349;&#2368; &#2342;&#2358;&#2366; &#2350;&#2375;&#2306; &#2360;&#2381;&#2357;&#2368;&#2325;&#2366;&#2352; &#2344;&#2361;&#2368;&#2306; &#2325;&#2367;&#2351;&#2366; &#2332;&#2366;&#2351;&#2375;&#2327;&#2366; |<br />
      (4) &#2360;&#2366;&#2340; &#2342;&#2367;&#2357;&#2360; &#2340;&#2325; &#2349;&#2369;&#2327;&#2340;&#2366;&#2344; &#2344; &#2310;&#2344;&#2375; &#2346;&#2352; &#2348;&#2381;&#2351;&#2366;&#2332; &#2408;/- &#2346;&#2381;&#2352;&#2340;&#2367; &#2360;&#2376;&#2325;&#2396;&#2366; &#2354;&#2327;&#2375;&#2327;&#2366; |<br />
      (5) &#2352;&#2366;&#2360;&#2381;&#2340;&#2375; &#2325;&#2368; &#2360;&#2349;&#2368; &#2332;&#2379;&#2326;&#2367;&#2350; &#2326;&#2352;&#2368;&#2342;&#2342;&#2366;&#2352; &#2325;&#2368; &#2361;&#2379;&#2327;&#2368; <br />
      <h4 align="right"> For- Prerna Food Processing </h4></td>
    </tr>
    <tr>
      <td><p class="style5">&#2361;&#2360;&#2381;&#2340;&#2366;&#2325;&#2381;&#2359;&#2352; &#2325;&#2381;&#2352;&#2375;&#2340;&#2366; / &#2335;&#2381;&#2352;&#2325; &#2337;&#2381;&#2352;&#2366;&#2311;&#2357;&#2352; </p></td>
    </tr>
  </table>
</form>
</body>
</html>
