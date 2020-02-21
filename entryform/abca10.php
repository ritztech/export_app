<?php include('../conf.php'); ?>
<?php
session_start();
if(!isset($_SESSION['uname'])) {echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }

$fid=$_SESSION['fid'];
?>
<?php
// Connection 
$abd=$fid;

$conn=mysql_connect('localhost','root','');
$db=mysql_select_db('mandi',$conn);

$filename = "Credit Note.xls"; // File Name
// Download file
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");
$user_query = mysql_query("SELECT tdate,suppliername,tclaim,billno,claims,shortage,moisture,sand,oil,kirda,labour,cashdcond,brokerage,postage,bardanaclaims,bankcharges,freight,gatepass,
rated,bankc,other FROM mandia10 WHERE fid=$abd");
// Write data to file
$flag = false;
while ($row = mysql_fetch_assoc($user_query)) {
    if (!$flag) {
        // display field/column names as first row
        echo implode("\t", array_keys($row)) . "\r\n";
        $flag = true;
    }
    echo implode("\t", array_values($row)) . "\r\n";
}
?>