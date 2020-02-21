<?php
include("../conf.php");
$t_date = date("d/m/Y");$sales_id=$_GET['id'];$result13 = mysql_query("SELECT `stockid`, `bag`, `grswght`, `mandiwght`, `billwght`, `rot`, `rog`, `vale`, `vtou`, `bilvalue`, `remark`,stid ,w_per_bag,hsnFROM `stock_ref` WHERE formid=$sales_id and tempid='A6'");//$sales_id=1626;$get_salesa6 = mysql_query("SELECT `fid`, `billno`, DATE_FORMAT(`date`,'%d/%m/%Y') as date_s , `paymentterms`, `truckno`, `billtyno`, `freighttotal`, `freightadv`, `freightpaid`, DATE_FORMAT(`billtydate`,'%d/%m/%Y') as billtydate, `bag1`, `grossweight2`, `mandigatepass1`, `billweight`, `rateoftax1`, `rateofgoods1`, `value1`, `vattax1`, `billvalue1`, `siid`, `supid`, `brkid`, `trid`, `brokerage_type`, `contractnumber`, `freight_type`, `freight_receivable`, `gst_0`, `gst_5`, `gst_12`, `gst_18`, `gst_28`, `billtype`, `placesupply`, `shippid`,drivername,destinationplace,delremarksss FROM `mandia6`  WHERE siid=$sales_id");$get_salesa6_rec = mysql_fetch_array($get_salesa6);$supid_1 = $get_salesa6_rec['supid'];$brkid111 = $get_salesa6_rec['brkid'];$trkid111 = $get_salesa6_rec['trid'];$shippid = $get_salesa6_rec['shippid'];$s_billno = $get_salesa6_rec['billno'];$s_billdate = $get_salesa6_rec['date_s'];$s_oed_no = $get_salesa6_rec['contractnumber'];$s_place_suply = $get_salesa6_rec['placesupply'];$s_billtydate = $get_salesa6_rec['billtydate'];$s_paymentterms = $get_salesa6_rec['paymentterms'];$s_truckno = $get_salesa6_rec['truckno'];$s_billtyno = $get_salesa6_rec['billtyno'];$s_freighttotal = $get_salesa6_rec['freighttotal'];$s_freightadv = $get_salesa6_rec['freightadv'];$s_freightpaid = $get_salesa6_rec['freightpaid'];$s_brokerage_type = $get_salesa6_rec['brokerage_type'];$s_freight_type = $get_salesa6_rec['freight_type'];$s_freight_receivable = $get_salesa6_rec['freight_receivable'];$s_billtype = $get_salesa6_rec['billtype'];$result1 = mysql_query("SELECT 	leg_name,fac_addr,gstin,statetype,aadhar from ledger_master  where legid = $supid_1");$row1 = mysql_fetch_array($result1);$p_name = $row1[0];//echo $p_name;$off_addr1 = $row1[1];$party_gst = $row1[2];$party_aadhar = $row1['aadhar'];$statetype =$row1['statetype'];$result32 = mysql_query("SELECT `leg_name`, `fac_addr`, `off_addr`, `fact_city`, `off_city`, `fact_state`, `off_state`, `f_pin`, `o_pin`, `o_con`, `f_contact`, `off_email`, `inctaxnum`, `servicetaxno`, `tinno`, `centralno`, `cstno`, `o_date`, `o_bal`, `acc_grp`, `dr_cr`, `broker`, `transported`, `party`, `legid`, `fid`, `firmcontact`, `bankname`, `bank_type`, `bank_number`, `ifsc_code`, `brokerage`, `brok_qty`, `acc_name`, `acc_id`, `gstin`, `aadhar`, `statetype` FROM `ledger_master` WHEre  legid = $shippid");$row32 = mysql_fetch_array($result32);$p_name_ss = $row32[0];$off_addr1_ss = $row32[1];$ss_aadhar = $row32['aadhar'];$gstin_ss = $row32['gstin'];									$result33 = mysql_query("SELECT `leg_name`,legid  FROM `ledger_master`  WHERE  legid = $brkid111");$row33 = mysql_fetch_array($result33);$brok_name_ss = $row33['0'];$brok_name_id = $row33['1'];//echo $brok_name_ss;$result34 = mysql_query("SELECT `leg_name`,legid   FROM `ledger_master` where  legid = $trkid111");$row34 = mysql_fetch_array($result34);$trans_name_ss = $row34['0'];$trans_name_id = $row34['1'];
?>
<?php
session_start();
if(!isset($_SESSION['uname'])) {echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";}

$fid=$_SESSION['fid'];$getbill = mysql_query("SELECT `sellid`  FROM `m_autoid` WHERE fid = $fid");$getbill_1 = mysql_fetch_array($getbill);$n_bill_1 = $getbill_1['0'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><style>input:focus {  background-color:gold;}</style>
<title>RITZ</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="..//style.css" rel="stylesheet" type="text/css" />    <link href="js/jquery-ui.css" rel="stylesheet">      <script src="js/jquery-1.10.2.js"></script>      <script src="js/jquery-ui.js"></script>	  
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/a4code_2.js">  </script>	  	   

<script language="javascript">function calcfreight(){	var v_f1 = 	document.form1.freighttotal.value;var v_f2 = 	document.form1.freightadv.value;var v_f3 = v_f1 - v_f2;document.form1.freightpaid.value = v_f3;	}
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

function phappycode2(thelist){	var idx = thelist.selectedIndex;	var content = thelist.options[idx].innerHTML;document.form1.brokername.value = content;  }


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
		 alert('Please Select stock item');		  document.form1.item2.focus();
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
              return false  }			  			  			  	var dt=document.form1.billno;	    if (dt.value==""){		 alert('Fill bill number ...');		  dt.focus()              return false    }
			  
			  
	
	
	return true }
	
	function phappycode21(thelist){	var idx = thelist.selectedIndex;	var content = thelist.options[idx].innerHTML;document.form1.trandname.value = content;  }
  $(function() {       		   		$(".auto").autocomplete({					             minLength: 0,            source: "search_ledger.php",            			focus: function( event, ui ) {                      return false;               },        		select: function( event, ui ) {              $(this).val( ui.item.desc1 );			  		  			  $( "#consigneeid" ).val( ui.item.value);			  	 document.getElementById('consiggstaa').innerHTML = ui.item.gstin;				 document.getElementById('consigaddr').innerHTML = ui.item.baddress;				 document.getElementById('consigaadhar').innerHTML = ui.item.aadhar;				 															 document.form1.shippname.focus();				 				 				   				   			  			  			                  return false;            }         }		 )	  		$(".autoship").autocomplete({					             minLength: 0,            source: "search_ledger.php",            			focus: function( event, ui ) {                      return false;               },        		select: function( event, ui ) {              $(this).val( ui.item.desc1 );			   			   $( "#shippartyidd" ).val( ui.item.value);			   $( "#placesupply" ).val( ui.item.baddress);			   document.getElementById('shipiggstaa').innerHTML = ui.item.gstin;			   document.getElementById('shipigaddr').innerHTML = ui.item.baddress;			   document.getElementById('shipgaadhar').innerHTML = ui.item.aadhar;				 				 				   				   			                  return false;            }         }		 )	  		$(".autogownnn").autocomplete({					             minLength: 0,            source: "search_godownnn.php",            			focus: function( event, ui ) {                      return false;               },        		select: function( event, ui ) {              $(this).val( ui.item.desc1 );			                  return false;            }         }		 )		 		          .data( "ui-autocomplete" )._renderItem = function( ul, item ) {            return $( "<li>" )            .append( "<a>" + item.label + "</a>" )            .appendTo( ul );         };         });		 		 		 		   $(function() {       		   		$(".auto_stk").autocomplete({					             minLength: 0,            source: "search_stk_item.php",            			focus: function( event, ui ) {                      return false;               },        		select: function( event, ui ) {              $(this).val( ui.item.label );			  			 // alert(ui.item.i_detail);			  			  addRow('dataTable',<?php echo $fid; ?>,ui.item.label,ui.item.value,ui.item.hsn,ui.item.gst,ui.item.i_detail);			  	var b = document.form1.totalcnt.value;	              document.form1[ "bagg" + b ].select();			  			  														                  return false;            }         }		 )	 	 			   		$(".auto_vehicle").autocomplete({					             minLength: 0,            source: "search_vehicle_num.php",            			focus: function( event, ui ) {                      return false;               },        		select: function( event, ui ) {              $(this).val( ui.item.vecname );			 // alert(ui.item.vecname);			   			   $( "#transportname" ).val( ui.item.value);			   $( "#drivernamee" ).val( ui.item.drivername);			   $( "#truckno" ).val( ui.item.vecname);			   			   document.form1.billtyno.focus();			   			   		  //  $companies[] =  array( 'value' => $row['tidd'],'label' => $row['name11'],'drivername' => $row['drbameee'] );			   				   			                  return false;            }         }		 )	 		          .data( "ui-autocomplete" )._renderItem = function( ul, item ) {            return $( "<li>" )            .append( "<a>" + item.label + "</a>" )            .appendTo( ul );         };         });		 		 function myFunction(){var v_cname = document.form1.billno.value;var v_existingbill = document.form1.existingbill.value;if(v_cname != v_existingbill){  f_chkdupbill(v_cname); 	}else{//alert("ready to submit .  normally..");document.getElementById("form1").submit();}	}function f_chkdupbill(str){if (window.XMLHttpRequest)  {// code for IE7+, Firefox, Chrome, Opera, Safari  xmlhttp=new XMLHttpRequest();  }else  {// code for IE6, IE5  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");  }xmlhttp.onreadystatechange=function()  {  if (xmlhttp.readyState==4 && xmlhttp.status==200)    {		var fruits = xmlhttp.responseText;	var val_ret = fruits;		//alert(val_ret);		var val_ret = val_ret.trim();		if(val_ret == "1")	{		alert("Duplicate bill entry , please check again ...");		document.form1.billno.focus();	}		else	{			//	alert("submit inside function ...");		document.getElementById("form1").submit();	}			    }  }xmlhttp.open("GET","chk_dup_billno.php?q="+str,true);xmlhttp.send();}		 
</script>
</head>
<body>

<?php // include('../include/sidemenu.php');?>
<div align="center"><br>
  <h2 align="center"><span style="color:#F17327;">sales invoice form</span> </br>  </h2>    <INPUT  Type="BUTTON" VALUE="HOME" ONCLICK="  window.location.href='../index.php'">  
  <form id="form1" name="form1" method="post"   onSubmit="return ValidateForm()" action="salesinvoice_back_e.php">
  <table  border="1" rules="none" frame="box" cellpadding="6" style="background-color:snow; color:black;font-weight:bold" >
      <tbody >
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Select Suplier</h4></td>
        </tr>			        <tr >          <td colspan = "4" align = "left">Bill No: <input type="text" name="billno"  size = "5"  value = "<?php echo $s_billno  ?>"   />		  Date:<input id="saudadate"   name = "saudadate" onchange = "isDate(this.value)"    value = "<?php echo $s_billdate ?>" type = "text"  size="17"  required = "required" />             <a href="javascript:NewCal('saudadate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date" /></a>			 			 BILL TYPE::<select name="billtype"      style="width:100px">                    <?php if($s_billtype == "1") { ?>                   <option value = "1">GST </option>			       <option value = "2">AADHAR </option>					<?php }   else {?>					 <option value = "2">AADHAR </option>										<option value = "1">GST </option>			      										<?php }  ?>          		  </select> 		   		   		   SELECT BROKER:            <select name="s2"  style="width:150px">			 <option value = "<?php echo $brok_name_id ?>"><?php echo $brok_name_ss ?></option>                       <option value = "0">Select Broker Name</option>                       <?php               				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid   and broker =1");				while($row = mysql_fetch_array($query)){					$brid = $row['legid'];					$brokername = $row['leg_name'];			?>                       <option value = "<?php echo $brid; ?>"> <?php echo $brokername; ?></option>                       <?php } ?>                 				           </select>&nbsp;		   			 			 </td>                     </tr>						<tr >				<td colspan = "4"> <table  border = "1" id = "billingtable">		<tr> <td> CONSIGNEE NAME  </td>  <td> <input type="text"   size = "30" tabIndex = "1"  class='auto' value = "<?php echo $p_name ?>" style="font-weight:bold;font-size:10px"  id="consiname" name = "consiname" ><input type="hidden"   size = "5"  value = "<?php echo $supid_1 ?>"  id="consigneeid" name = "consigneeid" >  </td><td> GST:- </td>  <td> <p id = "consiggstaa"> <?php  echo $party_gst ?>  </p>  </td><td> AADHAR </td>  <td> <p id = "consigaadhar">  </p>  </td><td> BILLING Address </td>  <td> <p id = "consigaddr"> <?php  echo $off_addr1 ?>  </p> </td>		</tr><tr> <td> SHIPPING NAME  </td>  <td> <input type="text"   size = "30" tabIndex = "1" style="font-weight:bold;font-size:10px"  class='autoship' value = "<?php echo $p_name_ss ?>"   id="shippname" name = "shippname" ><input type="hidden"   size = "5" value = "<?php echo $shippid ?>"     id="shippartyidd" name = "shippartyidd" >  </td><td> GST:- </td>  <td> <p id = "shipiggstaa"> <?php  echo $gstin_ss ?> </p>  </td><td> AADHAR </td>  <td> <p id = "shipgaadhar">  </p>  </td><td> SHIPPING Address </td>  <td> <p id = "shipigaddr"> <?php  echo $off_addr1_ss ?> </p> </td>		</tr></table>		</td>					     </tr>		

        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>SALES ORDER DETAILS</h4></td>
        </tr>
				<tr>				<td colspan = "4">  ORDER NO.  AND DATE ::   <input type="text" name="contractnumber" tabIndex = "1"   value = "<?php echo $s_oed_no ?>" id="contractnumber" size="45"/>  		PLACE OF SUPPLY:   <input type="text" name="placesupply" tabIndex = "1"  class='autogownnn'   value = "<?php echo $s_place_suply ?>" id="placesupply" size="45"/>  </td> 				</tr>								<tr>				<td colspan = "4">  Delivery Remark :: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   <input type="text" name="delremarksss" tabIndex = "1"  value = "<?php echo $get_salesa6_rec['delremarksss'] ?>"  id="delremarksss" size="45"/>  		Destination Place: &nbsp&nbsp <input type="text" name="destinationplace" tabIndex = "1"  value = "<?php echo $get_salesa6_rec['destinationplace'] ?>" id="destinationplace" size="45"/>  </td> 				</tr>		
        <tr>
          
<td colspan="4">


<b>SEARCH ITEM : </b>  <input type="text"    tabIndex = "1"   class='auto_stk'   id="stk_item" name = "stk_item" > 
 
 <table width="982" border='1' cellpadding='1'   id="dataTable"   >

  <tr>
   <th>TOTAL</th>       <th>   </th>    <th>   </th>   
   <th> <input  type = "hidden"  size = "3" name = "totbag" id = "totbag" /> </th>
   <th> <input  type = "hidden"  size = "5" name = "totgrsweight" id = "totgrsweight" /> </th>
   <th> <input  type = "hidden"  size = "5" name = "totmandi" id = "totmandi" />  </th>    <th> </th> 
   <th> <input  type = "text"  size = "5" name = "totbilwght" id = "totbilwght" />     </th>   <th> </th> 
   <th> <input  type = "text"  size = "5" name = "totrot" id = "totrot" />  </th>	
   <th> <input  type = "text"  size = "5" name = "totrog" id = "totrog" />  </th>
   <th> <input  type = "text"  size = "5" name = "totvalue" id = "totvalue" />  </th> 
   <th> <input  type = "text"  size = "5" name = "totvto" id = "totvto" />  </th>
    <th> <input  type = "text"  size = "5" name = "totbillv" id = "totbillv" />  </th>
</tr>

<tr>
 

  <th>ITEM NAME</th>   <th>HSN</th>   <th>Detail</th>    <th></th>  <th></th> <th></th> <th> </th> <th>  BILLING WEIGHT </th>	<th> GST(in %) </th>	<th> RATE OF GOODS </th>	<th>VALUE </th>	<th>GST TAX</th>	<th>BILL VALUE</th> <th>REMARK</th>
  
  </tr>
  
 

</table> 


<input  type = "hidden"  size = "5" name = "totalcnt" id = "totalcnt" /> <input  type = "hidden"  size = "5" value = "<?php echo $sales_id ?>" name = "salesiddd" id = "salesiddd" /><input  type = "hidden"  size = "5" value = "<?php echo $s_billno  ?>" name = "existingbill" id = "existingbill" /> 



&nbsp;</td>
		  
		  </tr>
		  

        <tr>

          <td>Payment Terms : -  <input type="text" value = "<?php echo $s_paymentterms ?>"  size = "20" name="paymentterms" id="textfield14" /></td>		            <td>Brokerage Type : -  <select name="brokeragetype"   style="width:150px">                       <option value = "<?php echo $s_brokerage_type ?>"> <?php echo $s_brokerage_type ?> </option>					   <option value = "QTL"> QTL </option>					    <option value = "BAG"> BAG </option>                              </select>		  </td>
        </tr>
        
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>TRANSPORT DETAILS</h4></td>
        </tr>
        <tr>
          <td colspan="4"><table border="1">
            <tbody>
             <tr>               <td colspan="1" > Vehicle Number </td>  <td colspan="2">Transporter Name</td>  <td colspan="2">Driver Name</td>                                <td colspan="2">Date Of Billty:</td>                              </tr>			  
              <tr>			  			  			  <td> <input type="text"   size = "30" tabIndex = "1"  class='auto_vehicle'   id="vehicleiddd" name = "vehicleiddd" > </td>						  
                <td colspan="3"><select name="transportname"    style="width:150px">				    <option value = "<?php  echo $trkid111 ?>"> <?php echo $trans_name_ss ?> </option>
                       <option value = "0"> </option>
                       <?php               
				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid   and transported =1");
				while($row = mysql_fetch_array($query)){
					$trid = $row['legid'];
					$transportname = $row['leg_name'];
			?>
                       <option  value = "<?php echo $trid; ?>" ><?php echo $transportname; ?></option>
                       <?php } ?>
                     
          </select></td>		  		  		  			    <td colspan="2"><input type="text" name="drivernamee"  value = "<?php echo $get_salesa6_rec['drivername'] ?> " id="drivernamee" /></td> 
                
                <td colspan="2"><input id="dstart"   name = "billtydate"  onchange = "isDate(this.value)"  type = "text"  size="17"  value = "<?php echo $s_billtydate ?>"  />  <a href="javascript:NewCal('dstart','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </div>&nbsp;</td>
               
              </tr>
              <tr>	
                <td>Billty No</td>
                <td>Total Freight</td>
                <td>Advance </td>
                <td>Payble</td>
                <td>Truck No.</td>				 <td>ACTUAL AMOUNT</td>				<td>PLUS/MINUS</td>
              </tr>
              <tr>
                <td><input type="text" name="billtyno"  value = "<?php echo $s_billtyno ?>" id="textfield11" /></td>
                <td><input type="text" name="freighttotal" value = "<?php echo $s_freighttotal ?>"  id="textfield13" /></td>
                <td><input type="text" name="freightadv" id="textfield30" value = "<?php echo $s_freightadv ?>" onkeyup = "calcfreight()" /></td>
                <td><input type="text" name="freightpaid"   value = "<?php echo $s_freightpaid ?>"  id="textfield32" /></td>
                <td><input type="text" name="truckno"  id="truckno" value = "<?php echo $s_truckno ?>" id="textfield31" /></td>				   <td><input type="text" name="fr_amountttt"   value = "<?php echo $s_freight_receivable ?>" id="textfield31" /></td>				<td> <select name="freight_type"   style="width:150px">                     <?php if($s_freight_type=="1") { ?>                      					  <option value = "1"> PLUS </option>					    <option value = "2"> MINUS </option>					 <?php }  else { ?>					 					    <option value = "2"> MINUS </option>						  <option value = "1"> PLUS </option>					 					  <?php }   ?>                              </select>  </td>
              </tr>
            </tbody>
          </table> </td>
        </tr>



        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td> <input type="button"  tabIndex = "1"  style = "color:blue; font-weight:bold;height: 25px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;"  onclick="myFunction()" value="SAVE"   />  </td>
          <td>&nbsp;</td>
        </tr>
      </tbody>
    </table>	<?php  while($row13 = mysql_fetch_array($result13))  {   $s_stockid = $row13['stockid'];    $s_stid = $row13['stid'];	  $s_hsn = $row13['hsn'];	    $s_rot = $row13['rot'];		$s_xyz = "xyz";				$s_i_bag = $row13['bag'];		$s_i_g_wt = $row13['grswght'];		$s_i_m_wt = $row13['mandiwght'];		$s_i_b_wt = $row13['billwght'];		$s_i_rate_wt = $row13['rog'];		$s_wt_per_bag = $row13['w_per_bag'];		 ?>	<script language="javascript">addRow_xyz('dataTable',<?php echo $fid; ?>,"<?php echo $s_stockid ?>","<?php echo $s_stid ?>","<?php echo $s_hsn ?>","<?php echo $s_rot ?>","<?php echo $s_xyz ?>","<?php echo $s_i_bag ?>","<?php echo $s_i_g_wt ?>","<?php echo $s_i_m_wt ?>","<?php echo $s_i_b_wt ?>","<?php echo $s_i_rate_wt ?>","<?php echo $s_wt_per_bag ?>");</script><?php } ?>						 					 
</form> 
</div>

</body>
</html>
