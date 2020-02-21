<?php

include("../conf.php");

$result_maxid = mysql_query("SELECT max( `cnt_id` ) cnt_id  FROM `upload_counter`");
$counter = mysql_fetch_array($result_maxid);

$counter = $counter['0'];



?>
<?php
if (isset($_POST['submit'])) {
	
	
	$firmid = $_POST['fid'];
	$financialyr = $_POST['financialyr'];
	
	
	

    
	$j = 0; //Variable for indexing uploaded image 
    
	//$target_path = "uploads/"; //Declaring Path for uploaded images
	
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {//loop to get individual element from the array
	
	$target_path = "uploads/"; //Declaring Path for uploaded images

       // $validextensions = array("jpeg", "jpg", "png","xls","doc","rtf","txt","pdf");  //Extensions which are allowed
      
     	  $ext = explode('.', basename($_FILES['file']['name'][$i]));
		  
		  $f_ext = basename($_FILES['file']['name'][$i]);
		  


		  
		

		$desc1 = $_POST['desc1'.$i];//explode file name from dot(.) 
		$file_extension = end($ext); //store extensions in the variable
      //	$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];//set the target path with a new name of image
		
		$target_path = $target_path .$counter."_".$f_ext ;//set the target path with a new name of image
		
        $j = $j + 1;//increment the number of uploaded images according to the files in array       
      
	//  if (($_FILES["file"]["size"][$i] < 1000000) //Approx. 100kb files can be uploaded.
      //          && in_array($file_extension, $validextensions))

				
				 
				
				
					  if (($_FILES["file"]["size"][$i] < 10485760) //Approx. 100kb files can be uploaded.
                )


				{
            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {//if file moved to uploads folder
              
               $qry3 = "INSERT INTO upload (uppath,fid,desc1,fname,fyear) VALUES ('$target_path',$firmid,'$desc1','$f_ext','$financialyr')";
			  // echo $qry3;
			     if (!mysql_query($qry3,$connection))
  {
  die('Error: ' . mysql_error());
  }



		
			    echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
            } else {//if file was not moved.
                echo $j. ').<span id="error">please try again , this file is more than defined size limit : .</span><br/><br/>' .$target_path  ;
            }
        } else {//if file size and file type was incorrect.
            echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
		
		$counter = $counter  +1;
		
    }
	
	$sqlupd124="UPDATE upload_counter SET cnt_id=$counter ";
         mysql_query($sqlupd124,$connection);

      echo '<script>window.location="doc_admin_view.php"</script>';
	
}
?>