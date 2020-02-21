  <?php
//ROBERT SORIANO 2015
require 'conf.php';
try {
$query = 'DELETE FROM firmcreation WHERE fid=?';
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['fid']);
if($stmt->execute()) {
	echo "<script>alert('Record deleted.');location.href='newuser_view.php'</script>";
} else {
	die('Unable to delete record.');
}
} catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
?>