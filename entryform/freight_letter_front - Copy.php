<?php

include("../conf.php");

?>
<?php
session_start();
if(!isset($_SESSION['uname'])) {echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";}

$fid=$_SESSION['fid'];$getbill = mysql_query("SELECT `sellid`  FROM `m_autoid` WHERE fid = $fid");$getbill_1 = mysql_fetch_array($getbill);$n_bill_1 = $getbill_1['0'];
?>
<?php
$query_dispMake="SELECT legid,concat(leg_name,'-',off_city,'-',fact_state) as suppliername  FROM ledger_master where fid=$fid";
$result_dispMake=mysql_query($query_dispMake);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>RITZ</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="..//style.css" rel="stylesheet" type="text/css" />    <link href="js/jquery-ui.css" rel="stylesheet">      <script src="js/jquery-1.10.2.js"></script>      <script src="js/jquery-ui.js"></script>	  
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/a4code.js">  </script>	  	   

<script language="javascript">function calcfreight(){	var v_f1 = 	document.form1.freighttotal.value;var v_f2 = 	document.form1.freightadv.value;var v_f3 = v_f1 - v_f2;document.form1.freightpaid.value = v_f3;	}
function hledger(thelist,theinput) {
	
	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;
  
  document.form1.ledgername_n.value = content;
  
		
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

document.form1.soid.value = str;

    }
  }
xmlhttp.open("GET","get_sales_invoice_detail_a6.php?q="+str,true);
xmlhttp.send();



}


