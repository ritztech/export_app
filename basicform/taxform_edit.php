<?php
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }

$fid=$_SESSION['fid'];
?>
<?php include('../conf.php');?>
<?php 

if(isset($_POST['s'])) {
$taxid=$_POST['taxid'];
$salestaxform=$_POST['salestaxform'];
$entrytaxform=$_POST['entrytaxform'];
$manditaxform=$_POST['manditaxform'];
$taxid = $_POST['taxid'];
	$query = "UPDATE taxform SET
	salestaxform='$salestaxform',
    entrytaxform='$entrytaxform',
	manditaxform='$manditaxform'
	WHERE taxid ='$taxid '";
	mysql_query($query);
	//echo $query;
	 if (!mysql_query($query,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
     echo "<script>alert('Data updated successfully.');location.href='taxform_view.php'</script>"; 
}
?>
<?php
try {
$query = "SELECT `taxid`, `salestaxform`, `entrytaxform`, `manditaxform` FROM `taxform` WHERE taxid=?";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['taxid']);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$salestaxform= $row['salestaxform'];
$entrytaxform= $row['entrytaxform'];
$manditaxform= $row['manditaxform'];
$taxid = $row['taxid'];
} catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
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
<?php include('../include/sidemenu.php');?>

<div align="center">
<p align="center">&nbsp;</p>
  <h2 align="center"><span style="color:#F17327;">sales/mandi/entry edit tax form</span></h2>
  
  <form id="form1" name="form1" method="post" action="">
    <div align="center">
      <table width="662" border="1" style="border-collapse:collapse;" cellpadding="10">
        <tbody>
          <tr>
            <td><label for="textfield">Sales Tax Form:</label></td>
            <td><input type="text" name="salestaxform" size="46" id="textfield" value="<?php echo $salestaxform; ?>" /></td>
          </tr>
          <tr>
            <td><label for="textfield4">Entry Tax Form:</label></td>
            <td><input type="text" name="entrytaxform" size="46" id="textfield2" value="<?php echo $entrytaxform; ?>" /></td>
          </tr>
          <tr>
            <td><label for="textfield5">Mandi Tax Form:</label></td>
            <td><input type="text" name="manditaxform" size="46" id="textfield4" value="<?php echo $manditaxform; ?>"/></td>
          </tr>
          <tr>
            <td><input type="hidden" name="taxid" id="textfield3" value="<?php echo $taxid; ?>"/></td>
            <td><div align="center">
              <input type="submit" name="s" id="submit" value="Submit" />
            </div></td>
          </tr>
        </tbody>
      </table>
    </div>
    
  </form>
  <p align="center">&nbsp;</p>
  <blockquote>&nbsp;</blockquote>
</div>
</body>
</html>
