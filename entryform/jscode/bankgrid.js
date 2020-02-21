
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
	var strURL="get_bank.php?province="+provinceId;
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



   function addRow(tableID,fid)
    {
		
       var table = document.getElementById(tableID);
	   var rowCount = table.rows.length;
       var row = table.insertRow(rowCount);
		

		
	   var cell1 = row.insertCell(0);
        var sel1 = document.createElement("select");
       sel1.type = "text";
	   sel1.name = 'bname'+rowCount;
       sel1.id='item'+rowCount ;
	    cell1.appendChild(sel1);
    	getDistrict1(fid,sel1.id) 
		
		

		
		
	    var cell3 = row.insertCell(1);
        var element3 = document.createElement("input");
       element3.type = "text";
	   element3.size="20"
		//element2.value = "test";
        element3.name="bbranch"+rowCount;
		element3.setAttribute("onkeyup", "itemcalc()");
        cell3.appendChild(element3);
		
		var cell4 = row.insertCell(2);
        var element4 = document.createElement("input");
       element4.type = "text";
		//element2.value = "test";
        element4.name="chkno"+rowCount;
		element4.setAttribute("onkeyup", "itemcalc()");
		element4.size="8"
        cell4.appendChild(element4);
		
		
				var cell5 = row.insertCell(3);
        var element5 = document.createElement("input");
       element5.type = "text";
	   element5.size="6"
        element5.name="amount"+rowCount;
		element5.setAttribute("onkeyup", "itemcalc()");
		

        cell5.appendChild(element5);
		
        var cell6 = row.insertCell(4);
        var element6 = document.createElement("input");
       element6.type = "text";
	   element6.size="4"
        element6.name="bcharges"+rowCount;
		element6.setAttribute("onkeyup", "itemcalc()");
        cell6.appendChild(element6);
		
		        var cell6 = row.insertCell(5);
        var element6 = document.createElement("input");
       element6.type = "text";
	   element6.size="6"
        element6.name="btotal"+rowCount;
		element6.setAttribute("onkeyup", "itemcalc()");
        cell6.appendChild(element6);
		
		        var cell6 = row.insertCell(6);
        var element6 = document.createElement("input");
       element6.type = "text";
	   element6.size="8"
        element6.name="modepay"+rowCount;
        cell6.appendChild(element6);
		
				        var cell6 = row.insertCell(7);
        var element6 = document.createElement("input");
       element6.type = "text";
	   element6.size="20"
        element6.name="bremark"+rowCount;
        cell6.appendChild(element6);
		
		
				
		
		document.form1.totalcnt.value = rowCount;
	
		
		
		
	}
		
function itemcalc() {

var tamount = 0;
var tbcharges = 0;
var tbtotal = 0;



var j = document.form1.totalcnt.value;
for (var i=2; i<=j; i++)
  {

  var amount = eval("document.form1.amount"+i+".value");
  tamount = Number(tamount) + Number(amount);
 document.form1.tamount.value = tamount;


    var bcharges = eval("document.form1.bcharges"+i+".value");
  tbcharges = Number(tbcharges) + Number(bcharges);
 document.form1.tbcharges.value = tbcharges;
 
 
    var rate = eval("document.form1.btotal"+i+".value");
  itvalue = Number (amount) + Number (bcharges);
  document.form1[ "btotal" + i ].value = itvalue;
  
 
   var btotal = eval("document.form1.btotal"+i+".value");
  tbtotal = Number(tbtotal) + Number(btotal);
 document.form1.tbtotal.value = tbtotal;
 
 
  
  
}

}
