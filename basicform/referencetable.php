<?php
session_start();
if(!isset($_SESSION['uname'])) { header('Location: ../index.php'); }

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="../style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/menu1.php');?>
<div id="gutter"></div>
<div id="col1">
  <h2>Menu</h2>
  <?php include('../include/sidemenu.php');?>
  <p>&nbsp;</p>
</div>
<div id="col4">
  <h2 align="center"><span style="color:#F17327;">Reference table details</span></h2>
  <blockquote>&nbsp;</blockquote>
  <p>&nbsp;</p>
  <div align="center">
    <table width="515" border="1" frame="box" cellpadding="0">
      <tbody>
        <tr>
          <td width="273" height="35"><h4><a href="broker_front.php">Add Broker Details</a></h4></td>
          <td width="226"><h4><a href="broker_view.php">Show</a></h4></td>
        </tr>
        <tr>
          <td height="37"><h4><a href="villagename_front.php">Add Village Name</a><a href="expenses_front.php"></a></h4></td>
          <td><h4><a href="expenses_view.php"></a><a href="villagename_view.php">Show</a></h4></td>
        </tr>
        <tr>
          <td height="34"><h4><a href="sirname_front.php">Add Sirname</a></h4></td>
          <td><h4><a href="sirname_view.php">Show</a></h4></td>
        </tr>
        <tr>
          <td height="34"><h4><a href="stockitem_front.php">Add Stock Item</a></h4></td>
          <td><h4><a href="stockitem_view.php">Show</a></h4></td>
        </tr>
        <tr>
          <td height="34"><h4><a href="supplier_front.php">Add Supplier Details</a></h4></td>
          <td><h4><a href="supplier_view.php">Show</a></h4></td>
        </tr>
        <tr>
          <td height="31"><h4><a href="taxform_front.php">Add Tax Form</a></h4></td>
          <td><h4><a href="taxform_view.php">Show</a></h4></td>
        </tr>
        <tr>
          <td height="34"><h4><a href="transportname_front.php">Add Transport Name</a>e</h4></td>
          <td><h4><a href="transportname_view.php">Show</a></h4></td>
        </tr>
        <tr>
          <td><h5><a href="../entryform/purchaseorder_front.php">Add Purchase Order</a></h5></td>
          <td><h5><a href="../entryform/purchaseorder_view.php">Show</a></h5></td>
        </tr>
        <tr>
          <td><h5><a href="../entryform/goodsreciept_front.php">Add Goods Reciept Note</a></h5></td>
          <td><h5><a href="../entryform/goodsreciept_view.php">Show</a></h5></td>
        </tr>
        <tr>
          <td><h4><a href="villagename_front.php"></a><a href="expenses_front.php">Add Expenses</a></h4></td>
          <td><h4><a href="expenses_view.php">Show</a><a href="villagename_view.php"></a></h4></td>
        </tr>
        <tr>
          <td colspan="2"></h4></td>
        </tr>
      </tbody>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
</div>

<?php include('../include/footer.php');?>
</body>
</html>
