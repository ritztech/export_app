
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
	

function getDistrict1(provinceId,id1) {	
//alert(provinceId);	
	var strURL="get_stock_item_1.php?province="+provinceId;
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

 function hledger112(thelist,icnt) {

	
	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;
	
//	alert(content);

	var arfruits = content.split('***');
	
	

	  document.form1[ "stkname" + icnt ].value  =arfruits[0];
	    document.form1[ "perct" + icnt ].value  = arfruits[1];
		
		
		var outqty =  document.form1.outqty.value;
		
		var n_qty = outqty*arfruits[1]/100;
		
		
		document.form1[ "bagg" + icnt ].value  = n_qty.toFixed(2);;
		
  

//  document.form1.valuetaxout.icnt.value = content;
  
//  document.form1[ "stkname" + icnt ].value  = content;
shortaccess1();
  
		
}


   function addRow(tableID,fid)
    {
		
       var table = document.getElementById(tableID);
	   var rowCount = table.rows.length;
       var row = table.insertRow(rowCount);
	   
	 var stk_item1 =  document.form1.stockitem.value;
	 
	// alert(stk_item1);
		
		var cell1 = row.insertCell(0);
        var sel1 = document.createElement("select");
       sel1.type = "text";
	   sel1.name = 'item'+rowCount;
       sel1.id='item'+rowCount ;
       cell1.appendChild(sel1);
	   sel1.setAttribute("onchange", "hledger112("+sel1.id+","+rowCount+")");
    	getDistrict1(stk_item1,sel1.id) 
		
		var cell2 = row.insertCell(1);
        var element2 = document.createElement("input");
       element2.type = "text";
		//element2.value = "test";
        element2.name="bagg"+rowCount;
		element2.size="8"
		element2.setAttribute("onkeyup", "shortaccess1()");
        cell2.appendChild(element2);
		
	    var cell3 = row.insertCell(2);
        var element3 = document.createElement("input");
       element3.type = "text";
	   element3.size="5"
		//element2.value = "test";
        element3.name="grsweight"+rowCount;
		//element3.setAttribute("onkeyup", "itemcalc()");
        cell3.appendChild(element3);
		
		
		var cell11 = row.insertCell(3);
        var element11 = document.createElement("input");
       element11.type = "text";
		//element2.value = "test";
		element11.size="20"
        element11.name="perct"+rowCount;
        cell11.appendChild(element11);
		
		
		var cell11 = row.insertCell(4);
        var element11 = document.createElement("input");
       element11.type = "hidden";
		//element2.value = "test";
		element11.size="20"
        element11.name="stkname"+rowCount;
        cell11.appendChild(element11);
		
		document.form1.totalcnt.value = rowCount;
	
			
		
		
	}
		
