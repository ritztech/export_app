<?php



include("../conf.php");



?>

<?php

session_start();

if(!isset($_SESSION['uname'])) {echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";}



$fid=$_SESSION['fid'];

$getbill = mysql_query("SELECT `sellid`  FROM `m_autoid` WHERE fid = $fid");
$getbill_1 = mysql_fetch_array($getbill);

$n_bill_1 = $getbill_1['0'];


?>


<?php

$freight_id = $_GET['id'];

$result1 = mysql_query("SELECT `id`, `sno`, `mesars`, DATE_FORMAT(t_date,'%d/%m/%Y') as t_date, DATE_FORMAT(p_date,'%d/%m/%Y') as p_date, `broker`, `jins`, `truckno`, `qty`, `truck_fare`, `advance`, `balance`, `billno`,
 `billtyno`, `beema_dec` FROM `freight_letter` where id  = $freight_id");

$row1 = mysql_fetch_array($result1);

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



<script language="javascript" type="text/javascript" >
function jumpto(){

document.getElementById("ntable").deleteRow(0);
			
			document.location.href = "freight_letter_view.php";
			window.print();
	
}

function closeMe()
{
document.location.href = "freight_letter_view.php";	
}


</script>





<?php

$query_dispMake="SELECT legid,concat(leg_name,'-',off_city,'-',fact_state) as suppliername  FROM ledger_master where fid=$fid";

$result_dispMake=mysql_query($query_dispMake);



?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title>RITZ</title>

<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />

<link href="..//style.css" rel="stylesheet" type="text/css" />
    <link href="js/jquery-ui.css" rel="stylesheet">
      <script src="js/jquery-1.10.2.js"></script>
      <script src="js/jquery-ui.js"></script>
	  

<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>

<script language="javascript" type="text/javascript" src="jscode/a4code.js">  </script>


	  
	  
 

</head>

<body>



<?php // include('../include/sidemenu.php');?>


<div align="center">
</br></br></br></br></br></br></br></br></br> </br> 


  
  

  <form id="form1" name="form1" method="post"   onSubmit="return ValidateForm()" action="">

  <table  border="1" cellpadding="6" style="color:black; font-weight:bold;"  id = "ntable">

     <tr>
<td  align = "center"> 
<input type="button"  id = "printtable" name="btnprint" value="Print" onClick="jumpto() "/>
*****************<input type="button" id = "printtable1" name="CloseMe" value="Close Me" onClick="closeMe()"/>
  </td>
</tr>

		<tr>
		
		<td colspan = "4"> 
<table width="100%">


<tr>
          <td width="43%">
		  
		  &#2325;&#2381;&#2352;&#2350;&#2366;&#2306;&#2325;.......
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 <?php  echo $row1['sno'];  ?></td>
         
          <td width="32%" align="center"><p>&#2342;&#2367;&#2344;&#2366;&#2306;&#2325;
		 &nbsp;  <?php  echo $row1['t_date'];  ?>

             </p>
            </td>
          </tr>
        <tr>
          <td colspan="2"><p>&#2350;&#2375;&#2360;&#2352;&#2381;&#2360; .....
		
		   <?php  
		   
		   $legr_name=$row1['mesars'];		
			
			
			$result1_1 = mysql_query("SELECT `leg_name`, `fac_addr`, `off_addr`
			FROM `ledger_master` where legid  = $legr_name");

                $row1_1 = mysql_fetch_array($result1_1);
				
				 echo $row1_1['leg_name']; 
				 ?>
		  </p>
            </td>
          </tr>
        <tr>
          <td colspan="2"><p>&#2344;&#2350;&#2360;&#2381;&#2325;&#2366;&#2352;,<br /> <br>
            &#2358;&#2381;&#2352;&#2368;&#2350;&#2366;&#2344; &#2332;&#2368; &#2310;&#2332; &#2342;&#2367;&#2344;&#2366;&#2306;&#2325;			&nbsp;			<?php  echo $row1['p_date'];  ?>
&nbsp;
			&#2325;&#2379; &#2310;&#2346;&#2325;&#2375; &#2342;&#2354;&#2366;&#2354; &#2358;&#2381;&#2352;&#2368;			&nbsp;<?php  
		   
		   $legr_name1=$row1['broker'];		
			
			
			$result1_11 = mysql_query("SELECT `leg_name`, `fac_addr`, `off_addr`
			FROM `ledger_master` where legid  = $legr_name1");

                $row1_11 = mysql_fetch_array($result1_11);
				
				 echo $row1_11['leg_name']; 
				 ?>
			&nbsp;
		  &#2325;&#2375; &#2325;&#2361;&#2375; &#2350;&#2369;&#2340;&#2366;&#2348;&#2367;&#2325; &#2332;&#2367;&#2344;&#2381;&#2360; 
		  &nbsp;
		 <?php  echo $row1['jins'];  ?> 
		  &nbsp;
		  &#2335;&#2381;&#2352;&#2325; &#2325;&#2381;&#2352;&#2350;&#2366;&#2306;&#2325;
		  &nbsp;
		 <?php  echo $row1['truckno'];  ?>  &nbsp;
		 &#2342;&#2381;&#2357;&#2366;&#2352;&#2366;  
		  
		  &nbsp;
		  <?php  echo $row1['qty'];  ?> 
		 
		  &nbsp;
		  &#2348;&#2379;&#2352;&#2366; &#2349;&#2375;&#2332; &#2352;&#2361;&#2375; &#2361;&#2375; | &#2335;&#2381;&#2352;&#2325; &#2349;&#2366;&#2396;&#2366;
		  &nbsp;
		  <?php  echo $row1['truck_fare'];  ?> /-
		 &nbsp;&nbsp;&nbsp;&#2352;&#2370;&#2346;&#2351;&#2375; &#2361;&#2375;| &#2332;&#2367;&#2360;&#2350;&#2375; &#2319;&#2337;&#2357;&#2366;&#2306;&#2360;
		 &nbsp;
		 <?php  echo $row1['advance'];  ?>/- 
		  
		  &nbsp;
		  &#2358;&#2375;&#2359;
		  &nbsp;
		  <?php  echo $row1['balance'];  ?> /-
		&nbsp;
		  (&#2358;&#2348;&#2381;&#2342;&#2379;&#2306; &#2350;&#2375;&#2306;)
		  &nbsp;
		 <u>
		  <?php 
		  
		  
		  $cheque_amt = $row1['balance'] ; 
try
    {
    echo convert_number($cheque_amt) ;
    }
catch(Exception $e)
    {
    echo $e->getMessage();
    }    
?></u>
		&nbsp;
		&#2342;&#2375;&#2344;&#2366; &#2332;&#2368; &#2324;&#2352; &#2350;&#2366;&#2354; &#2325;&#2368; &#2346;&#2366;&#2357;&#2340;&#2368; &#2337;&#2366;&#2325; &#2342;&#2381;&#2357;&#2366;&#2352;&#2366; &#2349;&#2375;&#2332; &#2342;&#2375;&#2344;&#2366; &#2332;&#2368; | &#2348;&#2367;&#2354; &#2325;&#2375; &#2352;&#2369;&#2346;&#2351;&#2366; A/c. No. &nbsp;50008266846 RTGS&nbsp; No.  Alla0210444 &#2311;&#2354;&#2366;&#2361;&#2366;&#2348;&#2366;&#2342; &#2348;&#2376;&#2306;&#2325; &#2335;&#2368;&#2325;&#2350;&#2327;&#2397; &#2350;&#2375;&#2306; RTGS  /NEFT &#2342;&#2381;&#2357;&#2366;&#2352;&#2366;  &#2340;&#2369;&#2352;&#2344;&#2381;&#2340; &#2340;&#2368;&#2344; &#2342;&#2367;&#2344; &#2350;&#2375;&#2306; &#2349;&#2375;&#2332;&#2375; | &#2360;&#2366;&#2341; &#2350;&#2375;&#2306; &ldquo;C&rdquo; &#2347;&#2366;&#2352;&#2381;&#2350; &#2319;&#2357;&#2306; &#2337;&#2367;&#2325;&#2381;&#2354;&#2375;&#2352;&#2375;&#2358;&#2344;  &#2309;&#2357;&#2358;&#2381;&#2351; &#2349;&#2375;&#2332;&#2375; | &#2347;&#2366;&#2352;&#2381;&#2350; &ldquo;C&rdquo; &#2344;&#2361;&#2368;&#2306; &#2349;&#2375;&#2332;&#2344;&#2375; &#2325;&#2368; &#2360;&#2381;&#2341;&#2367;&#2340;&#2367; &#2350;&#2375;&#2306;  10 &#2346;&#2381;&#2352;&#2340;&#2367;&#2358;&#2340; &#2335;&#2376;&#2325;&#2381;&#2360; &#2342;&#2375;&#2344;&#2366; &#2361;&#2379;&#2327;&#2366; |<br />
		<br />
		  &#2360;&#2306;&#2354;&#2327;&#2381;&#2344; &#2346;&#2381;&#2352;&#2340;&#2367; <br />
		  
		  
		  <table>
		  <tr><td>&#2348;&#2367;&#2354; &#2344;&#2306;&#2348;&#2352; </td><td>
<?php  echo $row1['billno'];  ?> 
		</td></tr>
		   <tr><td>&#2348;&#2367;&#2354;&#2381;&#2335;&#2368; &#2344;&#2306;&#2348;&#2352; </td><td> 
		   <?php  echo $row1['billtyno'];  ?> 
		   </td></tr>
		    <tr><td>&#2348;&#2368;&#2350;&#2366; &#2337;&#2367;&#2325;&#2381;&#2354;&#2375;&#2352;&#2375;&#2358;&#2344; &#2344;&#2306;&#2348;&#2352;</td><td> 
			<?php  echo $row1['beema_dec'];  ?> </td></tr>
		  </table>
		  
		  <br />
		  &#2343;&#2344;&#2381;&#2351;&#2357;&#2366;&#2342; <br /><br />
		  </p>
            <p align="right">&#2357;&#2366;&#2360;&#2381;&#2340;&#2375; &#2346;&#2381;&#2352;&#2375;&#2352;&#2339;&#2366; &#2398;&#2370;&#2337;  &#2346;&#2381;&#2352;&#2379;&#2360;&#2375;&#2360;&#2367;&#2306;&#2327;</p>              </td>
          </tr>























</table>


		</td> 
		
		</tr>

       


      

 

    </table>
	
	<input type="hidden" name="trandname"  value = "None" />

					 <input type="hidden" name="province"   value = "0" />
					 
</form> 

</div>



</body>

</html>

  <link rel="stylesheet" href="date_picker/jquery-ui.css">
  
  <script src="date_picker/jquery-1.12.4.js"></script>
  <script src="date_picker/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#t_date" ).datepicker();
	 $( "#p_date" ).datepicker();
  } );
  </script>