


function addRow(tableID)
    {

	
        var table = document.getElementById(tableID);
		var rowCount = table.rows.length;
					
			
        var row = table.insertRow(rowCount);
		
 
	    var cell3 = row.insertCell(0);
        var element3 = document.createElement("input");
        element3.type = "text";
		element3.size = "20";
		element3.value = "" ;
		element3.tabIndex = "3";
        element3.name="brandname"+rowCount;
        cell3.appendChild(element3);
		
		var cell3 = row.insertCell(1);
        var element3 = document.createElement("input");
        element3.type = "text";
		element3.size = "5";
		element3.value = "" ;
		element3.tabIndex = "3";
        element3.name="perct"+rowCount;
        cell3.appendChild(element3);
	   
	

		
		document.form1.totalcnt.value = rowCount; 
       

    }



