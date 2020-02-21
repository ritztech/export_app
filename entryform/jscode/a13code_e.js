
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
	

function getDistrict2(provinceId1,id2) {		
	var strURL="get_suppliername.php?province="+provinceId1;
	var req = getXMLHTTP();
	if (req) {
		req.onreadystatechange = function() 
		{
			if (req.readyState == 4) {
			// only if "OK"
				if (req.status == 200) {	
				
				
				    // alert(req.responseText);
				
					document.getElementById(id2).innerHTML=req.responseText;
					//document.getElementById('communediv').innerHTML=req.responseText;					
				} else {
					alert("Problem while using XMLHTTP:\n" + req.statusText);
				}
			}				
		}			
		req.open("GET", strURL, true);
		req.send(null);
	}		
}


function getDistrict2_1(provinceId1,suppid_11,id2) {
	

	
		var str_321 = provinceId1+','+suppid_11;
		
		//alert(str_321);
		
	
	var strURL="get_suppliername_e.php?province="+str_321;
	var req = getXMLHTTP();
	if (req) {
		req.onreadystatechange = function() 
		{
			if (req.readyState == 4) {
			// only if "OK"
				if (req.status == 200) {	
				
				
				    // alert(req.responseText);
				
					document.getElementById(id2).innerHTML=req.responseText;
					//document.getElementById('communediv').innerHTML=req.responseText;					
				} else {
					alert("Problem while using XMLHTTP:\n" + req.statusText);
				}
			}				
		}			
		req.open("GET", strURL, true);
		req.send(null);
	}		
}



function getDistrict1(provinceId,id1) {		
	var strURL="a13get_stock_item.php?province="+provinceId;
	var req = getXMLHTTP();
	if (req) {
		req.onreadystatechange = function() 
		{
			if (req.readyState == 4) {
			// only if "OK"
				if (req.status == 200) {	
				
				
				    // alert(req.responseText);
				
					document.getElementById(id1).innerHTML=req.responseText;
					//document.getElementById('communediv').innerHTML=req.responseText;					
				} else {
					alert("Problem while using XMLHTTP:\n" + req.statusText);
				}
			}				
		}			
		req.open("GET", strURL, true);
		req.send(null);
	}		
}



