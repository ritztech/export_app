<?php
session_start();
$fid=$_SESSION['fid'];
include('../conf.php');
$entrydate=date("d/m/Y");

?>

<?php
				
				
				

$lcnumber=trim(strip_tags(addslashes($_POST['lcnumber'])));

$issuebranch=trim(strip_tags(addslashes($_POST['issuebranch'])));						
$dateofissue=dform(trim(strip_tags(addslashes($_POST['dateofissue']))));						
$lcdates=dform(strip_tags(addslashes($_POST['lcdates'])));						
$currency=trim(strip_tags(addslashes($_POST['currency'])));						
$amountlccc=trim(strip_tags(addslashes($_POST['amountlccc'])));						
$formlccc=trim(strip_tags(addslashes($_POST['formlccc'])));						
$tolerence=trim(strip_tags(addslashes($_POST['tolerence'])));						
$expdates=dform(strip_tags(addslashes($_POST['expdates'])));						
$expplacess=trim(strip_tags(addslashes($_POST['expplacess'])));						
$advbanksss=trim(strip_tags(addslashes($_POST['advbanksss'])));						
$benefedetailsss=trim(strip_tags(addslashes($_POST['benefedetailsss'])));						
$otherdetailsss=trim(strip_tags(addslashes($_POST['otherdetailsss'])));						
$profrid=trim(strip_tags(addslashes($_POST['profrid'])));						

 
$qry="INSERT INTO `proforma_lc_details`(`issue_branch`, `date_of_issue`, `lc_date`, `currency`, `amt_of_lc`, `form_of_lc`, `tolerance`, `expdate`, `exp_place`, `advise_bank`, `benefeitiary_details`, `othersss`,proforma_id,lcnumber) VALUES 
('$issuebranch',$dateofissue,$lcdates,'$currency','$amountlccc','$formlccc','$tolerence',$expdates,'$expplacess','$advbanksss','$benefedetailsss','$otherdetailsss','$profrid','$lcnumber')";
 //echo $qry;

dops($qry);
  
  
 
 echo "<script>alert('Data Successfully Inserted');location.href='proforma.php?siid=$profrid'</script>";
 




?>

