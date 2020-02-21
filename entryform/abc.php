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

$filename = "SalesInvoice.xls"; // File Name
// Download file
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");
$user_query = mysql_query("SELECT a1.date,a1.billno,a1.billtydate,a1.truckno,a1.partyname,a1.billvalue1,a2.stockid,a1.billno,a1.mandigatepass1,a1.value1,
a1.vattax1,a1.brokername,a1.stfcondition,a1.etfcondition FROM mandia6 a1,stock_ref a2 WHERE a1.siid=a2.formid and a2.tempid='A6' and fid=$abd");
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