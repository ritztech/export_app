<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "mandi1";
$connection = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die ('MySQL connect failed. ' . mysql_error());
mysql_select_db($mysql_database, $connection) or die('Cannot select database. ' . mysql_error());
?>
<?php
try {
$dbc = new PDO('mysql:host=localhost; dbname=mandi1', 'root', '');
} catch (PDOException $e) {
	echo "Error: " . $e->getMessage();
}
?>
<?php
if (isset($_POST['submit'])) {
    
	$j = 0; //Variable for indexing uploaded image 
    
	$target_path = "uploads/"; //Declaring Path for uploaded images
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {//loop to get individual element from the array

        $validextensions = array("jpeg", "jpg", "png","xls","doc","rtf","txt");  //Extensions which are allowed
        $ext = explode('.', basename($_FILES['file']['name'][$i]));
		$desc1 = $_POST['desc1'.$i];//explode file name from dot(.) 
		$file_extension = end($ext); //store extensions in the variable
      	$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];//set the target path with a new name of image
		
        $j = $j + 1;//increment the number of uploaded images according to the files in array       
      
	  if (($_FILES["file"]["size"][$i] < 1000000) //Approx. 100kb files can be uploaded.
                && in_array($file_extension, $validextensions)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {//if file moved to uploads folder
              
               $qry3 = "INSERT INTO upload (uppath,fid,desc1) VALUES ('$target_path','10','$desc1')";
			   echo $qry3;
			     if (!mysql_query($qry3,$connection))
  {
  die('Error: ' . mysql_error());
  }



		
			    echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
            } else {//if file was not moved.
                echo $j. ').<span id="error">please try again!.</span><br/><br/>';
            }
        } else {//if file size and file type was incorrect.
            echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
    }
}
?>