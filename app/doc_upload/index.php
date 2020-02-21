<!DOCTYPE html>
<html>
    <head>
		<title>Upload Multiple Images Using jquery and PHP</title>
		<!-------Including jQuery from google------>
        <script src="jquery.min.js"></script>
        <script src="script.js"></script>
		
		<!-------Including CSS File------>
          <body>
        <div id="maindiv">

            <div id="formdiv">
                  <form enctype="multipart/form-data" action="" method="post">
                     <div id="filediv">
					 <input name="file[]" type="file" id="file"/>
					 <input name="desc10" id="desc10" type="text">
					 </div><br/>
           
                    <input type="button" id="add_more" class="upload" value="Add More Files"/>
                    <input type="submit" value="Upload File" name="submit" id="upload" class="upload"/>
                </form>
                <br/>
                <br/>
				<!-------Including PHP Script here------>
                <?php include "upload.php"; ?>
            </div>
           
		   <!-- Right side div -->
        </div>
    </body>
</html>