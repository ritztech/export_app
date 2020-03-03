<?php

include("../conf.php");

$t_date = date("d/m/Y");

//include('../include/sidemenu.php');

//$t_date = "01/01/2016";

?>

<?php

session_start();

if(!isset($_SESSION['uname'])) {echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";}



$fid=$_SESSION['fid'];

$getbill = mysql_query("SELECT `sellid`  FROM `m_autoid` WHERE fid = $fid");
$getbill_1 = mysql_fetch_array($getbill);

$n_bill_1 = $getbill_1['0'];


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<style>

input:focus {
  background-color:gold;
}

</style>

<title>RITZ</title>

<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />

<link href="..//style.css" rel="stylesheet" type="text/css" />
    <link href="js/jquery-ui.css" rel="stylesheet">
      <script src="js/jquery-1.10.2.js"></script>
      <script src="js/jquery-ui.js"></script>
	  

<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>

<script language="javascript" type="text/javascript" src="jscode/a4code.js">  </script>
 <script language="javascript" type="text/javascript" src="jscode/add_conditions.js">  </script>


	  
	  
 



<script language="javascript">

function calcfreight()
{
	
var v_f1 = 	document.form1.freighttotal.value;
var v_f2 = 	document.form1.freightadv.value;

var v_f3 = v_f1 - v_f2;

document.form1.freightpaid.value = v_f3;

	
}

function hledger(thelist,theinput) {

	var idx = thelist.selectedIndex;

	var content = thelist.options[idx].innerHTML;



}





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

	



function getDistrict(provinceId) {	



  	var strURL="findsales.php?province="+provinceId;

	var req = getXMLHTTP();

	if (req) {

		req.onreadystatechange = function() 

		{

			if (req.readyState == 4) {

			// only if "OK"

				if (req.status == 200) {						

					document.getElementById('districtdiv').innerHTML=req.responseText;

					document.getElementById('communediv').innerHTML=req.responseText;					

				} else {

					alert("Problem while using XMLHTTP:\n" + req.statusText);

				}

			}				

		}			

		req.open("GET", strURL, true);

		req.send(null);

	}		

}







function h12311(str)

{



if (window.XMLHttpRequest)

  {// code for IE7+, Firefox, Chrome, Opera, Safari

  xmlhttp=new XMLHttpRequest();

  }

else

  {// code for IE6, IE5

  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

  }

xmlhttp.onreadystatechange=function()

  {

  if (xmlhttp.readyState==4 && xmlhttp.status==200)

    {

	

	var fruits = xmlhttp.responseText;

	var arfruits = fruits.split(',');

	

	

document.form1.partyname.value = arfruits[0];

//document.form1.brokername.value = arfruits[1];

document.form1.quantity.value = arfruits[2];

document.form1.bag.value = arfruits[3];

document.form1.packing.value = arfruits[4];






    }

  }

xmlhttp.open("GET","get_sales_invoice_detail_a6.php?q="+str,true);

xmlhttp.send();







}





</script>

<script type="text/javascript">

function phappycode1(idvalue){



document.form1.suppid.value = idvalue;

}




function phappycode2(thelist){


	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;

document.form1.brokername.value = content; 
 
}







function ValidateForm(){




	

	    var dt=document.form1.billtydate

	    if (isDate(dt.value)==false){

	           dt.focus()

              return false

    }

	

	 var dt=document.form1.saudadate

	    if (isDate(dt.value)==false){

	           dt.focus()

              return false

    }

	

	

	

		    var dt=document.form1.item2.value;

				

	    if (dt=="Select stock item"){

		 alert('Please Select stock item');
		  document.form1.item2.focus();

              return false

    }

	

	

	var dt=document.form1.province;

					

	    if (dt.value < 1){

		 alert('Please Select party name name');

		 document.form1.keyword.focus()
		 
	
              return false  }

			  

			  

			  var dt=document.form1.ledgername;

					

	    if (dt.value < 1){

		 alert('Please Select Debit Ledger:');

		 dt.focus()

              return false  }
			  
			  
			  
	var dt=document.form1.billno;
	    if (dt.value==""){

		 alert('Fill bill number ...');

		  dt.focus()


              return false


    }

			  

	

	return true }

	

	
function phappycode21(thelist){


	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;

document.form1.trandname.value = content; 
 
}







  $(function() {
       		 
  		$(".auto").autocomplete({
					 
            minLength: 0,
            source: "search_ledger.php",
            
			focus: function( event, ui ) {
                      return false;
               },
        
		select: function( event, ui ) {
              $(this).val( ui.item.desc1 );
			  		  
			  $( "#consigneeid" ).val( ui.item.value);
			  	 document.getElementById('consiggstaa').innerHTML = ui.item.gstin;
				 document.getElementById('consigaddr').innerHTML = ui.item.baddress;
				 document.getElementById('consigaadhar').innerHTML = ui.item.aadhar;
				 
			
			
			$( "#shippname" ).val( ui.item.desc1);
			$( "#shippartyidd" ).val( ui.item.value);
			 //  $( "#placesupply" ).val( ui.item.baddress);
			   $( "#destinationplace" ).val( ui.item.baddress);
			   document.getElementById('shipiggstaa').innerHTML = ui.item.gstin;
			   document.getElementById('shipigaddr').innerHTML = ui.item.baddress;
			   document.getElementById('shipgaadhar').innerHTML = ui.item.aadhar;
				
				
				
				 document.form1.shippname.focus();
				 
				 
				   
				   
			  			  
			   
               return false;
            }
         }
		 
)	


  		$(".autoship").autocomplete({
					 
            minLength: 0,
            source: "search_ledger.php",
            
			focus: function( event, ui ) {
                      return false;
               },
        
		select: function( event, ui ) {
              $(this).val( ui.item.desc1 );
			   
			   $( "#shippartyidd" ).val( ui.item.value);
			   $( "#destinationplace" ).val( ui.item.baddress);
			   //$( "#placesupply" ).val( ui.item.baddress);
			   document.getElementById('shipiggstaa').innerHTML = ui.item.gstin;
			   document.getElementById('shipigaddr').innerHTML = ui.item.baddress;
			   document.getElementById('shipgaadhar').innerHTML = ui.item.aadhar;
				 
				 
				   
				   
			   
               return false;
            }
         }
		 
)	

	 

  		$(".auto_stk").autocomplete({
			
							 
            minLength: 0,
            source: "search_stk_item.php",
            
			focus: function( event, ui ) {
                      return false;
               },
        
		select: function( event, ui ) {
              $(this).val( ui.item.label );
			  
			//  alert(ui.item.i_detail);
			  
			  addRow('dataTable',<?php echo $fid; ?>,ui.item.label,ui.item.value,ui.item.hsn,ui.item.gst,ui.item.i_detail,'','','0');
			  	var b = document.form1.totalcnt.value;
	
              document.form1[ "billwght" + b ].select();
			  
			  
				
				
						   
               return false;
            }
         }
		 
)



  		$(".get_terms_condit").autocomplete({
			
							 
            minLength: 0,
            source: "search_terms_conditions.php",
            
			focus: function( event, ui ) {
                      return false;
               },
        
		select: function( event, ui ) {
              $(this).val( ui.item.label );
			  
			//  alert(ui.item.i_detail);
			
			addRow_condition('poconditions',ui.item.val1,ui.item.val2)
			  

//$companies[] =  array( 'value' => $row['tab_id'],'label' => $row['stockitem'],'val1' => $row['val1'],'val2' => $row['val2'] );

				
						   
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
		 
		 


		 function myFunction()
{

var pinv="";

p1=document.form1.billno.value;

pinv=pinv+p1;

if(p1=="")
{
	alert("Please fill Proforma Invoice details ...")
	document.form1.billno.focus();
	return false
}

  if (isNaN(p1)) {
    alert('Please fill Number only ...');
	document.form1.billno.focus();
	return false
  }
  


p1=document.form1.invp1.value;
if(p1=="")
{
	alert("Please fill Proforma Invoice details ...")
	document.form1.invp1.focus();
	return false
}

pinv=pinv+p1;


p1=document.form1.invp2.value;
if(p1=="")
{
	alert("Please fill Proforma Invoice details ...")
	document.form1.invp2.focus();
	return false
}


pinv=pinv+p1;




p1=document.form1.consigneeid.value;
if(p1=="0")
{
	alert("Please assign consignee details ...")
	document.form1.consiname.focus();
	return false
}

p1=document.form1.totalcnt.value;
if(p1=="0")
{
	alert("Please add product items  ...")
	document.form1.stk_item.focus();
	return false
}

p1=document.form1.deltermssssss.value;
if(p1=="")
{
	alert("Please fill Terms of Delivery  ...")
	document.form1.deltermssssss.focus();
	return false
}






	    var dt=document.form1.saudadate

	    if (isDate(dt.value)==false){

	           dt.focus()

              return false

    }
	

//alert(pinv)

f_chkdupbill(pinv)


//document.getElementById("form1").submit();
	
}


function f_chkdupbill(str)
{


if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var fruits = xmlhttp.responseText;
	var val_ret = fruits;
	
	//alert(val_ret);
	
	var val_ret = val_ret.trim();
	
	if(val_ret == "1")
	{
		alert("Duplicate proforma entry , please check invoice details again ...");
		document.form1.billno.focus();
	}
	
	else
	{
		
		//alert("submit inside function ...");
	document.getElementById("form1").submit();
	}
	
	

	

    }
  }
xmlhttp.open("GET","chk_dup_proforma_num.php?q="+str,true);
xmlhttp.send();


}

		 

</script>

</head>

<body>



<?php // include('../include/sidemenu.php');?>


<div align="center">

  
  <INPUT  Type="BUTTON" VALUE="HOME"     style="color:white;background-color:black" ONCLICK="  window.location.href='../index.php'">

  

  <form id="form1" name="form1" method="post"  action="salesinvoice_back.php">

  <table  border="1" rules="none" frame="box" cellpadding="6" style="background-color:white; color:black;font-weight:bold" >

      <tbody >

<tr  style="color:white;background-color:black"  > <td colspan="5">  ADD NEW PROFORMA  </td> </tr>
        <tr>

          <td colspan="4"  bgcolor="#14C4B6"></td>

        </tr>
		
	
        <tr >

          <td colspan = "4" align = "left">Proforma Invoice  <input type="text" name="invp1"  size = "3"  value = "SAN"   />  <input type="text" name="invp2"   size = "8"  value = "2019-2020"   />    <input type="text" name="billno"    size = "5"  value = "<?php echo $n_bill_1 ?>"   />
		  Date:<input id="saudadate"    name = "saudadate" onchange = "isDate(this.value)"    value = "<?php echo $t_date ?>" type = "text"  size="17"  required = "required" />

		 
		 
Exporter  ref : <input type="text"   size = "30"  value = "IEC : ABCCS3959G" id="exportrefnum" name = "exportrefnum" /> 

		 
		   
		   
			 
			 </td>

             

        </tr>
		

	
		<tr>  <td>  Buyer ref no & date   : <input type="text"   size = "50" autofocus  id="buyerrefnoanddate" name = "buyerrefnoanddate" /> </td>   </tr>
		
		
		<tr >
		
		<td colspan = "4"> <table  border = "1" id = "billingtable">
		
<tr> <td> CONSIGNEE NAME  </td>  <td> <input type="text"   size = "30"   class='auto'   id="consiname" name = "consiname" />
<input type="hidden"   size = "5"    id="consigneeid"  value="0" name = "consigneeid" >  </td>
<td> GST:- </td>  <td> <p id = "consiggstaa">  </p>  </td>
<td> AADHAR </td>  <td> <p id = "consigaadhar">  </p>  </td>
<td> BILLING Address </td>  <td> <p id = "consigaddr">  </p> </td>		</tr>

<tr> <td> SHIPPING NAME  </td>  <td> 
<input type="text"   size = "30" tabIndex = "1"  class='autoship'   id="shippname" name = "shippname" >
<input type="hidden"   size = "5"    id="shippartyidd" name = "shippartyidd" >  </td>
<td> GST:- </td>  <td> <p id = "shipiggstaa">  </p>  </td>
<td> AADHAR </td>  <td> <p id = "shipgaadhar">  </p>  </td>
<td> SHIPPING Address </td>  <td> <p id = "shipigaddr">  </p> </td>		


<td>  </td>

</tr>


</table>		</td>


		

		
	     </tr>
		


        <tr>

          <td colspan="4"  bgcolor="#14C4B6"></td>

        </tr>



		
		
				<tr>
		<td>
		
		<table>
		<tr>  <td>
		<table>
				<tr> <td>  Country of origin of goods </td>  <td> <input type="text" name="contryorigion" tabIndex = "1"  value = "India" id="contryorigion" size="45"/>   </td>   </tr>
		</table>
		</td>
		
		<td>
		
				<table>

		<tr> <td>  Country of final destination </td>  <td> <input type="text" name="cntryfinaldest" tabIndex = "1"  value = "" id="cntryfinaldest" size="45"/> </td>   </tr>
		</table>
		
		
		</td>
		
		</tr>
		
		</table>
		
		
		</td>
		</tr>
		
		
		
		

		
		
		

        <tr>

          

<td colspan="4">






<b>SEARCH ITEM : </b>  <input type="text"    tabIndex = "1"   class='auto_stk'   id="stk_item" name = "stk_item" > 

 

 <table width="982" border='1' cellpadding='1'   id="dataTable"   >



  <tr>

   <th>TOTAL</th> 
   
   <th>   </th>
    <th>   </th>
   

   <th> <input  type = "hidden"  size = "3" name = "totbag" id = "totbag" /> </th>

   <th> <input  type = "hidden"  size = "5" name = "totgrsweight" id = "totgrsweight" /> </th>

   <th> <input  type = "hidden"  size = "5" name = "totmandi" id = "totmandi" />  </th> 
      <th>   </th>

   <th> <input  type = "text"  size = "5" name = "totbilwght" id = "totbilwght" />     </th>

   <th> </th> 
   <th> <input  type = "text"  size = "5" name = "totrot" id = "totrot" />  </th>	

   <th> <input  type = "text"  size = "5" name = "totrog" id = "totrog" />  </th>

   <th> <input  type = "text"  size = "5" name = "totvalue" id = "totvalue" />  </th> 

   <th> <input  type = "text"  size = "5" name = "totvto" id = "totvto" />  </th>

    <th> <input  type = "text"  size = "5" name = "totbillv" id = "totbillv" />  </th>

</tr>



<tr>

 



  <th>ITEM NAME</th>   <th>HSN</th>   <th>Detail</th>    <th>Number of Bags</th>  <th></th> <th></th> <th>  </th> <th>  BILLING WEIGHT </th>	<th> </th>	<th> RATE OF GOODS </th>	<th>VALUE </th>	<th></th>	<th>BILL VALUE</th> <th>REMARK</th>

  

  </tr>

  

 



</table> 



<input  type = "hidden"  value = "0" size = "5" name = "totalcnt" id = "totalcnt" /> 

</td>

		  

		  </tr>

		  

		
				<tr>
		<td>
		
		<table>
		<tr>  <td valign="top">
		<table>
		<tr> <td>  Pre- Carriage by </td>  <td>  <input type="text"   size = "20"  value = "Road" name="precarbyy" id="precarbyy" />   </td>   </tr>
				<tr> <td>  Place of receipt by Pre- Carriage </td>  <td> <input type="text"   size = "30" name="placeofrecprecarr" id="placeofrecprecarr" />   </td>   </tr>
		</table>
		</td>
		
		<td>
		
				<table>
		<tr> <td>  Vessel/Flight No.  </td>  <td> <input type="text"  value = "By Truck "  size = "30" name="vesselflight" id="vesselflight" />   </td>   </tr>
		<tr> <td>  Port of Discharge  </td>  <td> <input type="text"   size = "30" name="port_discjar" id="port_discjar" />  </td>   </tr>
		<tr> <td>  Port of Loading   </td>  <td> <input type="text"   size = "30" name="port_loadingggg" id="port_loadingggg" />  </td>   </tr>
		<tr> <td>  Final Destination   </td>  <td> <input type="text"   size = "30" name="finaldest2" id="finaldest2" />  </td>   </tr>
		
		</table>
		
		
		</td>
		
		</tr>
		
		<tr>  <td> Delivery & Payment Terms:  ::  <input type="text"   value = "" size = "50" name="deltermssssss" id="deltermssssss" />   </td> </tr>
		
		</table>
		
		
		</td>
		</tr>
		
				<tr>
		<td>
		
		<table>

		
		</table>
		
		
		</td>
		</tr>
		
		
		
		
		
		
		
		


		        <tr>



          <td>Incoterm   : -  <select name="Incoterm" >


<option value = "EX-WORK"> EX-WORK </option>
                       <option value = "FOB"> FOB </option>
					    <option value = "CFR"> CFR </option>
						 <option value = "CIF"> CIF </option>

                    

          </select>
		::: Bank Details   : -  		  
		              <select name="bankdetaisl" style="width:150px">

          
                       <?php               

				$query = mysql_query("SELECT `bank_id`, `bnkname`, `branchaddr`, `accname`, `accnum`, `ifsc`, `swidt` FROM `mybanks`");

				while($row = mysql_fetch_array($query)){

					$brid = $row['bank_id'];

					$brokername = $row['bnkname'];

			?>

                       <option value = "<?php echo $brid; ?>"> <?php echo $brokername; ?></option>

                       <?php } ?>

                 
				 

          </select>
		  
		  
		:::Currency   : -           <select name="currency" style="width:150px">

                                   <?php               

				$query = mysql_query("SELECT `tab_auto_id`, `curr_name` FROM `currency_master`");

				while($row = mysql_fetch_array($query)){

					$brid = $row['tab_auto_id'];

					$brokername = $row['curr_name'];

			?>

                       <option value = "<?php echo $brid; ?>"> <?php echo $brokername; ?></option>

                       <?php } ?>
					   
					 
					 

                 
				 

          </select>
		  
		  
		  </td>
		  
		  
		  
		  
		  

        </tr>
		
		
				<tr>  <td> Extra Notes  ::  <input type="text"   size = "50" name="extranotesssss" id="extranotesssss" />   </td> </tr>

		
	

  <tr> <td align = "left">
<INPUT type="button"  class="buttonn button3"  name = "btn111" value="Add New Condition" onclick = "addRow_condition('poconditions','','');"  />
<b>SEARCH TERMS & CONDITIONS  : </b>  <input type="text"    tabIndex = "1"   class='get_terms_condit'   id="gtesearchisss" name = "gtesearchisss" > 

  <b></b></td> </tr>
  
  <tr>
  <td align = "center">
  
  <table id="poconditions" border = "1"  width = "100%">
  <tr> <th></th><th>DEL</th><th>SNO.</th><th>Terms</th><th>Description</th> </tr>
  </table>
  
  
  </td>
  </tr>
  
  



        <tr>

          <td>&nbsp;</td>

          <td>&nbsp;</td>

          <td> <input type="button"  tabIndex = "1"  style = "color:blue; font-weight:bold;height: 25px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;"  onclick="myFunction()" value="SAVE"   />  </td>

          <td>&nbsp;</td>

        </tr>

      </tbody>

    </table>
	
	<input  type = "hidden" value="0"  size = "5" name = "totalcnt_cnd" id = "totalcnt_cnd" /> 

	
</form>�


  <script>
  $( function() {
    $( "#saudadate" ).datepicker();
		
  } );
  </script>
  
</div>



<?php

$pocindtionzss = mysql_query("SELECT `val1`, `val2` FROM `condition_master` ");

while($rowppp_cnd = mysql_fetch_array($pocindtionzss))
{
$cnd_1 = $rowppp_cnd['0'];
$cnd_2 = $rowppp_cnd['1'];


?>

<script>
addRow_condition('poconditions',"<?php echo $cnd_1 ?>","<?php echo $cnd_2 ?>");

</script>

<?php

}

?>



</body>

</html>

