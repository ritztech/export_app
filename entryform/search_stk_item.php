<?php
	
include('../conf.php');

session_start();
$fid=$_SESSION['fid'];

//echo $fid;



$term = $_GET[ "term" ];

$companies = array();




  $result13 = mysql_query("SELECT stockid, stockitem,hsn,0 as gst,i_detail FROM stockitem   where  upper(CONCAT(stockitem)) like '%".$term."%' limit 0,20");

        
        while($row = mysql_fetch_array($result13)) {
	  
		    $companies[] =  array( 'value' => $row['stockid'],'label' => $row['stockitem'],'hsn' => $row['hsn'],'gst' => $row['gst'],'i_detail' => $row['i_detail'] );
		   
			   
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