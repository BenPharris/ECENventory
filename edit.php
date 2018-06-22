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

//prepares Update query
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


//executes insert statement if link is good. Otherwise errors. Then brings up search form again.
if ($link->query($sql) === TRUE) {
	echo "<div class = 'header'><h1>Success!</h1></div>";
} else {
	echo "Error updating record: " . $link->error;
}

//brings up the search form again
searchform('index.php','','');

//closes our mysql connection
$link->close();
?>

</body>
</html>