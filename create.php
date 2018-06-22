<!DOCTYPE html>
<html>
<head>
	<title>Inventory</title>
	<link href="./style.css" type="text/css" rel="stylesheet">
	<link rel="icon" type="image/png" href="./searchicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class='wholepage'>
	<div class = 'content'>
<?php

include 'searchform.php'; //defines searchform() function

include 'grabpost.php'; // grabs all post data and assigns to variables

include 'connection.php'; //connects to mysql

// The order and number of items in the INSERT INTO and VALUES statements need to be identical
$sql = "INSERT INTO items (barcode, type, manufacturer, model, location, user, serial, warranty_start, warranty_end, speedtype, description, notes)
		VALUES ('$barcode', '$type', '$manufacturer', '$model', '$location', '$user', '$serial', '$warranty_start', '$warranty_end', '$speedtype', '$description', '$notes')";

//executes insert statement if link is good. Otherwise errors
if ($link->query($sql) === TRUE) {
	echo "<div class = 'header'><h1>Success!</h1><h2>Created record for " . $barcode . "</h2></div>";
} else {
	echo "<div class = 'header'><h1>Error creating record:</h1><h2>" . $link->error . "</h2></div>";
}

//brings up the search form again
searchform('index.php','','');

//close our mysql connection
$link->close();
?>
</div>
</div>
</body>
</html>