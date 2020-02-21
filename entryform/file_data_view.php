<?php include('../conf.php'); ?>
<?php
session_start();
if(!isset($_SESSION['uname'])) {echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }

$t_date = date("d/m/Y");


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
	
	
	function deleterecord_1(deleteId,rowtodelete) {
	
    if (confirm("Are you sure you want to delete this record  ?!") == true) {
	     	var strURL="file_data_delete.php?id="+deleteId;
			
			
			//alert(strURL);
			
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		
	
	  var row = rowtodelete.parentNode.parentNode;
      row.parentNode.removeChild(row);
	  alert('Record deleted.');

	
	} else {
        x = "You pressed Cancel!";
    }

}






function updatemrp(refid,rowposz) {
	

var a_sbno = document.form2[ "sbno" + rowposz ].value;
var a_sbdatee = document.form2[ "sbdatee" + rowposz ].value;
var a_location = document.form2[ "location" + rowposz ].value;
var a_curr_status = document.form2[ "curr_status" + rowposz ].value;
var a_qry_raised = document.form2[ "qry_raised" + rowposz ].value;
var a_qry_replied = document.form2[ "qry_replied" + rowposz ].value;





//alert(mrpval);
	 
	passparam_value = refid+',,,'+a_sbno+',,,'+a_sbdatee+',,,'+a_location+',,,'+a_curr_status+',,,'+a_qry_raised+',,,'+a_qry_replied;
	
	
	
 
 var scr1= "update_search_data.php";
	

		
	     	var strURL=scr1+"?id="+passparam_value;

		//alert(strURL);
		
			
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
				alert('Record updated ...')
		req.send(null);
	}
		

				 
}



</script>

</head>

<body>

		<h2 align="center" style="font-size:17px;">
					  *** Search data ***  </h2>








<form name = "form1"  method="get"  action="<?php echo $_SERVER['PHP_SELF']; ?>">

</br>


<link rel="stylesheet" href="date_picker/jquery-ui.css">
  
  <script src="date_picker/jquery-1.12.4.js"></script>
  <script src="date_picker/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#dstart" ).datepicker();
	$( "#dend" ).datepicker();
	 
	
  } );
  
  
           $(function() {
       		 
 		$(".auto").autocomplete({
					 
            minLength: 2,
            source: "search_v.php",
            
			focus: function( event, ui ) {
                      return false;
               },
        
		select: function( event, ui ) {
              $(this).val( ui.item.desc1 );
			 // $( ".auto" ).val( ui.item.label );
               $( "#custid" ).val( ui.item.value);
		
			   
			 
			   
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


		 
		 
  </script>
<br>
	  
 <table align="center">
 <tr><td>




<table align = "center" style="font-weight:bold;">
<tr>
<td> START SB DATE</td>

<td> <input id="dstart"  name = "dstart" class="abcq"   type = "text"  size="15"  value="<?php echo  $t_date  ?>"  />  </td>
	 
<td> End SB DATE  </td>

<td> <input id="dend"  name = "dend" class="abcq"   type = "text"  size="15"  value="<?php echo  $t_date  ?>"  /> 

 </td>
	
	
	 
<td> <input type="submit" name="submit" value="SHOW RECORDS" class="abcqq">  </td>

</tr>



</table>


</form>




<?php

include('../conf.php');

if(isset($_GET['submit']))
{

$st_1 = $_GET['dstart'];
$end_1 = $_GET['dend'];


	
$result17 = mysql_query("SELECT `id`, `sbno`, `sbdate`, `location`, `curr_status`, `qry_raised`, `qry_replied` FROM `file_up` WHERE  sbdate
between STR_TO_DATE('$st_1','%d/%m/%Y')  and STR_TO_DATE('$end_1','%d/%m/%Y')");


	
?>




<form name = "form2"   >

</br>


<h4 style="text-align:center" >DATA SEARCH  REPORT  </h4>


<table border='1' cellpadding='1'  align = "center"frame="box"  bgcolor="white" width="100%"    >

 
<tr style="background-color:#000000; color:white;"> <th> SNO </th>  <th> SB No. </th>  <th> SB DATE </th>  <th>  Location  </th> <th> Current Status </th>  <th> Query Raised</th> <th> Query Replied </th> <th> Delete </th>    </tr> 


<?php
 
$i = 0;
$n_tot_z = 0;
while($row13 = mysql_fetch_array($result17))
  {   $i = $i + 1; ?>
  
 <tr>
   
   <td>  <?php  echo $i;  ?>  </td>

   <td> <input type='text' name = "sbno<?php echo   $i ?>"  value = "<?php  echo $row13['sbno'];  ?>" onchange='updatemrp("<?php echo  $row13['id'] ?>","<?php echo  $i ?>")'/>  </td>
      <td> <input type='text' name = "sbdatee<?php echo   $i ?>"  value = "<?php echo date("d/m/Y", strtotime($row13['sbdate']));  ?>" onchange='updatemrp("<?php echo  $row13['id'] ?>","<?php echo  $i ?>")'/>  </td>
	     <td> <input type='text' name = "location<?php echo   $i ?>"  value = "<?php  echo $row13['location'];  ?>" onchange='updatemrp("<?php echo  $row13['id'] ?>","<?php echo  $i ?>")'/>  </td>
		    <td> <input type='text'  size="50" name = "curr_status<?php echo   $i ?>"  value = "<?php  echo $row13['curr_status'];  ?>" onchange='updatemrp("<?php echo  $row13['id'] ?>","<?php echo  $i ?>")'/>  </td>
			   <td> <input type='text' name = "qry_raised<?php echo   $i ?>"  value = "<?php  echo $row13['qry_raised'];  ?>" onchange='updatemrp("<?php echo  $row13['id'] ?>","<?php echo  $i ?>")'/>  </td>
			      <td> <input type='text' name = "qry_replied<?php echo   $i ?>"  value = "<?php  echo $row13['qry_replied'];  ?>" onchange='updatemrp("<?php echo  $row13['id'] ?>","<?php echo  $i ?>")'/>  </td>
				  
				     <td> <input type='button' name='btnprint' class="abcqq" value='DELETE' onclick='deleterecord_1("<?php echo  $row13['id'] ?>",this)'/>  </td>

   
   
</tr>


   
<?php 



 }	?>
 



</table>















</div>
</div>

<script>
document.form1.dstart.value = "<?php echo $st_1 ?>";
document.form1.dend.value = "<?php echo $end_1 ?>"; 
</script>
</form>

<?php } ?>









</body>
</html> 