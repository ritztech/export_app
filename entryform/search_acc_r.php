<?php

include("../conf.php");

$term = $_GET[ "term" ];

session_start();

 $fid=$_SESSION['fid'];
 
$companies = array();


  $result13 = mysql_query("SELECT a6.siid as siid,upper(CONCAT(a6.billno,'**PARTY**',lm.leg_name,'**DATE**', DATE_FORMAT(a6.date,'%d/%m/%Y')) ) AS  name11  FROM mandia6 a6,ledger_master lm where a6.fid = $fid  and lm.legid = a6.supid and   a6.billno like '%".$term."%' limit 0,20");

        
        while($row = mysql_fetch_array($result13)) {
	  
		    $companies[] =  array( 'value' => $row['siid'],'label' => $row['name11'] );
		   
			   
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