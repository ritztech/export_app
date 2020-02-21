<?php

$today_zzz = date('Y-m-d',time());
$cur_date_val=date_create($today_zzz);
$exp_date=date_create("2020-05-16");
$diff=date_diff($cur_date_val,$exp_date);
$date_diff_val =  $diff->format("%R%a");
//echo $date_diff_val;

if($date_diff_val > 0 && $date_diff_val < 15)
{
	//echo "YOUR ".$date_diff_val." days";
	echo "<script>alert('You application access will expired in  $date_diff_val  days');</script>";
	
}


else
	

if($date_diff_val < 0)
{
	echo "<script>alert('Your software  access  expired today, please  contact Ritz technologies for renewal');</script>";
				unlink("config.php");
				unlink("index.php");
				unlink("index1.php");
				
         //   rename("exp_page.php","index.php");
		  
		/*  if ($handle = opendir('.')) {

    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {

           // echo "$entry\n";
		//	echo "</br>";
			unlink ($entry);
			
        }
    }

    closedir($handle);
}
*/

			copy("exp_page.php","index.php");
			include('logout.php');
	
}





?>