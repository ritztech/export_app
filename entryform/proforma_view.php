<?php include('../conf.php'); ?>
<?php
session_start();
if(!isset($_SESSION['uname'])) {echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }




include('../include/sidemenu.php');

?>


<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />


<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>
<link href="js/jquery-ui.css" rel="stylesheet">
      <script src="js/jquery-1.10.2.js"></script>
      <script src="js/jquery-ui.js"></script>
	  
 
    <script>
	
         $(function() {
       		 
  		  		$(".auto").autocomplete({
			
			 minLength: 0,
            source: "search_acc_r.php",
            
			focus: function( event, ui ) {
                      return false;
               },
        
		      select: function( event, ui ) {
			
               window.location='sales_view.php?siid='+ui.item.value;
		     
			   //cust_ledger_rep_acc.php?id= 1
			   
               return false;
            }
         }
		 
)	


  		  		$(".autoparty").autocomplete({
			
			 minLength: 0,
            source: "search_by_party_name.php",
            
			focus: function( event, ui ) {
                      return false;
               },
        
		      select: function( event, ui ) {
			
               window.location='sales_view.php?siid='+ui.item.value;
		     
			   //cust_ledger_rep_acc.php?id= 1
			   
               return false;
            }
         }
		 
)	



	 
		 
         .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li>" )
            .append( "<a>" + item.label + "</a>" )
            .appendTo( ul );
         };
         });
		 
		 
		 
		 
		 function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		} 	
		return xmlhttp;
    }
	
	
	function deleterecord(deleteId) {
	
    if (confirm("Are you sure you want to delete this record  ?!") == true) {
	     	var strURL="comm_proforma_dell.php?id="+deleteId;
			//alert(strURL);
			
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		
	alert('Record deleted.');
	location.reload(); 
	
	
	} else {
        x = "You pressed Cancel!";
    }

}


</script>

</head>

<body>

		<h2 align="center" style="font-size:17px;">
					  *** ALL BILL  DETAILS ***  </h2>


















<table width="99%" border="0" align="center">
 <tr>
<td>
<?php 






