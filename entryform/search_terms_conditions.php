<?php
	
include('../conf.php');

session_start();
$fid=$_SESSION['fid'];

//echo $fid;



$term = $_GET[ "term" ];

$companies = array();


  $result13 = mysql_query("SELECT tab_id, CONCAT('Terms *** ',val1,'** Desc ***',val2) as  stockitem  , val1,val2  FROM condition_master   where  upper(CONCAT(val1,'',val2)) like '%".$term."%' limit 0,20");

        
        while($row = mysql_fetch_array($result13)) {
	  
		    $companies[] =  array( 'value' => $row['tab_id'],'label' => $row['stockitem'],'val1' => $row['val1'],'val2' => $row['val2'] );
		   
			   
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