function getDistrict_1(provinceId,stkid_111,id1) {	

	var str_321 = provinceId+','+stkid_111;
	
	//alert(str_321);
	
	var strURL="a13get_stock_item_e.php?province="+str_321;
	var req = getXMLHTTP();
	if (req) {
		req.onreadystatechange = function() 
		{
			if (req.readyState == 4) {
			// only if "OK"
				if (req.status == 200) {	
				
				
				    // alert(req.responseText);
				
					document.getElementById(id1).innerHTML=req.responseText;
					//document.getElementById('communediv').innerHTML=req.responseText;					
				} else {
					alert("Problem while using XMLHTTP:\n" + req.statusText);
				}
			}				
		}			
		req.open("GET", strURL, true);
		req.send(null);
	}		
}



 function hledger111(thelist,icnt) {

	
	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;
	
//	alert(content);
  

//  document.form1.valuetaxout.icnt.value = content;
  
  document.form1[ "stkname" + icnt ].value  = content;
  
		
}



   function addRow(tableID,fid)
    {
		
       var table = document.getElementById(tableID);
	   var rowCount = table.rows.length;
       var row = table.insertRow(rowCount);
		
		var cell2 = row.insertCell(0);
        var sel2 = document.createElement("select");
        sel2.type = "text";
		sel2.name='suppliername'+rowCount ;
		sel2.id='suppliername'+rowCount ;
		cell2.appendChild(sel2);
		getDistrict2(fid,sel2.id)
		
		
		var cell1 = row.insertCell(1);
        var sel1 = document.createElement("select");
       sel1.type = "text";
	   sel1.name = 'item'+rowCount;
       sel1.id='item'+rowCount ;
	   cell1.appendChild(sel1);
	   	   sel1.setAttribute("onchange", "hledger111("+sel1.id+","+rowCount+")");
       getDistrict1(fid,sel1.id) 
		
		
	    var cell3 = row.insertCell(2);
        var element3 = document.createElement("input");
       element3.type = "text";
	   element3.size="10"
		//element2.value = "test";
        element3.name="msamiti"+rowCount;
		//element3.setAttribute("onkeyup", "itemcalc()");
        cell3.appendChild(element3);
		
		var cell4 = row.insertCell(3);
        var element4 = document.createElement("input");
       element4.type = "text";
		//element2.value = "test";
        element4.name="gatepassno"+rowCount;
		//element4.setAttribute("onkeyup", "itemcalc()");
		element4.size="10"
        cell4.appendChild(element4);
		
		
				var cell5 = row.insertCell(4);
        var element5 = document.createElement("input");
       element5.type = "text";
	   element5.size="10"
		//element2.value = "test";
        element5.name="bagqty"+rowCount;
		element5.setAttribute("onkeyup", "itemcalc()");
        cell5.appendChild(element5);
		
				var cell6 = row.insertCell(5);
        var element6 = document.createElement("input");
       element6.type = "text";
		//element2.value = "test";
        element6.name="valueqty"+rowCount;
		element6.setAttribute("onkeyup", "itemcalc()");
		element6.size="10"
        cell6.appendChild(element6);
		
		
				var cell7 = row.insertCell(6);
        var element7 = document.createElement("input");
       element7.type = "text";
		//element2.value = "test";
		element7.size="10"
        element7.name="goodsvalue"+rowCount;
		element7.setAttribute("onkeyup", "itemcalc()");
        cell7.appendChild(element7);
		

		
		
				var cell9 = row.insertCell(7);
        var element9 = document.createElement("input");
       element9.type = "text";
		//element2.value = "test";
		element9.size="10"
		element9.value="DD/MM/YYYY"
        element9.name="inwarddate"+rowCount;
		//element9.setAttribute("onkeyup", "itemcalc()");
        cell9.appendChild(element9);
		
		
				var cell10 = row.insertCell(8);
        var element10 = document.createElement("input");
       element10.type = "text";
		//element2.value = "test";
		element10.size="10"
        element10.name="remark"+rowCount;
		//element10.setAttribute("onkeyup", "itemcalc()");
        cell10.appendChild(element10);
		document.form1.totalcnt.value = rowCount;
		
				        var cell11 = row.insertCell(9);
        var element11 = document.createElement("input");
       element11.type = "hidden";
		//element2.value = "test";
		element11.size="20"
        element11.name="stkname"+rowCount;
        cell11.appendChild(element11);
		
	}


   function addRow_u(tableID,fid,stkid_1,suppid_1,samit_u,gate_u,bagqty_u,valuqty_u,good_u,indate_u,remark_u)
    {
		
		
       var table = document.getElementById(tableID);
	   var rowCount = table.rows.length;
       var row = table.insertRow(rowCount);
		
		var cell2 = row.insertCell(0);
        var sel2 = document.createElement("select");
        sel2.type = "text";
		sel2.name='suppliername'+rowCount ;
		sel2.id='suppliername'+rowCount ;
		cell2.appendChild(sel2);
		getDistrict2_1(fid,suppid_1,sel2.id)
		
		
		var cell1 = row.insertCell(1);
        var sel1 = document.createElement("select");
       sel1.type = "text";
	   sel1.name = 'item'+rowCount;
       sel1.id='item'+rowCount ;
	   cell1.appendChild(sel1);
	   	   sel1.setAttribute("onchange", "hledger111("+sel1.id+","+rowCount+")");
       getDistrict_1(fid,stkid_1,sel1.id) 
		
		
	    var cell3 = row.insertCell(2);
        var element3 = document.createElement("input");
       element3.type = "text";
	   element3.size="10"
		element3.value = samit_u;
        element3.name="msamiti"+rowCount;
		//element3.setAttribute("onkeyup", "itemcalc()");
        cell3.appendChild(element3);
		
		var cell4 = row.insertCell(3);
        var element4 = document.createElement("input");
       element4.type = "text";
		element4.value = gate_u;
        element4.name="gatepassno"+rowCount;
		//element4.setAttribute("onkeyup", "itemcalc()");
		element4.size="10"
        cell4.appendChild(element4);
		
		
				var cell5 = row.insertCell(4);
        var element5 = document.createElement("input");
       element5.type = "text";
	   element5.size="10"
		element5.value = bagqty_u;
        element5.name="bagqty"+rowCount;
		element5.setAttribute("onkeyup", "itemcalc()");
        cell5.appendChild(element5);
		
				var cell6 = row.insertCell(5);
        var element6 = document.createElement("input");
       element6.type = "text";
		element6.value = valuqty_u;
        element6.name="valueqty"+rowCount;
		element6.setAttribute("onkeyup", "itemcalc()");
		element6.size="10"
        cell6.appendChild(element6);
		
		
				var cell7 = row.insertCell(6);
        var element7 = document.createElement("input");
       element7.type = "text";
		element7.value = good_u;
		element7.size="10"
        element7.name="goodsvalue"+rowCount;
		element7.setAttribute("onkeyup", "itemcalc()");
        cell7.appendChild(element7);
		

		
		
				var cell9 = row.insertCell(7);
        var element9 = document.createElement("input");
       element9.type = "text";
		element9.value = indate_u;
		element9.size="10"
		//element9.value="DD/MM/YYYY"
        element9.name="inwarddate"+rowCount;
		//element9.setAttribute("onkeyup", "itemcalc()");
        cell9.appendChild(element9);
		
		
				var cell10 = row.insertCell(8);
        var element10 = document.createElement("input");
       element10.type = "text";
		element10.value = remark_u;
		element10.size="10"
        element10.name="remark"+rowCount;
		//element10.setAttribute("onkeyup", "itemcalc()");
        cell10.appendChild(element10);
		document.form1.totalcnt.value = rowCount;
		
				        var cell11 = row.insertCell(9);
        var element11 = document.createElement("input");
       element11.type = "hidden";
		//element2.value = "test";
		element11.size="20"
        element11.name="stkname"+rowCount;
        cell11.appendChild(element11);
		
	}


	

	
	function itemcalc() {
		

var totbilwght = 0;
var totrot = 0;
var totrog = 0;



var j = document.form1.totalcnt.value;
for (var i=2; i<=j; i++)
  {

  var bagqty = eval("document.form1.bagqty"+i+".value");
  totbilwght = Number(totbilwght) + Number(bagqty);
 document.form1.totbilwght.value = totbilwght;
 
   var valueqty = eval("document.form1.valueqty"+i+".value");
  totrot = Number(totrot) + Number(valueqty);
 document.form1.totrot.value = totrot;
 
   var goodsvalue = eval("document.form1.goodsvalue"+i+".value");
  totrog = Number(totrog) + Number(goodsvalue);
 document.form1.totrog.value = totrog;
 
 
  
}

}


		
