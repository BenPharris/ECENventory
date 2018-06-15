<!DOCTYPE html>
<html>
<head>
	<title>Inventory</title>
	<link href="./style.css" type="text/css" rel="stylesheet">
	<link rel="icon" type="image/png" href="./searchicon.png">
</head>
<body>

<?php
// grabs all post data and assigns to variables
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

// The order and number of items in the INSERT INTO and VALUES statements need to be identical
$sql = "INSERT INTO items (barcode, type, manufacturer, model, location, user, serial, warranty_start, warranty_end, speedtype, description, notes)
		VALUES ('$barcode', '$type', '$manufacturer', '$model', '$location', '$user', '$serial', '$warranty_start', '$warranty_end', '$speedtype', '$description', '$notes')";

if ($link->query($sql) === TRUE) {
	echo "Success! Created record for " . $barcode;
	echo "<form action='index.php' method='post'>
		<label for='barcode'>Scan Barcode</label><br>
		<input type='search' id='barcode' name='barcode' autofocus='autofocus' autocomplete='off'>
		</form>";
} else {
	echo "Error creating record: " . $link->error;
	echo "<form action='index.php' method='post'>
		<label for='barcode'>Scan Barcode</label><br>
		<input type='search' id='barcode' name='barcode' autofocus='autofocus' autocomplete='off'>
		</form>";
}

$link->close();
?>

</body>
</html>