<?php
foreach ($_POST as $key => $value) {
	//echo htmlspecialchars($key)."<br>";
	
	$myvar=htmlspecialchars($key);
	
	
	
	//echo "$$myvar=".trim(strip_tags(htmlspecialchars($key)))."</br>";
	
	echo "$$myvar=trim(strip_tags($"."_POST['".htmlspecialchars($key)."']));"."</br>";
	
	
	
	
//    echo $key."<br>";
}


?>
