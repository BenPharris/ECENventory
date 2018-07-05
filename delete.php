<!DOCTYPE html>
<html>
<head>
	<title>Inventory</title>
	<link href="./style.css" type="text/css" rel="stylesheet">
	<link rel="icon" type="image/png" href="./searchicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<div class='wholepage'>
<div class = 'content'>
<body>

<?php
include 'searchform.php'; //defines searchform() function

$itemid = htmlspecialchars($_POST['idsearch']);

include 'connection.php'; //connects to mysql

$sql = "SELECT id, barcode, type, manufacturer, model, location, user, serial, warranty_start, warranty_end, speedtype, description, notes FROM items WHERE id LIKE '$itemid'";

$result = $link->query($sql);

	while ($row = $result->fetch_assoc()) {
		$itemid = $row["id"];
		$barcode = $row["barcode"];
		$type = $row["type"];
		$manufacturer = $row["manufacturer"];
		$model = $row["model"];
		$location = $row["location"];
		$user = $row["user"];
		$serial = $row["serial"];
		$warranty_start = $row["warranty_start"];
		$warranty_end = $row["warranty_end"];
		$speedtype = $row["speedtype"];
		$description = $row["description"];
		$notes = $row["notes"];
		}



//prepares Update query
$today = gmdate("Y.d.M H:i:s");

$sqllog = "INSERT INTO deletions (itemid, barcode, type, manufacturer, model, location, user, serial, warranty_start, warranty_end, speedtype, description, notes, deletion_date)
		VALUES ('$itemid', '$barcode', '$type', '$manufacturer', '$model', '$location', '$user', '$serial', '$warranty_start', '$warranty_end', '$speedtype', '$description', '$notes', '$today')";

//executes insert statement if link is good. Otherwise errors. Then brings up search form again.
if ($link->query($sqllog) === TRUE) {
echo "test";
$sqldelete = "DELETE FROM items	WHERE id=$itemid";

	if ($link->query($sqldelete) === TRUE) {
		echo "<div class = 'header'><h1>Success!</h1><h2>Deleted Record " . $barcode . " | " . $serial . "</div>";
	}

} else {
	echo "<div class = 'header><h1>Error deleting record:</h1><h2>" . $link->error . "</h2></div>";
}

//brings up the search form again

echo "<div class = 'searchpage'>";
searchform('index.php','','');
echo "</div>";

//closes our mysql connection
$link->close();
?>
</div>
</div>
</body>
</html>