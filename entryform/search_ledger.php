<?php
	
include('../conf.php');

session_start();
$fid=$_SESSION['fid'];

//echo $fid;



$term = $_GET[ "term" ];

$companies = array();



  $result13 = mysql_query("SELECT legid as cid,upper(CONCAT(`leg_name`,'**CITY*',`fact_city`,'**STATE**',fact_state )) AS name11,leg_name as name,gstin,off_addr,aadhar,off_city FROM ledger_master WHERE 
  fid=$fid and upper(CONCAT(leg_name,' ',fact_city,' ',fact_state)) like '%".$term."%' limit 0,20");

        
        while($row = mysql_fetch_array($result13)) {
	  
		    $companies[] =  array( 'value' => $row['cid'],'label' => $row['name11'],'desc1' => $row['name'] ,'baddress' => $row['off_addr'] ,'gstin' => $row['gstin'] ,'aadhar' => $row['aadhar'],'off_city' => $row['off_city']  );
		   
			   
		   }
		   
		   
		   


$result = array();
foreach ($companies as $company) {
	$companyLabel = $company[ "label" ];
	if ( strpos( strtoupper($companyLabel), strtoupper($term) )
	  !== false ) {
		array_push( $result, $company );
	}
}

echo json_encode( $result );
?>