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
$lcidddd=trim(strip_tags(addslashes($_POST['lcidddd'])));						

 
$qry="update proforma_lc_details set  
issue_branch='$issuebranch',
`date_of_issue`=$dateofissue, `lc_date`=$lcdates, `currency`='$currency',
 `amt_of_lc`='$amountlccc', `form_of_lc`='$formlccc', `tolerance`='$tolerence', `expdate`=$expdates, `exp_place`='$expplacess', `advise_bank`='$advbanksss',
 `benefeitiary_details`='$benefedetailsss', `othersss`='$otherdetailsss',lcnumber='$lcnumber'  where  	tab_auto_id = $lcidddd";
 
 
 
// echo $qry;

dops($qry);
  
  
echo "<script>alert('Data Successfully Inserted');location.href='proforma.php?siid=$profrid'</script>";
 




?>

