<?php
	
include('../conf.php');

session_start();
$fid=$_SESSION['fid'];

//echo $fid;



$term = $_GET[ "term" ];

$companies = array();


  $result13 = mysql_query("SELECT id as stockid, mytext as stockitem FROM oneline   where  upper(CONCAT(mytext)) like '%".$term."%' limit 0,20");

        
        while($row = mysql_fetch_array($result13)) {
	  
		    $companies[] =  array( 'value' => $row['stockid'],'label' => $row['stockitem'] );
		   		   
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