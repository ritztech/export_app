<?php
	
include('../conf.php');

//session_start();
//$fid=$_SESSION['fid'];

//echo $fid;



$term = $_GET[ "term" ];

$companies = array();



  $result13 = mysql_query("SELECT v1.auto_id as autiid,concat(v1.vehicl_num,'-Transporter -',l1.leg_name,'--Driver Name--',v1.drivernum) as name11,v1.transportid as tidd,v1.vehicl_num as name,v1.drivernum as drbameee,l1.leg_name as transname FROM vehicle_master v1 ,ledger_master l1 where l1.legid=v1.transportid and l1.transported=1  and v1.vehicl_num like '%".$term."%' limit 0,20");

        
        while($row = mysql_fetch_array($result13)) {
	  
		    $companies[] =  array( 'value' => $row['tidd'],'label' => $row['name11'],'drivername' => $row['drbameee'] ,'vecname' => $row['name'] );
		   
			   
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