if(isset($_GET["page"]))
	$page = (int)$_GET["page"];
	else
	$page = 1;

	$setLimit =50;
	$pageLimit = ($page * $setLimit) - $setLimit;
	
	   function displayPaginationBelow($per_page,$page){
	   $page_url="salesinvoice_view.php?&";
	  $fid=$_SESSION['fid'];
	   
    	$query = "SELECT COUNT(*) as totalCount FROM `proformainv`  where fid = $fid ";
		//echo $query;
    	$rec = mysql_fetch_array(mysql_query($query));
    	$total = $rec['totalCount'];
        $adjacents = "2"; 

    	$page = ($page == 0 ? 1 : $page);  
    	$start = ($page - 1) * $per_page;								
		
    	$prev = $page - 1;							
    	$next = $page + 1;
        $setLastpage = ceil($total/$per_page);
    	$lpm1 = $setLastpage - 1;
    	
    	$setPaginate = "";
    	if($setLastpage > 1)
    	{	
    		$setPaginate .= "<ul class='setPaginate'>";
                    $setPaginate .= "<li class='setPage'>Page $page of $setLastpage</li>";
    		if ($setLastpage < 7 + ($adjacents * 2))
    		{	
    			for ($counter = 1; $counter <= $setLastpage; $counter++)
    			{
    				if ($counter == $page)
    					$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
    				else
    					$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
    			}
    		}
    		elseif($setLastpage > 5 + ($adjacents * 2))
    		{
    			if($page < 1 + ($adjacents * 2))		
    			{
    				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
    				{
    					if ($counter == $page)
    						$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
    					else
    						$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
    				}
    				$setPaginate.= "<li class='dot'>...</li>";
    				$setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
    				$setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";		
    			}
    			elseif($setLastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
    			{
    				$setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
    				$setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
    				$setPaginate.= "<li class='dot'>...</li>";
    				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
    				{
    					if ($counter == $page)
    						$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
    					else
    						$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
    				}
    				$setPaginate.= "<li class='dot'>..</li>";
    				$setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
    				$setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";		
    			}
    			else
    			{
    				$setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
    				$setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
    				$setPaginate.= "<li class='dot'>..</li>";
    				for ($counter = $setLastpage - (2 + ($adjacents * 2)); $counter <= $setLastpage; $counter++)
    				{
    					if ($counter == $page)
    						$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
    					else
    						$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
    				}
    			}
    		}
    		
    		if ($page < $counter - 1){ 
    			$setPaginate.= "<li><a href='{$page_url}page=$next'>Next</a></li>";
                $setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>Last</a></li>";
    		}else{
    			$setPaginate.= "<li><a class='current_page'>Next</a></li>";
                $setPaginate.= "<li><a class='current_page'>Last</a></li>";
            }

    		$setPaginate.= "</ul>\n";		
    	}
    
    
        return $setPaginate;
    } 
	
	
	
	
	
	
?>
	
	
	
	<style type="text/css">
	.navi {
	width: 100%;		
	border:3px solid  #4d0000;
	}

	.show {
		
	color: blue;
	
	cursor: pointer;
	font: 15px/19px Arial,Helvetica,sans-serif;
	}
	.show a {
	text-decoration: none;
	}
	.show:hover {
	text-decoration: underline;
	}


	ul.setPaginate li.setPage{
		
	padding:15px 10px;
	font-size:14px;
	}

	ul.setPaginate{
	margin:0px;
	padding:0px;
	height:100%;
	overflow:hidden;
	font:12px 'Tahoma';
	list-style-type:none;	
	}  

	ul.setPaginate li.dot{padding: 3px 0;}

	ul.setPaginate li{
	float:left;
	margin:0px;
	padding:0px;
	margin-left:5px;
	}



	ul.setPaginate li a
	{
	background: none repeat scroll 0 0 #ffffff;
	border: 1px solid #cccccc;
	color: #999999;
	display: inline-block;
	font: 15px/25px Arial,Helvetica,sans-serif;
	margin: 5px 3px 0 0;
	padding: 0 5px;
	text-align: center;
	text-decoration: none;
	}	

	ul.setPaginate li a:hover,
	ul.setPaginate li a.current_page
	{
	background: none repeat scroll 0 0 #0d92e1;
	border: 1px solid #000000;
	color: #ffffff;
	text-decoration: none;
	}

	ul.setPaginate li a{
	color:black;
	display:block;
	text-decoration:none;
	padding:5px 8px;
	text-decoration: none;
	}




	</style>
	
	
	   <div class="navi">
	
<table border="2" width="100%">
<tr>
<td colspan="8" align="left">

<INPUT class = "abcqq" Type="BUTTON"   style="color:white;background-color:black" VALUE="ADD NEW " ONCLICK="window.location.href='salesinvoice_front.php'">                                   
</td>
</tr>
                <tr  style="background-color:#22B5C1; color:#FFFFFF;">
										      <th  width="20%">SNO</th>
											  
                                      
                                          	<th>Proforma Invoice</th>
											   <th>Party name</th>
										<th> DATE </th>
										<th> EDIT </th>
										<th> Commercial Invoice </th>
										<th> Delete </th>
										

                                        </tr>
										
<?php
$sno=1;

  $fid=$_SESSION['fid'];

$emp=mysql_query("SELECT `tab_auto_id`, `consigneeid`, `proforma_inv`, `proforma_date`, `export_ref`, `buyrefno_date`, `cntry_origin`, `cntry_final`, `pre_carr_by`, `place_of_rec_per`, `vessel`, `port_of_laod`, `port_of_dis`, `final_dest`, `del_terms`, `extra_notes`, `incoterm`, `curency`, `bankid`, `shippartyidd`, `fid`,piv_2,piv3 FROM `proformainv`  LIMIT ".$pageLimit." , ".$setLimit) or die(mysql_error());
	
$i=50;
	while ($rec = mysql_fetch_array($emp)) {
		$i=$i - 1;


$consigneeid=$rec['consigneeid'];

$result1 = mysql_query("SELECT 	leg_name,fac_addr,gstin,statetype,aadhar from ledger_master  where legid = $consigneeid");
$row1 = mysql_fetch_array($result1);

$p_name = $row1[0];


$snooinc = $pageLimit + 50;


$snoop = $snooinc - $i;

		
		
	?>
	<div class="show">
	<tr style="text-align:center;">
		<td><?php  echo $snoop;  ?></td>


<td style="width:201px;padding-left:10px;" align="left">
<a href="proforma.php?siid= <?php echo  $rec['tab_auto_id']?> "> <?php  echo $rec['piv3'] ?>/<?php  echo $rec['piv_2'] ?>/<?php  echo $rec['proforma_inv'] ?> </a>
</td>


<td style="width:500px;" align = "left"> <?php  echo $p_name;  ?></td>





<td style="width:50px;"> <?php echo date("d/m/Y", strtotime($rec['proforma_date']));  ?>   </td>

<td style="width:201px;padding-left:10px;" align="left">
<a href="salesinvoice_front_edit_e2.php?id= <?php echo  $rec['tab_auto_id']?> "> EDIT</a>
</td>

<td style="width:201px;padding-left:10px;" align="left">
<a href="add_commercial_inv_fron.php?id= <?php echo  $rec['tab_auto_id']?> "> Add</a>

---- <a href="commm_inv_view.php?id= <?php echo  $rec['tab_auto_id']?> "> VIEW</a>


</td>

<td><input type='button' name='btnprint' value='Delete' onclick='deleterecord(<?php echo  $rec['tab_auto_id']?>)'/></td>











                                        </tr>

	</tr>
	
	</div>
	<?php }	?>
	</table>
	</div>

	<?php echo displayPaginationBelow($setLimit,$page); ?>
</td>
</tr>

</table>

</body>
</html> 