var k=1;
var abc = 0; //Declaring and defining global increement variable

$(document).ready(function() {
						   //To add new input file field dynamically, on click of "Add More Files" button below function will be executed
    $('#add_more').click(function() {
								
								  
        $(this).before($("<div/>", {id: 'filediv'}).fadeIn('slow').append(
                $("<input/>", {name: 'file[]', type: 'file', id: 'file'}),
				$("<input/>", {name: 'desc1'+k, type: 'text', id: 'desc1'}),
				$("<br/><br/>")
                ));
		k=k+1;
    });


//To preview image     
    function imageIsLoaded(e) {
        $('#previewimg' + abc).attr('src', e.target.result);
    };

    $('#upload').click(function(e) {
        var name = $(":file").val();
	        if (!name)
        {
            alert("First Image Must Be Selected");
            e.preventDefault();
        }
    });
});