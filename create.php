<!DOCTYPE html>
<html>
<head>
	<title>Inventory</title>
	<link href="./style.css" type="text/css" rel="stylesheet">
	<link rel="icon" type="image/png" href="./searchicon.png">
</head>
<body>

<?php

include 'searchform.php'; //defines searchform() function

include 'grabpost.php'; // grabs all post data and assigns to variables

include 'connection.php'; //connects to mysql

// The order and number of items in the INSERT INTO and VALUES statements need to be identical
$sql = "INSERT INTO items (barcode, type, manufacturer, model, location, user, serial, warranty_start, warranty_end, speedtype, description, notes)
		VALUES ('$barcode', '$type', '$manufacturer', '$model', '$location', '$user', '$serial', '$warranty_start', '$warranty_end', '$speedtype', '$description', '$notes')";

//executes insert statement if link is good. Otherwise errors
if ($link->query($sql) === TRUE) {
	echo "Success! Created record for " . $barcode;
} else {
	echo "Error creating record: " . $link->error;
}

//brings up the search form again
searchform();

//close our mysql connection
$link->close();
?>

</body>
</html>