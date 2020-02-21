<?php
session_start();
$fid=$_SESSION['fid'];
?>
<?php
	include('../conf.php');
?>

<?php
	if(isset($_POST['s']))
		{
			
			
			$result31 = mysql_query("SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$mysql_database' AND TABLE_NAME = 'vehicle_master' ");
$row31 = mysql_fetch_array($result31);
$custid =  $row31['0'];


			
			$vehicle_number = trim(strip_tags(addslashes(strtoupper($_POST['stockitem']))));
			
						$driver_namee = trim(strip_tags(addslashes(strtoupper($_POST['idetails']))));
			
			
									 
									 
            $transport_id = trim(strip_tags(addslashes($_POST['p_category'])));
			 
			 
			 
			 
		//**** Image upload start

$rd2 = mt_rand(1000,9999)."_File"; 
if((!empty($_FILES["registration_file"])) && ($_FILES['registration_file']['error'] == 0)) {
$filename = basename($_FILES['registration_file']['name']); 
$ext = substr($filename, strrpos($filename, '.') + 1);  
if (($ext != "exe") && ($_FILES["registration_file"]["type"] != "application/x-msdownload"))  {
$registration_img_file="uploads/".$custid."_".$rd2."_".$filename; 
 if (!file_exists($registration_img_file)) {	  
 if ((move_uploaded_file($_FILES['registration_file']['tmp_name'],$registration_img_file))) {		
}	}  	} }
else{ $registration_img_file="NONE";}


$rd2 = mt_rand(1000,9999)."_File"; 
if((!empty($_FILES["insurance_file"])) && ($_FILES['insurance_file']['error'] == 0)) {
$filename = basename($_FILES['insurance_file']['name']); 
$ext = substr($filename, strrpos($filename, '.') + 1);  
if (($ext != "exe") && ($_FILES["insurance_file"]["type"] != "application/x-msdownload"))  {
$insurance_img_file="uploads/".$custid."_".$rd2."_".$filename; 
 if (!file_exists($insurance_img_file)) {	  
 if ((move_uploaded_file($_FILES['insurance_file']['tmp_name'],$insurance_img_file))) {		
}	}  	} }
else{ $insurance_img_file="NONE";}


$rd2 = mt_rand(1000,9999)."_File"; 
if((!empty($_FILES["drivin_licence_file"])) && ($_FILES['drivin_licence_file']['error'] == 0)) {
$filename = basename($_FILES['drivin_licence_file']['name']); 
$ext = substr($filename, strrpos($filename, '.') + 1);  
if (($ext != "exe") && ($_FILES["drivin_licence_file"]["type"] != "application/x-msdownload"))  {
$drlicence_img_file="uploads/".$custid."_".$rd2."_".$filename; 
 if (!file_exists($drlicence_img_file)) {	  
 if ((move_uploaded_file($_FILES['drivin_licence_file']['tmp_name'],$drlicence_img_file))) {		
}	}  	} }
else{ $drlicence_img_file="NONE";}


$rd2 = mt_rand(1000,9999)."_File"; 
if((!empty($_FILES["aadhar_card_file"])) && ($_FILES['aadhar_card_file']['error'] == 0)) {
$filename = basename($_FILES['aadhar_card_file']['name']); 
$ext = substr($filename, strrpos($filename, '.') + 1);  
if (($ext != "exe") && ($_FILES["aadhar_card_file"]["type"] != "application/x-msdownload"))  {
$aadhar_img_file="uploads/".$custid."_".$rd2."_".$filename; 
 if (!file_exists($aadhar_img_file)) {	  
 if ((move_uploaded_file($_FILES['aadhar_card_file']['tmp_name'],$aadhar_img_file))) {		
}	}  	} }
else{ $aadhar_img_file="NONE";}


$rd2 = mt_rand(1000,9999)."_File"; 
if((!empty($_FILES["driver_sign_file"])) && ($_FILES['driver_sign_file']['error'] == 0)) {
$filename = basename($_FILES['driver_sign_file']['name']); 
$ext = substr($filename, strrpos($filename, '.') + 1);  
if (($ext != "exe") && ($_FILES["driver_sign_file"]["type"] != "application/x-msdownload"))  {
$driversign_img_file="uploads/".$custid."_".$rd2."_".$filename; 
 if (!file_exists($driversign_img_file)) {	  
 if ((move_uploaded_file($_FILES['driver_sign_file']['tmp_name'],$driversign_img_file))) {		
}	}  	} }
else{ $driversign_img_file="NONE";}



$rd2 = mt_rand(1000,9999)."_File"; 
if((!empty($_FILES["any_other_file"])) && ($_FILES['any_other_file']['error'] == 0)) {
$filename = basename($_FILES['any_other_file']['name']); 
$ext = substr($filename, strrpos($filename, '.') + 1);  
if (($ext != "exe") && ($_FILES["any_other_file"]["type"] != "application/x-msdownload"))  {
$othtefilee_img_file="uploads/".$custid."_".$rd2."_".$filename; 
 if (!file_exists($othtefilee_img_file)) {	  
 if ((move_uploaded_file($_FILES['any_other_file']['tmp_name'],$othtefilee_img_file))) {		
}	}  	} }
else{ $othtefilee_img_file="NONE";}







  
  //**************
  
  
//  **** image upload end		
			 
				
			
			
			
			$sql="INSERT INTO `vehicle_master`(`transportid`, `vehicl_num`, `drivernum`,registration_img_file,insurance_img_file,drlicence_img_file,aadhar_img_file,driversign_img_file,othtefilee_img_file) VALUES 
			('$transport_id','$vehicle_number','$driver_namee','$registration_img_file','$insurance_img_file','$drlicence_img_file','$aadhar_img_file','$driversign_img_file','$othtefilee_img_file')";
			
		
		$sql = str_replace("''", "'0'", $sql);
		
		//echo $sql;
		

			$qry = mysql_query($sql);
		
		
		
		
		
		
		}

  echo "<script>alert('Data Sucessfully Inserted.');location.href='vehicle_view.php'</script>";
?>
