
 function addRow_condition(tableID,conda,condb)
    {
		

        var table = document.getElementById(tableID);
		
        var rowCount = table.rows.length;
		//alert(rowCount);
			
        var row = table.insertRow(rowCount);
		
		var cell1 = row.insertCell(0);
        var element1 = document.createElement("input");
       element1.type = "hidden";
	     element1.size = "2";
		element1.value = "" ;
        element1.name="conditi_id_zs"+rowCount;
		element1.style.borderColor = "red";	      
	//	element1.style.width = "10px";
	   // element1.setAttribute("class", "noPrint");
		
        cell1.appendChild(element1);
	   					
						    
							
							
		  var cell9 = row.insertCell(1);
        var element9 = document.createElement("input");
        element9.type = "button";
	    element9.value = "DEL" ;
		element9.size = "5";
		element9.className="abcqq";
        element9.name="barbtnzs"+rowCount;
		element9.setAttribute("onclick","deleteRow_cond('poconditions',"+rowCount+")");
        cell9.appendChild(element9);
		

      //  var cell2 = row.insertCell(1);
       // cell2.innerHTML = rowCount ;

	   
	    var cell3 = row.insertCell(2);
        var element3 = document.createElement("input");
        element3.type = "text";
		element3.size = "1";
		element3.className="abcq";
		element3.style.borderColor = "red";
		element3.readOnly = true;
		element3.value = rowCount ;
        element3.name="Snozs"+rowCount;
        cell3.appendChild(element3);
	   
	   
	   
        var cell4 = row.insertCell(3);
        var element4 = document.createElement("input");
        element4.type = "text";
	    element4.size = "25";
		element4.className="abcq";
		element4.value = conda;
		element4.style.borderColor = "red";
        element4.name="cond_a"+rowCount;
		//element4.readOnly = true;
      // element4.style.textAlign = "center";	
		element4.style.fontWeight="bold"	   
        cell4.appendChild(element4);


        var cell5 = row.insertCell(4);
        var element5 = document.createElement("input");
        element5.type = "text";
		element5.value = condb;
		element5.style.borderColor = "red";
		//element5.style.textAlign = "center";	
		element5.size = "80";
		element5.style.fontWeight="bold"
		element5.className="abcq";
		element5.name="cond_b" + rowCount;
		//element5.readOnly = true;
        cell5.appendChild(element5);
		

        
		document.form1.totalcnt_cnd.value = rowCount; 
		
		document.form1.gtesearchisss.value="";
		
		
     
    }	
	

	
	
		function deleteRow_cond(tableID,cnt_1)
    {
        try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;

			table.deleteRow(cnt_1);	
			
			
		 document.form1.totalcnt_cnd.value = rowCount - 2 ; 
		 
		 
		 
  //  input name text updatedin start 
  
 var oTable = document.getElementById(tableID);
 var rowLength = oTable.rows.length;
  for (i = 1; i < rowLength  ; i++){
    var oCells = oTable.rows.item(i).cells;
    var cellLength = oCells.length;
	
           for(var j = 0; j < cellLength; j++){
		   
		        if (j==0) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "conditi_id_zs"+i;}
				   if (j==1) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "barbtnzs"+i;
					   document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].setAttribute("onclick","deleteRow_cond('poconditions',"+i+")");
					   }
		       if (j==2) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].value = i;}
				 if (j==3) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "cond_a"+i;}
				  if (j==4) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "cond_b" + i;}
				   
           }
    }
	
  //  input name text updatedin finished 
  
				  
				  
				   				  
        }catch(e) {
            alert(e);
        }
	
    }
	
