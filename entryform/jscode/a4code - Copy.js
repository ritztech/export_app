
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
        element2.name="bagg"+rowCount;
		element2.size="4"
		element2.setAttribute("onkeyup", "itemcalc()");
        cell2.appendChild(element2);
		
				var cell2 = row.insertCell(2);
        var element2 = document.createElement("input");
       element2.type = "text";
		//element2.value = "test";
        element2.name="w_per_bag"+rowCount;
		element2.size="4"
		element2.setAttribute("onkeyup", "w_p_b_q()");
        cell2.appendChild(element2);
		
		
		
	    var cell3 = row.insertCell(3);
        var element3 = document.createElement("input");
       element3.type = "text";
	   element3.size="5"
		//element2.value = "test";
        element3.name="grsweight"+rowCount;
		element3.setAttribute("onkeyup", "itemcalc()");
        cell3.appendChild(element3);
		
		var cell4 = row.insertCell(4);
        var element4 = document.createElement("input");
       element4.type = "text";
		//element2.value = "test";
        element4.name="mandiwght"+rowCount;
		element4.setAttribute("onkeyup", "itemcalc()");
		element4.size="5"
        cell4.appendChild(element4);
		
		
				var cell5 = row.insertCell(5);
        var element5 = document.createElement("input");
       element5.type = "text";
	   element5.size="5"
		//element2.value = "test";
        element5.name="billwght"+rowCount;
		element5.setAttribute("onkeyup", "itemcalc()");
        cell5.appendChild(element5);
		
				var cell6 = row.insertCell(6);
        var element6 = document.createElement("input");
       element6.type = "text";
		//element2.value = "test";
        element6.name="rattax"+rowCount;
		element6.setAttribute("onkeyup", "itemcalc()");
		element6.size="5"
        cell6.appendChild(element6);
		
		
				var cell7 = row.insertCell(7);
        var element7 = document.createElement("input");
       element7.type = "text";
		//element2.value = "test";
		element7.size="5"
        element7.name="ratgoods"+rowCount;
		element7.setAttribute("onkeyup", "itemcalc()");
        cell7.appendChild(element7);
		
				var cell8 = row.insertCell(8);
        var element8 = document.createElement("input");
       element8.type = "text";
		//element2.value = "test";
        element8.name="itvalue"+rowCount;
		element8.setAttribute("onkeyup", "itemcalc()");
		element8.size="5"
        cell8.appendChild(element8);
		
		
				var cell9 = row.insertCell(9);
        var element9 = document.createElement("input");
       element9.type = "text";
		//element2.value = "test";
		element9.size="5"
        element9.name="valuetaxout"+rowCount;
		element9.setAttribute("onkeyup", "itemcalc()");
        cell9.appendChild(element9);
		
		
				var cell10 = row.insertCell(10);
        var element10 = document.createElement("input");
       element10.type = "text";
		//element2.value = "test";
		element10.size="5"
        element10.name="billvalue"+rowCount;
		element10.setAttribute("onkeyup", "itemcalc()");
        cell10.appendChild(element10);
		
        var cell11 = row.insertCell(11);
        var element11 = document.createElement("input");
       element11.type = "text";
		//element2.value = "test";
		element11.size="20"
        element11.name="remark"+rowCount;
        cell11.appendChild(element11);
		
		        var cell11 = row.insertCell(12);
        var element11 = document.createElement("input");
       element11.type = "hidden";
		//element2.value = "test";
		element11.size="20"
        element11.name="stkname"+rowCount;
        cell11.appendChild(element11);
		
		
		document.form1.totalcnt.value = rowCount;
	
		
		
		
	}
	
	
function w_p_b_q()
{
	

var jkl = document.form1.totalcnt.value;
for (var r=2; r<=jkl; r++)
  {

	var w_per_bag = eval("document.form1.w_per_bag"+r+".value");	  

  var bag = eval("document.form1.bagg"+r+".value");
  
  
  var t_weight_1 = w_per_bag*bag;
  

  
  document.form1[ "grsweight" + r ].value = t_weight_1;
    document.form1[ "mandiwght" + r ].value = t_weight_1;
	  document.form1[ "billwght" + r ].value = t_weight_1;
	  
  }
  
	
}	
		
function itemcalc() {
	

var totbag = 0;
var totgrswght = 0;
var totmandi = 0;
var totbilwght = 0;
var totrot = 0;
var totrog = 0;
var totvalue = 0;
var totvattou = 0;
var totbillvalue = 0;

var j = document.form1.totalcnt.value;
for (var i=2; i<=j; i++)
  {
	  
	  

	  
	  

  var bag = eval("document.form1.bagg"+i+".value");
 
  totbag = Number(totbag) + Number(bag);
 document.form1.totbag.value = totbag;

  var grswght = eval("document.form1.grsweight"+i+".value");
  totgrswght = Number(totgrswght) + Number(grswght);
  document.form1.totgrsweight.value = totgrswght;
  
    var mandiwght = eval("document.form1.mandiwght"+i+".value");
  totmandi = Number(totmandi) + Number(mandiwght);
  document.form1.totmandi.value = totmandi;
  
  
      var billwght = eval("document.form1.billwght"+i+".value");
  totbilwght = Number(totbilwght) + Number(billwght);
  document.form1.totbilwght.value = totbilwght;
  
       var rattax = eval("document.form1.rattax"+i+".value");
  totrot = Number(totrot) + Number(rattax);
  document.form1.totrot.value = totrot;
  
  var ratgoods = eval("document.form1.ratgoods"+i+".value");
  totrog = Number(totrog) + Number(ratgoods);
  document.form1.totrog.value = totrog;
  
  //*********  
  
  var itvalue = eval("document.form1.itvalue"+i+".value");
  itvalue = Number (billwght) * Number (ratgoods);
  document.form1[ "itvalue" + i ].value = itvalue;
  totvalue = Number(totvalue) + Number(itvalue);
  document.form1.totvalue.value = totvalue;
  
  //********************
  
  
    var valuetaxout = eval("document.form1.valuetaxout"+i+".value");
	
	  valuetaxout = (Number (itvalue) * Number (rattax))/100;
  document.form1[ "valuetaxout" + i ].value = valuetaxout;
	
  totvattou = Number(totvattou) + Number(valuetaxout);
  document.form1.totvto.value = totvattou;
  
    

	var billvalue = eval("document.form1.billvalue"+i+".value");
	  
	 billvalue = Number (valuetaxout) + Number (itvalue);
  document.form1[ "billvalue" + i ].value = billvalue;
	  
 
	  
  totbillvalue = Number(totbillvalue) + Number(billvalue);
  document.form1.totbillv.value = totbillvalue;
  
  
  
  
  
  
  
}

 document.form1.bag.value = totbag; 
 document.form1.quantity.value = totbilwght; 

}
