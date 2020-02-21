<?php include('../conf.php'); ?>
<?php
session_start();
if(!isset($_SESSION['uname'])) {echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }

$fid=$_SESSION['fid'];
?>
<?php
// Connection 
$abd=$fid;

$conn=mysql_connect('localhost','root','sudhir');
$db=mysql_select_db('mandi',$conn);

$filename = "Bill Payment.xls"; // File Name
// Download file
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");
$user_query = mysql_query("SELECT a1.saudadate,a1.suppliername,a2.amount,a2.bankcharges,a2.bankname,a2.branch,a2.total,
a2.chequeno,a2.remark FROM mandia7 a1,mandia7_ref a2 WHERE a1.billid=a2.formid and a2.tempid='A7' and fid=$abd");
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