<?php require '../conf.php';
 ?>
 <?php
try {
$query = 'DELETE FROM broker WHERE brid=?';
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['brid']);
if($stmt->execute()) {
	echo "<script>alert('Record deleted.');location.href='broker_view.php'</script>";
} else {
	die('Unable to delete record.');
}
} catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
?>
