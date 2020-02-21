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

$filename = "Nirasrittax.xls"; // File Name
// Download file
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");
$user_query = mysql_query("SELECT a1.recieptdate,a1.taxtype,a1.paymentmode,a1.bankname,a1.srno,a1.chequeno,a2.stockitem,a1.qtotal,a1.amtotal,a1.deposittax FROM mandia12n a1,mandia12_ref a2 WHERE
a1.ntaxid=a2.formidn and a2.tempid='A12' and a1.fid=$abd");
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