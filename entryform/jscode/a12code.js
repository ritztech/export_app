
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
  
  document.form1[ "stkname" + icnt ].value  = content;
  
		
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
	//   sel1.options[0] = new Option('Select An Item', '0');
       cell1.appendChild(sel1);
	   sel1.setAttribute("onchange", "hledger111("+sel1.id+","+rowCount+")");
    	getDistrict1(fid,sel1.id) 
		
		var cell2 = row.insertCell(1);
        var element2 = document.createElement("input");
       element2.type = "text";
		//element2.value = "test";
        element2.name="quantity"+rowCount;
		element2.size="10"
		element2.setAttribute("onkeyup", "itemcalc()");
        cell2.appendChild(element2);
		
	    var cell3 = row.insertCell(2);
        var element3 = document.createElement("input");
       element3.type = "text";
	   element3.size="10"
		//element2.value = "test";
        element3.name="amount"+rowCount;
		element3.setAttribute("onkeyup", "itemcalc()");
        cell3.appendChild(element3);
		
		var cell4 = row.insertCell(3);
        var element4 = document.createElement("input");
       element4.type = "text";
		//element2.value = "test";
        element4.name="rate"+rowCount;
		element4.setAttribute("onkeyup", "itemcalc()");
		element4.size="10"
        cell4.appendChild(element4);
		
		
				var cell5 = row.insertCell(4);
        var element5 = document.createElement("input");
       element5.type = "text";
	   element5.size="15"

        element5.name="remark"+rowCount;

        cell5.appendChild(element5);
		
				        var cell11 = row.insertCell(5);
        var element11 = document.createElement("input");
       element11.type = "hidden";
		//element2.value = "test";
		element11.size="20"
        element11.name="stkname"+rowCount;
        cell11.appendChild(element11);
		
		
				
		
		document.form1.totalcnt.value = rowCount;
	

		
		
		
	}
		
function itemcalc() {

var qtotal = 0;
var amtotal = 0;
var ratetotal = 0;



var j = document.form1.totalcnt.value;
for (var i=2; i<=j; i++)
  {

  var qty = eval("document.form1.quantity"+i+".value");
  qtotal = Number(qtotal) + Number(qty);
 document.form1.qtotal.value = qtotal;


    var amount = eval("document.form1.amount"+i+".value");
  amtotal = Number(amtotal) + Number(amount);
 document.form1.amtotal.value = amtotal;
 
 


   var rate = eval("document.form1.rate"+i+".value");
  itvalue = Number (amount) / Number (qty);
  document.form1[ "rate" + i ].value = itvalue;
  

 var rate = eval("document.form1.rate"+i+".value");
  ratetotal = Number(ratetotal) + Number(rate);
 document.form1.ratetotal.value = ratetotal;


 

 
 
  
  
  
  
  
}

}
