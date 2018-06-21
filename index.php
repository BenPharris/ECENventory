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

if ($result->num_rows === 1){ //if only one result is returned, assign it to the variables below 
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
echo "<h1> Editing Record for " . $barcode . "</h1>
<form action='edit.php' method='post'>
<input type='hidden' id='barcode' name='barcode' value='$barcode'  autocomplete='off'><br>

<input type='text' id='type' name='type' value='$type' maxlength='70' autocomplete='off'>
<label for='type'>Type</label><br>

<input type='text' id='manufacturer' name='manufacturer' value='$manufacturer' maxlength='70' autocomplete='off'>
<label for='manufacturer'>Manufacturer</label><br>

<input type='text' id='model' name='model' value='$model' maxlength='70' autocomplete='off'>
<label for='model'>Model</label><br>

<input type='text' id='location' name='location' value='$location' maxlength='70' autocomplete='off'>
<label for='location'>Location</label><br>

<input type='text' id='user' name='user' value='$user' maxlength='70' autocomplete='off'>
<label for='user'>User/Lab</label><br>

<input type='text' id='serial' name='serial' value='$serial' maxlength='70' autocomplete='off'>
<label for='serial'>Serial</label><br>

<input type='date' id='warranty_start' name='warranty_start' value='$warranty_start' maxlength='70' autocomplete='off'>
<label for='warranty_start'>Warranty Start</label><br>

<input type='date' id='warranty_end' name='warranty_end' value='$warranty_end' maxlength='70' autocomplete='off'>
<label for='warranty_end'>Warranty End</label><br>

<input type='number' id='speedtype' name='speedtype' value='$speedtype' maxlength='9' autocomplete='off'>
<label for='speedtype'>Speedtype</label><br>

<input type='longtext' id='description' name='description' value='$description' maxlength='255' autocomplete='off'>
<label for='description'>Description</label><br>

<input type='longtext' id='notes' name='notes' value='$notes' maxlength='2048' autocomplete='off'>
<label for='notes'>Notes</label><br>

<input type='submit' value='Update'>
<input type='reset'>
</form>";
} elseif ($result->num_rows < 1) {

//checks to see if $search is 8 digits with regex. If so, lock barcode. If not, lock serial.
if (preg_match('/^\d{8}$/',$search)) {
	$titletext = "Barcode";
	$barcodereadonly = "readonly='readonly'";
	$serialreadonly = "";
	$barcodesearch = $search;
	$serialsearch = "";
	$barcodelabel = "(Read Only)";
	$seriallabel = "";
	$barcode000 = "";

} else {
	

	$titletext = "Serial";
	$serialreadonly = "readonly='readonly'";
	$barcodereadonly = "";
	$serialsearch = $search;
	$barcodesearch = "";
	$seriallabel = "(Read Only)";
	$barcodelabel = "";
	$barcode000 = "For virtual barcodes, use 000- prefix";
}


//generate the form for CREATION then call create.php
echo "<h1> Creating Record for " . $titletext . " " . $search . "</h1>
<h2> $barcode000 </h2>
<form action='create.php' method='post'>
<input type='text' id='barcode' name='barcode' value='$barcodesearch' autocomplete='off' $barcodereadonly>
<label for='barcode'>Barcode $barcodelabel</label><br>

<input type='text' id='type' name='type' maxlength='70' autocomplete='off'>
<label for='type'>Type</label><br>

<input type='text' id='manufacturer' name='manufacturer' maxlength='70' autocomplete='off'>
<label for='manufacturer'>Manufacturer</label><br>

<input type='text' id='model' name='model' maxlength='70' autocomplete='off'>
<label for='model'>Model</label><br>

<input type='text' id='location' name='location' maxlength='70' autocomplete='off'>
<label for='location'>Location</label><br>

<input type='text' id='user' name='user' maxlength='70' autocomplete='off'>
<label for='user'>User/Lab</label><br>

<input type='text' id='serial' name='serial' value = '$serialsearch' maxlength='70' autocomplete='off' $serialreadonly>
<label for='serial'>Serial $seriallabel</label><br>

<input type='date' id='warranty_start' name='warranty_start' maxlength='70' autocomplete='off'>
<label for='warranty_start'>Warranty Start</label><br>

<input type='date' id='warranty_end' name='warranty_end' maxlength='70' autocomplete='off'>
<label for='warranty_end'>Warranty End</label><br>

<input type='number' id='speedtype' name='speedtype' maxlength='9' autocomplete='off'>
<label for='speedtype'>Speedtype</label><br>

<input type='longtext' id='description' name='description' maxlength='255' autocomplete='off'>
<label for='description'>Description</label><br>

<input type='longtext' id='notes' name='notes' maxlength='2048' autocomplete='off'>
<label for='notes'>Notes</label><br>

<input type='submit' value='Create'>
</form>";
} elseif ($result->num_rows < 20)  {
echo "<h1>Choose an item:</h1>";
	while ($row = $result->fetch_assoc()) {
		$barcode = $row["barcode"];
		echo "<div class='result'>" . $row['type'] . " " . $row['manufacturer'] . " " . $row['model'] . " " . $row['location'] . " " . $row['user'] . " " . $row['serial'] . " " . $row['warranty_start'] . " " . $row['warranty_end'] . " " . $row['speedtype'] . " " . $row['description'] . " " . $row['notes'];
		searchform('index.php',"$barcode","");
		echo "</div><br>";
	} 

} else {
	searchform('index.php', $search, '<label for=\'search\'>Too many results. Try again.</label><br>');
}

$link->close();

}
?>

</body>
</html>