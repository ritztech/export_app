<?php

include("../conf.php");

$t_date = date("d/m/Y");

//include('../include/sidemenu.php');

//$t_date = "01/01/2016";


$prodidd=$_GET['id'];




$result1_getprof = mysql_query("SELECT `tab_auto_id`, `consigneeid`, `proforma_inv`, DATE_FORMAT(proforma_date,'%d/%m/%Y') as proforma_date, `export_ref`, `buyrefno_date`, `cntry_origin`, `cntry_final`, `pre_carr_by`, `place_of_rec_per`, `vessel`, `port_of_laod`, `port_of_dis`, `final_dest`, `del_terms`, `extra_notes`, `incoterm`, `curency`, `bankid`, `shippartyidd`, `fid`, `piv_2`, `piv3`, `last_bill_char` FROM `proformainv`  where `tab_auto_id`= $prodidd");
$row1_prodd = mysql_fetch_array($result1_getprof);

$consignee_id=$row1_prodd['consigneeid'];
$shippind_id=$row1_prodd['shippartyidd'];


$intecomid_id=$row1_prodd['incoterm'];
$bankkidd_id=$row1_prodd['bankid'];
$currzid_id=$row1_prodd['curency'];

$main_inv_no=$row1_prodd['proforma_inv'];

$last_bll_seq=$row1_prodd['last_bill_char'];

//$net_bill=$last_bll_seq++;

$main_inv_no=$main_inv_no.$last_bll_seq;











//  get consignee details   start			
		
$result1 = mysql_query("SELECT 	leg_name,fac_addr,gstin,statetype,aadhar from ledger_master  where legid = $consignee_id");
$row1 = mysql_fetch_array($result1);

$p_name = $row1[0];
//echo $p_name;

$off_addr1 = $row1[1];
$party_gst = $row1[2];
$party_aadhar = $row1['aadhar'];
$statetype =$row1['statetype'];

///  get consignee details 	   end




// shippid details start

$result32 = mysql_query("SELECT `leg_name`, `fac_addr`, `off_addr`, `fact_city`, `off_city`, `fact_state`, `off_state`, `f_pin`, `o_pin`, `o_con`, `f_contact`, `off_email`, `inctaxnum`, `servicetaxno`, `tinno`, `centralno`, `cstno`, `o_date`, `o_bal`, `acc_grp`, `dr_cr`, `broker`, `transported`, `party`, `legid`, `fid`, `firmcontact`, `bankname`, `bank_type`, `bank_number`, `ifsc_code`, `brokerage`, `brok_qty`, `acc_name`, `acc_id`, `gstin`, `aadhar`, `statetype` FROM `ledger_master` WHEre  legid = $shippind_id");
$row32 = mysql_fetch_array($result32);

$p_name_ss = $row32[0];
$off_addr1_ss = $row32[1];
$ss_aadhar = $row32['aadhar'];
$gstin_ss = $row32['gstin'];



// shippid details ends




?>

<?php

session_start();