function h456() {

    document.form1.partyname.value = document.form1.keyword.value;
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
	
	function phappycode21(thelist){	var idx = thelist.selectedIndex;	var content = thelist.options[idx].innerHTML;document.form1.trandname.value = content;  }		 function h123(str){document.form1.province.value = str;	getDistrict(str);phappycode1(str);//h456();		 		 }
  $(function() {       		   		$(".auto").autocomplete({					             minLength: 0,            source: "search_ledger.php",            			focus: function( event, ui ) {                      return false;               },        		select: function( event, ui ) {              $(this).val( ui.item.desc1 );			 //  $( "#custid" ).val( ui.item.value);			   h123(ui.item.value)			  			                  return false;            }         }		 )		 		          .data( "ui-autocomplete" )._renderItem = function( ul, item ) {            return $( "<li>" )            .append( "<a>" + item.label + "</a>" )            .appendTo( ul );         };         });		 
</script>
</head>
<body>

<?php // include('../include/sidemenu.php');?>
<div align="center"><br>
  <h2 align="center"><span style="color:#F17327;">FREIGHT LETTER FORM</span> </br>  </h2>    <INPUT  Type="BUTTON" VALUE="HOME" ONCLICK="  window.location.href='../index.php'">  
  <form id="form1" name="form1" method="post"   onSubmit="return ValidateForm()" action="freight_letter_back.php">
  <table  border="1" cellpadding="6" style="color:black; font-weight:bold;">
 		<tr>				<td colspan = "4"> <table width="100%"><tr>          <td width="43%">		  		  &#2325;&#2381;&#2352;&#2350;&#2366;&#2306;&#2325;.......		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		  <input type="text" name="sno"  /></td>                   <td width="32%" align="center"><p>&#2342;&#2367;&#2344;&#2366;&#2306;&#2325;........		  <input id="t_date"   name = "t_date" onchange = "isDate(this.value)"   type = "text"   required = "required" />             </p>            </td>          </tr>        <tr>          <td colspan="2"><p>&#2350;&#2375;&#2360;&#2352;&#2381;&#2360; .....		  <input type="text"   size = "75"   autofocus      tabIndex = "1"  class='auto'  > 		  		  <input type="hidden" name="suppid" id="suppid" size="5" /> </p>            </td>          </tr>        <tr>          <td colspan="2"><p><br /> <br>            &#2358;&#2381;&#2352;&#2368;&#2350;&#2366;&#2344; &#2332;&#2368; &#2310;&#2332; &#2342;&#2367;&#2344;&#2366;&#2306;&#2325;						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;			Date:<input id="p_date"   name = "p_date" onchange = "isDate(this.value)"   type = "text"  size="17"  required = "required" /><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;			&#2325;&#2379; &#2310;&#2346;&#2325;&#2375; &#2342;&#2354;&#2366;&#2354; &#2358;&#2381;&#2352;&#2368; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;									Broker Name: <select style="width:150px" name="broker" id="broker">                       <option value = "0">Select Broker Name</option>                       <?php               				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid  and broker =1");				while($row = mysql_fetch_array($query)){					$brid = $row['legid'];					$brokername = $row['leg_name'];			?>                       <option value = "<?php echo $brid; ?>"> <?php echo $brokername; ?></option>                       <?php } ?>                               </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		  &#2325;&#2375; &#2325;&#2361;&#2375; &#2350;&#2369;&#2340;&#2366;&#2348;&#2367;&#2325; &#2332;&#2367;&#2344;&#2381;&#2360; 		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		  <input type="text" name="jins" />		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		  &#2335;&#2381;&#2352;&#2325; &#2325;&#2381;&#2352;&#2350;&#2366;&#2306;&#2325;		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		  <input type="text" name="truckno"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		 &#2342;&#2351;&#2366;&#2352;&#2366;  		  		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="qty" />		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		  		  &#2348;&#2379;&#2352;&#2366; &#2349;&#2375;&#2332; &#2352;&#2361;&#2375; &#2361;&#2375; | &#2335;&#2381;&#2352;&#2325; &#2349;&#2366;&#2396;&#2366;		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		  <input type="text" name="truck_fare" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		 &#2352;&#2370;&#2346;&#2351;&#2375; &#2361;&#2375;| &#2332;&#2367;&#2360;&#2350;&#2375; &#2319;&#2337;&#2357;&#2366;&#2306;&#2360;		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		  <input type="text" name="advance"/>		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		  &#2358;&#2375;&#2359;		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		  		  <input type="text" name="balance"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		  (&#2358;&#2348;&#2381;&#2342;&#2379;&#2306; &#2350;&#2375;&#2306;)		  		  .........................................................................&#2342;&#2375;&#2344;&#2366; &#2332;&#2368; &#2324;&#2352; &#2350;&#2366;&#2354; &#2325;&#2368; &#2346;&#2366;&#2357;&#2340;&#2368; &#2337;&#2366;&#2325; &#2342;&#2381;&#2357;&#2366;&#2352;&#2366; &#2349;&#2375;&#2332; &#2342;&#2375;&#2344;&#2366; &#2332;&#2368; | &#2348;&#2367;&#2354; &#2325;&#2375; &#2352;&#2369;&#2346;&#2351;&#2366; A/c. No. &nbsp;50008266846 RTGS&nbsp; No.  Alla0210444 &#2311;&#2354;&#2366;&#2361;&#2366;&#2348;&#2366;&#2342; &#2348;&#2376;&#2306;&#2325; &#2335;&#2368;&#2325;&#2350;&#2327;&#2397; &#2350;&#2375;&#2306; RTGS  /NEFT &#2342;&#2381;&#2357;&#2366;&#2352;&#2366;  &#2340;&#2369;&#2352;&#2344;&#2381;&#2340; &#2340;&#2368;&#2344; &#2342;&#2367;&#2344; &#2350;&#2375;&#2306; &#2349;&#2375;&#2332;&#2375; | &#2360;&#2366;&#2341; &#2350;&#2375;&#2306; &ldquo;C&rdquo; &#2347;&#2366;&#2352;&#2381;&#2350; &#2319;&#2357;&#2306; &#2337;&#2367;&#2325;&#2381;&#2354;&#2375;&#2352;&#2375;&#2358;&#2344;  &#2309;&#2357;&#2358;&#2381;&#2351; &#2349;&#2375;&#2332;&#2375; | &#2347;&#2366;&#2352;&#2381;&#2350; &ldquo;C&rdquo; &#2344;&#2361;&#2368;&#2306; &#2349;&#2375;&#2332;&#2344;&#2375; &#2325;&#2368; &#2360;&#2381;&#2341;&#2367;&#2340;&#2367; &#2350;&#2375;&#2306;  10 &#2346;&#2381;&#2352;&#2340;&#2367;&#2358;&#2340; &#2335;&#2376;&#2325;&#2381;&#2360; &#2342;&#2375;&#2344;&#2366; &#2361;&#2379;&#2327;&#2366; |<br /><br />		  &#2360;&#2306;&#2354;&#2327;&#2381;&#2344; &#2346;&#2381;&#2352;&#2340;&#2367; <br />		  		  		  <table>		  <tr><td>&#2348;&#2367;&#2354; &#2344;&#2306;&#2348;&#2352; </td><td> <input type="text" name="billno" size="75"/></td></tr>		   <tr><td>&#2348;&#2367;&#2354;&#2381;&#2335;&#2368; &#2344;&#2306;&#2348;&#2352; </td><td> <input type="text" name="billtyno" size="75"/></td></tr>		    <tr><td>&#2348;&#2368;&#2350;&#2366; &#2337;&#2367;&#2325;&#2381;&#2354;&#2375;&#2352;&#2375;&#2358;&#2344; &#2344;&#2306;&#2348;&#2352;</td><td> 			<input type="text" name="beema_dec" size="75" /></td></tr>		  </table>		  		  <br />		  &#2343;&#2344;&#2381;&#2351;&#2357;&#2366;&#2342; <br /><br />		  </p>            <p align="right">&#2357;&#2366;&#2360;&#2381;&#2340;&#2375; &#2346;&#2381;&#2352;&#2375;&#2352;&#2339;&#2366; &#2398;&#2370;&#2337;  &#2346;&#2381;&#2352;&#2379;&#2360;&#2375;&#2360;&#2367;&#2306;&#2327;</p>              </td>          </tr></table>		</td> 				</tr>
       
        <tr>
          <td colspan="4" align="center"><input type="submit" name="s" id="submit" value="Submit Record" /></td>
         
        </tr>
 
    </table>		<input type="hidden" name="trandname"  value = "None" />					 <input type="hidden" name="province"   value = "0" />					 
</form> 
</div>

</body>
</html>
  <link rel="stylesheet" href="date_picker/jquery-ui.css">    <script src="date_picker/jquery-1.12.4.js"></script>  <script src="date_picker/jquery-ui.js"></script>  <script>  $( function() {    $( "#t_date" ).datepicker();	 $( "#p_date" ).datepicker();  } );  </script>