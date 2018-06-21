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


// $search = htmlspecialchars("$_POST[search]"); //grabs the input of the form named "search" and saves it to the $search variable
if (!isset($_POST['search'])){

//call search form sending back to index.php (php_self)
searchform($_SERVER['PHP_SELF']);

} else {

$search = htmlspecialchars("$_POST[search]"); //grabs the input of the form named "search" and saves it to the $search variable

include 'connection.php';

$sql = "SELECT barcode, type, manufacturer, model, location, user, serial, warranty_start, warranty_end, speedtype, description, notes FROM items WHERE 
(
	barcode LIKE '%$search%' 
	OR type LIKE '%$search%'
	OR manufacturer LIKE '%$search%'
	OR model LIKE '%$search%'
	OR location LIKE '%$search%'
	OR user LIKE '%$search%'
	OR serial LIKE '%$search%'
	OR warranty_start LIKE '%$search%'
	OR warranty_end LIKE  '%$search%'
	OR speedtype LIKE  '%$search%'
	OR description LIKE  '%$search%'
	OR notes LIKE  '%$search%'
)";

$result = $link->query($sql);
$num_results = $result->num_rows;


if ($num_results === 1){ //if only one result is returned, assign it to the variables below 
	while ($row = $result->fetch_assoc()) {
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

//generate the form for EDITING then call edit.php
echo "<h1> Editing Record for " . $barcode . "</h1>";


//sets the variables necessary in fullform.php. Most are specified above by pulling from mysql
$barcodelabel = "(Read Only)"; 
$seriallabel = "";
$barcodereadonly = "readonly='readonly'";
$serialreadonly = "";

$destination = 'edit.php';
$buttonlabel = "Update";

include 'fullform.php';

} elseif ($num_results < 1) {

//checks to see if $search is 8 digits with regex. If so, lock barcode. If not, lock serial.
if (preg_match('/^\d{8}$/',$search)) {
	
	//If barcode is specified, fill out the barcode and make it readonly
	$titletext = "Barcode";
	$barcodereadonly = "readonly='readonly'";
	$serialreadonly = "";
	$barcode = $search;
	$barcodelabel = "(Read Only)";
	$seriallabel = "";
	$barcode000 = "";
	$serial = "";

} else {
	
	//If serial is specified, fill out the serial number and make it readonly
	$titletext = "Serial";
	$serialreadonly = "readonly='readonly'";
	$barcodereadonly = "";
	$serial = $search;
	$seriallabel = "(Read Only)";
	$barcodelabel = "";
	$barcode000 = "For virtual barcodes, use 000- prefix";
	$barcode = "";


}

echo "<h1> Creating Record for " . $titletext . " " . $search . "</h1>
<h2> $barcode000 </h2>";

//sets variables for fullform.php. Most are empty because we're CREATING
$type = "";
$manufacturer = "";
$model = "";
$location = "";
$user = "";
$warranty_start = "";
$warranty_end = "";
$speedtype = "";
$description = "";
$notes = "";

$destination = 'create.php'; //sending the form to create.php
$buttonlabel = "Create";

include 'fullform.php'; //actually generate the form with the variables filled in

} elseif ($num_results < 40)  {

echo "<h1>Choose from $num_results items:</h1>";
echo "<div class='searchpage'>";
	while ($row = $result->fetch_assoc()) {
		$barcode = $row["barcode"];
		echo "<div class='result'>" . $row['type'] . " | " . $row['manufacturer'] . " | " . $row['model'] . " | " . $row['location'] . " | " . $row['user'] . " | " . $row['serial'] . " | " . $row['warranty_start'] . " | " . $row['warranty_end'] . " | " . $row['speedtype'] . " | " . $row['description'] . " | " . $row['notes'];
		searchform('index.php',"$barcode","","hidden");
		echo "</div>";
	} 
echo "</div>";
echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";

} else {
	searchform('index.php', $search, '<label for=\'search\'>Too many results ($num_results). Try again.</label><br>');
}

$link->close();

}
?>

</body>
</html>