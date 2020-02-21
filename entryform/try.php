
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title>RITZ</title>

<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />

<link href="..//style.css" rel="stylesheet" type="text/css" />

<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>

<script language="javascript" type="text/javascript" src="jscode/a4code.js">  </script>

    <link href="js/jquery-ui.css" rel="stylesheet">
      <script src="js/jquery-1.10.2.js"></script>
      <script src="js/jquery-ui.js"></script>
	  
	  
	  <script language="javascript">
	  
	  
  $(function() {
       		 
  		$(".auto").autocomplete({
					 
            minLength: 2,
            source: "search_ledger.php",
            
			focus: function( event, ui ) {
                      return false;
               },
        
		select: function( event, ui ) {
              $(this).val( ui.item.desc1 );
			  
			   
               return false;
            }
         }
		 
)		 
		 
         .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li>" )
            .append( "<a>" + item.label + "</a>" )
            .appendTo( ul );
         };
         });

		 
	  </script>
	  
	  
	  </head>
	  <body>
	  
<input type="text" id="theinput"  class='auto'   name="theinput" />

</body>

</html>