if(!isset($_SESSION['uname'])) {echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";}



$fid=$_SESSION['fid'];

//echo $fid;


$getbill = mysql_query("SELECT `comm_inv`  FROM `m_autoid` WHERE fid = $fid");
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
 <script language="javascript" type="text/javascript" src="jscode/add_conditions_single.js">  </script>


	  
	  
 



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


  		$(".getpurchaseparty").autocomplete({
					 
            minLength: 0,
            source: "search_ledger.php",
            
			focus: function( event, ui ) {
                      return false;
               },
        
		select: function( event, ui ) {
              $(this).val( ui.item.desc1 );
			   
			   $( "#ppiddd" ).val( ui.item.value);
			
			   //$( "#placesupply" ).val( ui.item.baddress);

			    $( "#ppgstn" ).val( ui.item.gstin);

				 
				 
				   
				   
			   
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
            source: "search_terms_conditions_single.php",
            
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

p1=document.form1.consigneeid.value;
p2=document.form1.consiname.value;
if(p1=="0" || p2=="")
{
	alert("Please assign consignee details ...")
	document.form1.consiname.focus();
	return false
}



p1=document.form1.shippartyidd.value;
p2=document.form1.shippname.value;
if(p1=="0"  || p2=="" )
{
	alert("Please assign consignee details ...")
	document.form1.shippname.focus();
	return false
}

p1=document.form1.ppiddd.value;
if(p1=="0")
{
	alert("Please assign Purchase party name  ...")
	document.form1.ppname.focus();
	return false
}


p1=document.form1.ppbillno.value;
if(p1=="")
{
	alert("Please assign Purchase party bill no   ...")
	document.form1.ppbillno.focus();
	return false
}


p1=document.form1.ppqtyyy.value;
if(p1=="")
{
	alert("Please assign Purchase party Quantity ...")
	document.form1.ppqtyyy.focus();
	return false
}




	    var dt=document.form1.comminvdate
	    if (isDate(dt.value)==false){
	           dt.focus()
              return false
			  }
			  
			  	    var dt=document.form1.ppbilldateee
	    if (isDate(dt.value)==false){
	           dt.focus()
              return false
			  }


truck2=document.form1.truckno.value;
if(truck2=="0" || truck2=="")
{
	alert("Please fill truck number...")
	document.form1.truckno.focus();
	return false
}




var p_val = document.form1.totalcnt.value;

//alert(p_val);

for (var init=2; init<=p_val; init++)
  {
	  
		  
    var dt=document.form1[ "bagg" + init ]
	
	  //alert(dt.value);
	
	    if (dt.value == "" || dt.value == "0")
		{	alert( "Please fill numbre of bags  ...!" );
	          dt.focus()
              return false
        }
		
		  var dt=document.form1[ "billwght" + init ]
		  
		
			    if (dt.value == "" || dt.value == "0")
		{	alert( "Please fill weight  ...!" );
	          dt.focus()
              return false
        }
		
		  var dt=document.form1[ "ratgoods" + init ]
		
			    if (dt.value == "" || dt.value == "0")
		{	alert( "Please fill rates ...!" );
	          dt.focus()
              return false
        }
		
		
		
	
}		





p1=document.form1.comminvnum_p1.value;
pinv=pinv+p1;
p1=document.form1.comminvnum.value;
pinv=pinv+p1;
p1=document.form1.comminvnum_p2.value;
pinv=pinv+p1;





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
		alert("Duplicate bill entry , please check again ...");
		document.form1.comminvnum_p2.focus();
	}
	
	else
	{
		
	//alert("submit inside function ...");
	 document.getElementById("form1").submit();
	}
	
	

	

    }
  }
xmlhttp.open("GET","chk_dup_comm_inv_num.php?q="+str,true);
xmlhttp.send();


}

		 

</script>

</head>

<body>



<?php // include('../include/sidemenu.php');?>


<div align="center">
 
  
  <INPUT  Type="BUTTON" VALUE="HOME" ONCLICK="  window.location.href='../index.php'">

  

  <form id="form1" name="form1" method="post"  action="comm_inv_bck.php">

  <table  border="1" rules="none" frame="box" cellpadding="6" style="background-color:white; color:black;font-weight:bold" >

      <tbody >
	  
<tr  style="color:white;background-color:black"  > <td colspan="5">  ADD NEW COMMERCIAL INVOICE  </td> </tr>

        <tr>

          <td colspan="4"  bgcolor="#14C4B6"></td>

        </tr>


	
        <tr >

          <td colspan = "4" align = "left">Invoice  Number  <input type="text" name="comminvnum_p1"  value="<?php  echo $row1_prodd['piv3'] ?>" size = "5"    /> <input type="text" name="comminvnum"  value="<?php  echo $row1_prodd['piv_2'] ?>"   size = "10"    />
		   <input type="text" name="comminvnum_p2" readonly  value="<?php echo $main_inv_no; ?>" size = "10"    />
		  Invoice Date:<input id="comminvdate"   name = "comminvdate" onchange = "isDate(this.value)"    value="<?php echo $t_date ?>" type = "text"  size="17"  required = "required" />
		 

		   
		   
			 
			 </td>

             

        </tr>

		
	
        <tr >

          <td colspan = "4" align = "left">Proforma Invoice  <input type="text" name="billno"  readonly  value="<?php  echo $row1_prodd['piv3'] ?>/<?php  echo $row1_prodd['piv_2'] ?>/<?php  echo $row1_prodd['proforma_inv'] ?> " size = "20"    />
		  Date:<input id="saudadate"   name = "saudadate" readonly     value="<?php   echo $row1_prodd['proforma_date']; ?>" type = "text"  size="17"  required = "required" />

		 
		 
