<?php

date_default_timezone_set('Asia/Kolkata');

$mysql_hostname = "localhost";

$mysql_user = "root";
$mysql_password = "sudhir";

//$mysql_user = "manishjain81";
//$mysql_password = "Monujain90786";
$mysql_database = "exportdb";



$connection = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die ('MySQL connect failed. ' . mysql_error());
mysql_select_db($mysql_database, $connection) or die('Cannot select database. ' . mysql_error());



try {
$dbc = new PDO('mysql:host=localhost; dbname='.$mysql_database, $mysql_user, $mysql_password);
} catch (PDOException $e) {
	echo "Error: " . $e->getMessage();
}

function dops($qry) 
{

$db_z_string = strtoupper(substr(preg_replace('/\s+/', '', $qry),0,6));

if($db_z_string=="SELECT")
{
	return  mysql_fetch_array(mysql_query($qry));
	
}

else
{


$connection=$GLOBALS['connection'];

$qry = str_replace("''", "'0'", $qry);
//echo $qry;
 
 if (!mysql_query($qry,$connection))
  {
  die('Error: ' . mysql_error());
  }

}
}





//  Now I will juts use function "dml_operation($qry)"   to execute all my DML operations



function convert_number($number) 
{  $no = round($number,2);
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



function  dform($saudadate)
{
	
	return "STR_TO_DATE('$saudadate','%d/%m/%Y')";
	
	
	
	
}

?>



