<!DOCTYPE html>
<html>
<head>
	<title>Inventory</title>
	<link href="./style.css" type="text/css" rel="stylesheet">
	<link rel="icon" type="image/png" href="./searchicon.png">
</head>
<body>

<?php


$search = htmlspecialchars("$_POST[search]");

// $_POST["search"]

if (empty($search)){

   echo "<form action='$_SERVER[PHP_SELF]' method='post'>
		<label for='search'>Search Barcode or Serial</label><br>
		<input type='search' id='search' name='search' autofocus='autofocus' autocomplete='off'>
		</form>";
	} else {


$cardinfo = htmlspecialchars("$_POST[search]"); //grabs the input of the form named "barcode" and saves it to the $cardinfo variable

include 'connection.php';

$sql = "SELECT barcode, type, manufacturer, model, location, user, serial, warranty_start, warranty_end, speedtype, description, notes FROM items WHERE (barcode LIKE '$cardinfo' OR serial LIKE '$cardinfo')";
$result = $link->query($sql);
if ($result->num_rows > 0){
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
} else {

	
echo "<h1> Creating Record for " . $cardinfo . "</h1>
<form action='create.php' method='post'>
<input type='hidden' id='barcode' name='barcode' value='$cardinfo'  autocomplete='off'><br>

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

<input type='text' id='serial' name='serial' maxlength='70' autocomplete='off'>
<label for='serial'>Serial</label><br>

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
}
$link->close();
}

?>

</body>
</html>