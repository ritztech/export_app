
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
	var strURL="get_journal_rec.php?province="+provinceId;
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


function getDistrict12(provinceId,id1) {		
	var strURL="get_journal_rec1.php?province="+provinceId;
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
  
  document.form1[ "debitname" + icnt ].value  = content;
  
		
}

 function hledger112(thelist,icnt) {

	
	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;
	
//	alert(content);
  

//  document.form1.valuetaxout.icnt.value = content;
  
  document.form1[ "creditname" + icnt ].value  = content;
  
		
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
		sel1.setAttribute("onchange", "hledger111("+sel1.id+","+rowCount+")");
    	getDistrict1(fid,sel1.id) 
		
		var cell2 = row.insertCell(1);
        var element2 = document.createElement("input");
       element2.type = "text";
		//element2.value = "test";
        element2.name="debitval"+rowCount;
		element2.size="5"
		element2.setAttribute("onkeyup", "itemcalc()");
        cell2.appendChild(element2);
		
	    var cell3 = row.insertCell(2);
        var element3 = document.createElement("input");
       element3.type = "text";
	   element3.size="40"
		//element2.value = "test";
        element3.name="debitnarration"+rowCount;
        cell3.appendChild(element3);
		
		var cell1 = row.insertCell(3);
        var sel1 = document.createElement("select");
       sel1.type = "text";
	   sel1.name = 'debitid'+rowCount;
       sel1.id='debitid'+rowCount ;
	   sel1.setAttribute("onchange", "hledger112("+sel1.id+","+rowCount+")");
	//  sel1.options[0] = new Option('Select An Item', '0');
        cell1.appendChild(sel1);
    	getDistrict12(fid,sel1.id) 
		
		
		
				var cell5 = row.insertCell(4);
        var element5 = document.createElement("input");
       element5.type = "text";
	   element5.size="5"
		//element2.value = "test";
        element5.name="creditval"+rowCount;
		element5.setAttribute("onkeyup", "itemcalc()");
        cell5.appendChild(element5);
		
				var cell6 = row.insertCell(5);
        var element6 = document.createElement("input");
       element6.type = "text";
		//element2.value = "test";
        element6.name="creditnarration"+rowCount;
		element6.size="40"
        cell6.appendChild(element6);
		
		
				var cell7 = row.insertCell(6);
        var element7 = document.createElement("input");
       element7.type = "hidden";
		//element2.value = "test";
		element7.size="15"
        element7.name="debitname"+rowCount;

        cell7.appendChild(element7);
		
				var cell8 = row.insertCell(7);
        var element8 = document.createElement("input");
       element8.type = "hidden";
		//element2.value = "test";
        element8.name="creditname"+rowCount;
			element8.size="15"
        cell8.appendChild(element8);
		
		
				
		
		document.form1.totalcnt.value = rowCount;
	
		
		
		
	}
		
function itemcalc() {
	

var debitvalue = 0;
var creditvalue = 0;

var j = document.form1.totalcnt.value;
for (var i=2; i<=j; i++)
  {

  var bag = eval("document.form1.debitval"+i+".value");
  debitvalue = Number(debitvalue) + Number(bag);
 document.form1.debitvalue.value = debitvalue;

  var grswght = eval("document.form1.creditval"+i+".value");
  creditvalue = Number(creditvalue) + Number(grswght);
  document.form1.creditvalue.value = creditvalue;
  
    
  
  
}

}
