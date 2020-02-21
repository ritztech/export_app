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
	     	var strURL="salesinvoice_delete.php?id="+deleteId;
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		
	alert('Record deleted.');
	window.location='salesinvoice_view.php';
	
	
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
	   
    	$query = "SELECT COUNT(*) as totalCount FROM `mandia6`  where fid = $fid ";
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
<b style="font-size:12px;">
SEARCH By BILL Number</b>
<input   name="cname"   tabIndex = "5"  type="text"  autofocus  value = ""   class='auto'> 
SEARCH By Party name</b>
<input   name="cname"   tabIndex = "5"  type="text"  autofocus  value = ""   class='autoparty abcq'> 

<INPUT class = "abcqq" Type="BUTTON" VALUE="ADD NEW BILL" ONCLICK="window.location.href='salesinvoice_front.php'">                                   
</td>
</tr>
                <tr  style="background-color:#22B5C1; color:#FFFFFF;">
										      <th>SNO</th>
                                      
                                          	<th>Party Name</th>
											      <th>BILL No</th>
											   <th>DATE</th>
											    <th> COMMERCIAL INVOICE  </th>
							            <th> PACKING LIST </th>

 <th> TAX INVOICE </th>

 <th> CERTIFICATE OF ORIGIN  </th>
											  
											  
											  <th>Delete</th>
                                        </tr>
										
<?php
$sno=1;

  $fid=$_SESSION['fid'];

$emp=mysql_query("select a6.billno as billno,a6.date as date,a6.billweight as billweight ,a6.truckno as truckno ,a6.billtyno as billtyno ,a6.billvalue1 as billvalue1 ,a6.siid as siid ,lm.leg_name as partyname,a6.freight_receivable as freight_receivable,a6.freight_type as freight_type from mandia6 a6,ledger_master lm where a6.fid = $fid  and   lm.legid = a6.supid  order by billno+1 desc LIMIT ".$pageLimit." , ".$setLimit) or die(mysql_error());
	
$i=50;
	while ($rec = mysql_fetch_array($emp)) {
		$i=$i - 1;

$snooinc = $pageLimit + 50;


$snoop = $snooinc - $i;

		
		
	?>
	<div class="show">
	<tr style="text-align:center;">
		<td><?php  echo $snoop;  ?></td>
<td style="width:500px;" align = "left"> <?php  echo $rec['partyname'];  ?></td>


<td style="width:201px;padding-left:10px;">
<a href="salesinvoice_front_e.php?id= <?php echo  $rec['siid']?> "> <?php  echo $rec['billno'];  ?> </a>
</td>


<td style="width:50px;"> <?php echo date("d/m/Y", strtotime($rec['date']));  ?>   </td>

<td style="width:201px;padding-left:10px;">
<a href="sales_view_mj_2.php?id= <?php echo  $rec['siid']?> ">  COMMERCIAL INVOICE </a>
</td>

<td style="width:201px;padding-left:10px;">
<a href="pack_list.php?id= <?php echo  $rec['siid']?> "> PACKING LIST  </a>
</td>

<td style="width:201px;padding-left:10px;">
<a href="tax_inv.php?id= <?php echo  $rec['siid']?> "> TAX INVOICE </a>
</td>

<td style="width:201px;padding-left:10px;">
<a href="certificate_origin.php?id= <?php echo  $rec['siid']?> "> CERTIFICATE OF ORIGIN  </a>
</td>




<td><input type='button' name='btnprint' value='Delete' onclick='deleterecord(<?php echo  $rec['siid']?>)'/></td>






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