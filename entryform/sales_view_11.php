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
            
			
			echo $ledgername_n_1;
			
			
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

