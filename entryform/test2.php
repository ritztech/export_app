<?php 

session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }


include('../include/sidemenu.php');?>



<!doctype>
<html>
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
var _validFileExtensions = [".xls", ".xlsx", ".csv"];    
function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                oInput.value = "";
                return false;
            }
        }
    }
    return true;
}
</script>
</head>
<body>
<div class="container">
	<h1>Select your file and upload ...</h1>

<?php

include('../conf.php');



$fid=$_SESSION['fid'];

$t_date = date("d/m/Y");

 
 function clean($string) {
  // $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

 //  return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
 
   return preg_replace('/[^A-Za-z0-9.\-]/', ' ', $string); // Removes special chars.
   
   
}

 
if(isset($_FILES['excel']) && $_FILES['excel']['error']==0) {
		require_once "Classes/PHPExcel.php";
		
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
	
		$tmpfname = $_FILES['excel']['tmp_name'];
		
		//echo basename($_FILES['excel']['name']); 
		

		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
		
		

	
		echo "<table class=\"table table-sm\">";
		for ($row = 1; $row <= $lastRow; $row++) {
			 echo "<tr><td scope=\"row\">";
			 echo $worksheet->getCell('A'.$row)->getValue();
			 echo "</td><td>";
			 echo $worksheet->getCell('B'.$row)->getValue();
			 echo "</td><td>";
			 echo $worksheet->getCell('C'.$row)->getValue();
			 echo "</td><td>";
			 echo $worksheet->getCell('D'.$row)->getValue();
			  echo "</td><td>";
			 echo $worksheet->getCell('E'.$row)->getValue();
			  echo "</td><td>";
			 echo $worksheet->getCell('F'.$row)->getValue();
			 echo "</td><td>";
			 echo $worksheet->getCell('G'.$row)->getValue();
			 echo "</td><tr>";
			 
	
$sbno=$worksheet->getCell('B'.$row)->getValue();
$sbdate=$worksheet->getCell('C'.$row)->getValue();
$location=$worksheet->getCell('D'.$row)->getValue();
$curr_status=$worksheet->getCell('E'.$row)->getValue();
$qry_raised=$worksheet->getCell('F'.$row)->getValue();
$qry_replied=$worksheet->getCell('G'.$row)->getValue();	

$curr_status=clean($curr_status);
$location=clean($location);
$qry_raised=clean($qry_raised);
$qry_replied=clean($qry_replied);



			
if($row>1) {
	

$qry="INSERT INTO `file_up`(`sbno`, `sbdate`, `location`, `curr_status`, `qry_raised`, `qry_replied`) VALUES 
('$sbno',STR_TO_DATE('$sbdate','%d%M%Y'),'$location','$curr_status','$qry_raised','$qry_replied')";

  $qry = str_replace("''", "'0'", $qry);
  
  // echo $qry;
  // echo "</br>";
       if (!mysql_query($qry,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  
  

		}
		}
		echo "</table>";	
		
		echo "Data Uploaded successfully ....";
		echo "</br>";
		
		
}


?>
<div class="container">
<form action = "" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "excel" onchange="ValidateSingleInput(this)" />
         <input type = "submit"/>
</form>
</div>
</div>

</body>
</html>