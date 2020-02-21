
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
	var strURL="get_stock_item.php?province="+provinceId;
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
  
  document.form1[ "yieldname" + icnt ].value  = content;
  
		
}








   function addRow(tableID,fid)
    {
		
				
       var table = document.getElementById(tableID);
	   var rowCount = table.rows.length;
       var row = table.insertRow(rowCount);
		
		var cell1 = row.insertCell(0);
        var sel1 = document.createElement("select");
       sel1.type = "text";
	   sel1.name = 'item'+rowCount;
       sel1.id='item'+rowCount ;
	//  sel1.options[0] = new Option('Select An Item', '0');
        cell1.appendChild(sel1);
		sel1.tabIndex = "3";
		sel1.setAttribute("onchange", "hledger111("+sel1.id+","+rowCount+")");
    	getDistrict1(fid,sel1.id) 
		
		var cell2 = row.insertCell(1);
        var element2 = document.createElement("input");
       element2.type = "text";
		//element2.value = "test";
		element2.tabIndex = "3";
        element2.name="perct"+rowCount;
		element2.size="5"
        cell2.appendChild(element2);
		
				var cell2 = row.insertCell(2);
        var element2 = document.createElement("input");
       element2.type = "hidden";
		//element2.value = "test";
        element2.name="yieldname"+rowCount;
		element2.size="5"
        cell2.appendChild(element2);
		
	 	
				
		
		document.form1.totalcnt.value = rowCount;
	
		
		
		
	}
		