Exporter  ref : <input type="text"   size = "30"  value="<?php   echo $row1_prodd['export_ref']; ?>"   id="exportrefnum" name = "exportrefnum" /> 

		 
		   
		   
			 
			 </td>

             

        </tr>
		

	
		<tr>  <td>  Buyer ref no & date   : <input type="text"   size = "50" value="<?php   echo $row1_prodd['buyrefno_date']; ?>"  id="buyerrefnoanddate" name = "buyerrefnoanddate" /> </td>   </tr>
		
		
		<tr >
		
		<td colspan = "4"> <table  border = "1" id = "billingtable">
		
<tr> <td> CONSIGNEE NAME  </td>  <td> <input type="text"   size = "30"  value="<?php echo $p_name ?>" class='auto'   id="consiname" name = "consiname" />
<input type="hidden"   size = "5"  value="<?php echo $consignee_id ?>"   id="consigneeid" name = "consigneeid" >  </td>
<td> GST:- </td>  <td> <p id = "consiggstaa">  </p>  </td>
<td> AADHAR </td>  <td> <p id = "consigaadhar">  </p>  </td>
<td> BILLING Address </td>  <td> <p id = "consigaddr">  </p> </td>		</tr>

<tr> <td> SHIPPING NAME  </td>  <td> 
<input type="text"   size = "30" tabIndex = "1"    value="<?php echo $p_name_ss ?>"   class='autoship'   id="shippname" name = "shippname" >
<input type="hidden"   size = "5"    value="<?php echo $shippind_id ?>"     id="shippartyidd" name = "shippartyidd" >  </td>
<td> GST:- </td>  <td> <p id = "shipiggstaa">  </p>  </td>
<td> AADHAR </td>  <td> <p id = "shipgaadhar">  </p>  </td>
<td> SHIPPING Address </td>  <td> <p id = "shipigaddr">  </p> </td>		


<td>  </td>

</tr>


</table>		</td>


		

		
	     </tr>
		
        <tr>

          <td colspan="4"  bgcolor="#14C4B6"> *** PURCAHSE DETAILS ***  </td>
		  
        </tr>
		
		<tr> <td  colspan="5">


<table>   

<tr> <td> PURCHASE PARTY NAME :  </td>  <td> <input type="text"   size = "30"  value="" class='getpurchaseparty'   value="" id="ppname" name = "ppname" /> 
<input type="hidden"   size = "5"  value="0"   id="ppiddd" name = "ppiddd" />      </td>   <td> GSTIN:  </td>  <td>  <input type="text"   size = "17"  value=""    id="ppgstn" name = "ppgstn" />       </td>   	  </tr> 
<tr> <td>  Bill/Inovice Number  :  </td>  <td>  <input type="text"   size = "25"  value=""   id="ppbillno" name = "ppbillno" />        </td>   <td> Date of Inovice:  </td>  <td>  <input id="ppbilldateee"   name = "ppbilldateee" onchange = "isDate(this.value)"    value="" type = "text"  size="17"  required = "required" />      </td>   	  </tr> 
<tr> <td>  QTY  :  </td>  <td>  <input type="text"   size = "25"  value=""   id="ppqtyyy" name = "ppqtyyy" />     </td>   <td> </td>  <td>     </td>   	  </tr> 


