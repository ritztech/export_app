<?php include('../conf.php');
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }


?>
<?php 

if(isset($_POST['s'])) {
$sirname = $_POST['sirname'];
$sirid = $_POST['sirid'];
	$query = "UPDATE sirname SET sirname='$sirname' WHERE sirid='$sirid'";
	mysql_query($query);
	//echo $query;
	 if (!mysql_query($query,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
   echo "<script>alert('Data updated successfully.');location.href='sirname_view.php'</script>"; 

}
?>
<?php
try {
$query = "SELECT `sirid`, `sirname` FROM `sirname` WHERE sirid=?";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['sirid']);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$sirname = $row['sirname'];

$sirid = $row['sirid'];
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
  <h2>&nbsp;</h2>
  
    <h2 align="center"><span style="color:#F17327;">Edit Surname</span></h2>
    <p align="center">&nbsp;</p>
    <form id="form1" name="form1" method="post" action="">
      <p align="center">
        <label for="textfield">Surname: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </label>
        <input type="text" name="sirname" value="<?php echo $sirname; ?>" size="45"/>
        <input type="hidden" name="sirid" value="<?php echo $sirid; ?>" />
      </p>
      <p align="center">
        <input type="submit" name="s" id="submit" value="Submit" />
      </p>
    </form>
    <p align="center">&nbsp;</p>
    <p align="center">&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </blockquote>
</div>
</body>
</html>
