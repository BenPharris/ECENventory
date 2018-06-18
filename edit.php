<!DOCTYPE html>
<html>
<head>
	<title>Inventory</title>
	<link href="./style.css" type="text/css" rel="stylesheet">
	<link rel="icon" type="image/png" href="./searchicon.png">
</head>
<body>

<?php
$barcode = htmlspecialchars($_POST['barcode']);
$type = htmlspecialchars($_POST['type']);
$manufacturer = htmlspecialchars($_POST['manufacturer']);
$model = htmlspecialchars($_POST['model']);
$location = htmlspecialchars($_POST['location']);
$user = htmlspecialchars($_POST['user']);
$serial = htmlspecialchars($_POST['serial']);
$warranty_start = htmlspecialchars($_POST['warranty_start']);
$warranty_end = htmlspecialchars($_POST['warranty_end']);
$speedtype = htmlspecialchars($_POST['speedtype']);
$description = htmlspecialchars($_POST['description']);
$notes = htmlspecialchars($_POST['notes']);

include 'connection.php';

$sql = "UPDATE items SET 
	type = '$type',
	manufacturer='$manufacturer', 
	model='$model', 
	location='$location', 
	user='$user', 
	serial='$serial', 
	warranty_start='$warranty_start', 
	warranty_end='$warranty_end', 
	speedtype='$speedtype', 
	description='$description', 
	notes='$notes' 
	WHERE barcode=$barcode";

if ($link->query($sql) === TRUE) {
	echo "Success!";
	echo "<form action='index.php' method='post'>
		<label for='search'>Search Barcode or Serial</label><br>
		<input type='search' id='search' name='search' autofocus='autofocus' autocomplete='off'>
		</form>";
} else {
	echo "Error updating record: " . $link->error;
	echo "<form action='index.php' method='post'>
		<label for='search'>Search Barcode or Serial</label><br>
		<input type='search' id='search' name='search' autofocus='autofocus' autocomplete='off'>
		</form>";
}

$link->close();
?>

</body>
</html>