</table>






		</td> </tr>
		
		

        <tr>

          <td colspan="4"  bgcolor="#14C4B6"></td>

        </tr>



		
		
				<tr>
		<td>
		
		<table>
		<tr>  <td>
		<table>
				<tr> <td>  Country of origin of goods </td>  <td> <input type="text" name="contryorigion" tabIndex = "1"  value="<?php   echo $row1_prodd['cntry_origin']; ?>"  id="contryorigion" size="45"/>   </td>   </tr>
		</table>
		</td>
		
		<td>
		
				<table>

		<tr> <td>  Country of final destination </td>  <td> <input type="text" name="cntryfinaldest" tabIndex = "1"  value="<?php   echo $row1_prodd['cntry_final']; ?>"  id="cntryfinaldest" size="45"/> </td>   </tr>
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

 



  <th>ITEM NAME</th>   <th>HSN</th>   <th>Detail</th>    <th> Number of Bags </th>  <th></th> <th></th> <th>  </th> <th>  BILLING WEIGHT </th>	<th> </th>	<th> RATE OF GOODS </th>	<th>VALUE </th>	<th></th>	<th>BILL VALUE</th> <th>REMARK</th>

  

  </tr>

  

 



</table> 



<input  type = "hidden"  size = "5" name = "totalcnt"  value="1" id = "totalcnt" /> 

</td>

		  

		  </tr>

		  

		
				<tr>
		<td>
		
		<table>
		<tr>  <td valign="top">
		<table>
		<tr> <td>  Pre- Carriage by </td>  <td>  <input type="text"   size = "20"  value="<?php   echo $row1_prodd['pre_carr_by']; ?>"   name="precarbyy" id="precarbyy" />   </td>   </tr>
				<tr> <td>  Place of receipt by Pre- Carriage </td>  <td> <input type="text" value="<?php   echo $row1_prodd['place_of_rec_per']; ?>"  size = "30" name="placeofrecprecarr" id="placeofrecprecarr" />   </td>   </tr>
				<tr> <td>  Truck No. </td>  <td> <input type="text" value=""  size = "30" name="truckno" id="truckno" />   </td>   </tr>
			


			
		</table>
		</td>
		
		<td>
		
				<table>
		<tr> <td>  Truck no/Vessel/Flight No.  </td>  <td> <input type="text" value="<?php   echo $row1_prodd['vessel']; ?>"   size = "30" name="vesselflight" id="vesselflight" />   </td>   </tr>
		<tr> <td>  Port of Discharge  </td>  <td> <input type="text" value="<?php   echo $row1_prodd['port_of_dis']; ?>"   size = "30" name="port_discjar" id="port_discjar" />  </td>   </tr>
		<tr> <td>  Port of Loading   </td>  <td> <input type="text"  value="<?php   echo $row1_prodd['port_of_laod']; ?>"  size = "30" name="port_loadingggg" id="port_loadingggg" />  </td>   </tr>
		<tr> <td>  Final Destination   </td>  <td> <input type="text"  value="<?php   echo $row1_prodd['final_dest']; ?>"  size = "30" name="finaldest2" id="finaldest2" />  </td>   </tr>
		
		</table>
		
		
		</td>
		
		</tr>
		
		<tr>  <td> Delivery & Payment Terms:  ::  <input type="text"   value="<?php   echo $row1_prodd['del_terms']; ?>"  size = "50" name="deltermssssss" id="deltermssssss" />   </td> </tr>
		
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
		
		
				<tr>  <td> Extra Notes  ::  <input type="text"  value="<?php   echo $row1_prodd['extra_notes']; ?>"   size = "50" name="extranotesssss" id="extranotesssss" />   </td> </tr>
				
			<tr>  <td> Main Condition</br>
			<textarea id="masterconditin"  name="masterconditin"   rows="5" cols="100">WE DO HEREBY CERTIFY THAT THE MERCHANDISE ARE OF INDIAN ORIGIN. WE ALSO CERTIFY THAT QUALITY, QUANTITY, RATE, SPECIFICATION OF THE MERCHANDISE ARE STRICTLY IN ACCORDANCE WITH PROFORMA INVOICE.
