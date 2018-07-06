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
include 'ldap.php';

$itemid = htmlspecialchars($_POST['itemid']);
$checkoutuser = htmlspecialchars($_POST['checkoutuser']);
$email = htmlspecialchars($_POST['email']);
$date_out = htmlspecialchars($_POST['date_out']);
// $date_returned = htmlspecialchars($_POST['date_returned']);
$date_due = htmlspecialchars($_POST['date_due']);
$notes = htmlspecialchars($_POST['notes']);
$tempemplid = htmlspecialchars($_POST['emplid']);

if ($tempemplid != ""){

$emplid = substr($tempemplid,-46,9);
$idcard = culdapsearch($emplid);
$checkoutuser = $idcard[0] . " " . $idcard[1];
$email = $idcard[2];

} else {
	$emplid = $tempemplid;
}


include 'connection.php'; //connects to mysql

// The order and number of items in the INSERT INTO and VALUES statements need to be identical
$sql = "INSERT INTO checkout_log (item_id, user, email, date_out, date_due, notes, emplid)
		VALUES ('$itemid', '$checkoutuser', '$email', '$date_out', '$date_due', '$notes', '$emplid')";

$sqlcheckout = "UPDATE items SET 
	checkedout = '1'
	WHERE id=$itemid";

//executes insert statement if link is good. Otherwise errors
if (($link->query($sql) === TRUE) and ($link->query($sqlcheckout) === TRUE)) {

	$sqlinfo = "SELECT barcode, serial FROM items WHERE id=$itemid";
					$inforesult = $link->query($sqlinfo);
					while ($row = $inforesult->fetch_assoc()) {
						$barcode = $row["barcode"];
						$serial = $row['serial'];
					}
				echo "<div class = 'header'><h1>Success!</h1><h2>Checked out record for ". $barcode . " | " . $serial . "</h2></div>";

} else {
	echo "<div class = 'header'><h1>Error on checkout:</h1><h2>" . $link->error . "</h2></div>";
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