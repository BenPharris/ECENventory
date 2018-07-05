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

$transaction = htmlspecialchars($_POST['transaction']);
$itemid = htmlspecialchars($_POST['itemid']);
$checkoutuser = htmlspecialchars($_POST['checkoutuser']);
$email = htmlspecialchars($_POST['email']);
$date_out = htmlspecialchars($_POST['date_out']);
$date_returned = htmlspecialchars($_POST['date_returned']);
$date_due = htmlspecialchars($_POST['date_due']);
$notes = htmlspecialchars($_POST['notes']);

include 'connection.php'; //connects to mysql

// The order and number of items in the INSERT INTO and VALUES statements need to be identical
$sql = "UPDATE checkout_log SET 
	user='$checkoutuser',
	email='$email',
	date_returned='$date_returned',
	notes='$notes'
	WHERE transaction=$transaction";

$sqlcheckin = "UPDATE items SET 
	checkedout = '0'
	WHERE id=$itemid";

//executes insert statement if link is good. Otherwise errors
if (($link->query($sql) === TRUE) and ($link->query($sqlcheckin) === TRUE)) {

	$sqlinfo = "SELECT barcode, serial FROM items WHERE id=$itemid";
					$inforesult = $link->query($sqlinfo);
					while ($row = $inforesult->fetch_assoc()) {
						$barcode = $row["barcode"];
						$serial = $row['serial'];
					}
				echo "<div class = 'header'><h1>Success!</h1><h2>Checked in record for ". $barcode . " | " . $serial . "</h2></div>";

} else {
	echo "<div class = 'header'><h1>Error on checkin:</h1><h2>" . $link->error . "</h2></div>";
}

//brings up the search form again
echo "<div class = 'searchpage'>";
searchform('index.php','','');
echo "</div>";

//close our mysql connection
$link->close();
?>
</div>
</div>
</body>
</html>