INDIAN CUSTOMS CLEARANCE THROUGH DUTY DRAWBACK SCHEME (CUSTOMS PORTION ONLY) WE INTEND TO CLAIM REWARDS UNDER MEIS SCHEME. 
</textarea>   </td> </tr>

		
	

  <tr> <td align = "left">
<INPUT type="button"  class="buttonn button3"  name = "btn111" value="Add New Condition" onclick = "addRow_condition('poconditions','','');"  />
<b>SEARCH TERMS & CONDITIONS  : </b>  <input type="text"    tabIndex = "1"   class='get_terms_condit'   id="gtesearchisss" name = "gtesearchisss" > 

  <b></b></td> </tr>
  
  <tr>
  <td align = "center">
  
  <table id="poconditions" border = "1"  width = "100%">
  <tr> <th></th><th>DEL</th><th>SNO.</th><th></th><th>Description</th> </tr>
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

<input  type = "hidden" value="<?php echo $prodidd ?>"   name = "proformiddddd"   id = "proformiddddd" /> 
<?php

$ddddnet_bill=$last_bll_seq++;

?>

<input  type = "hidden" value="<?php echo $last_bll_seq ?>"  size="5" name = "last_charid"   id = "proformiddddd" /> 







		
</form>�


  <script>
  
  document.form1.Incoterm.value="<?php echo $intecomid_id ?>";
document.form1.bankdetaisl.value="<?php echo $bankkidd_id ?>";
document.form1.currency.value="<?php echo $currzid_id ?>";



  $( function() {
 
	$( "#comminvdate" ).datepicker();
		$( "#ppbilldateee" ).datepicker();
	
	
		
  } );
  </script>
  
</div>



<?php
$pocindtionzss = mysql_query("SELECT `po_1`, `po_2` FROM `po_conditions` WHERE 1=2");

while($rowppp_cnd = mysql_fetch_array($pocindtionzss))
{
$cnd_1 = '';
$cnd_2 = $rowppp_cnd['1'];


?>

<script>



addRow_condition('poconditions',"<?php echo $cnd_1 ?>","<?php echo $cnd_2 ?>");





</script>

<?php

}

?>


<?php


//echo "SELECT `tab_auto_id`, `proforma_id`, `item_id`, `goods_descr`, `hsncode`, `unit`, `qty`, `rate`, `amount`,item_details,gst FROM `proforma_item` WHERE `proforma_id`=$prodidd";


$getprofitems = mysql_query("SELECT `tab_auto_id`, `proforma_id`, `item_id`, `goods_descr`, `hsncode`, `unit`, `qty`, `rate`, `amount`,item_details,gst,bags FROM `proforma_item` WHERE `proforma_id`=$prodidd");

while($rowppp_appitems = mysql_fetch_array($getprofitems))
{




$itemname = $rowppp_appitems['goods_descr'];
$itemname_details = $rowppp_appitems['item_details'];
$hsncode = $rowppp_appitems['hsncode'];
$rate = $rowppp_appitems['rate'];
$qty = $rowppp_appitems['qty'];
$item_id = $rowppp_appitems['item_id'];
$gsttt = $rowppp_appitems['gst'];
$bags = $rowppp_appitems['bags'];


//echo $itemname;

?>

<script>

//alert('dataTable','16',"<?php echo $itemname ?>","<?php echo $item_id ?>","<?php echo $hsncode ?>","<?php echo $gsttt ?>","<?php echo $itemname_details ?>","<?php echo $qty ?>","<?php echo $rate ?>" )

addRow('dataTable',<?php echo $fid; ?>,"<?php echo $itemname ?>","<?php echo $item_id ?>","<?php echo $hsncode ?>","<?php echo $gsttt ?>","<?php echo $itemname_details ?>","<?php echo $qty ?>","<?php echo $rate ?>","<?php echo $bags ?>" );
</script>

<?php

}

?>






</body>

</html>

