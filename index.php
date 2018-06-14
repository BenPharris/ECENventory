<!DOCTYPE html>
<html>
<head>
	<title>Inventory</title>
</head>
<body>

<?php

if (empty($_POST["barcode"])){

   echo "<form action='$_SERVER[PHP_SELF]' method='post'>
		<label for='barcode'>Scan Barcode</label>
		<input type='barcode' id='barcode' name='barcode' autofocus='autofocus' autocomplete='off'>
		</form>";
	} else {


$cardinfo = htmlspecialchars("$_POST[barcode]"); //grabs the input of the form named "barcode" and saves it to the $cardinfo variable

include 'connection.php';

$sql = "SELECT barcode, type, manufacturer, model, location, user, serial, warranty_start, warranty_end, speedtype, description, notes FROM items WHERE barcode LIKE '$cardinfo'";
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

echo $barcode . "
<form action='edit.php' method='post'>
<input type='hidden' id='barcode' name='barcode' value='$barcode'  autocomplete='off'><br>
<label for='type'>Type: </label>
<input type='type' id='type' name='type' value='$type' maxlength='70' autocomplete='off'><br>
<label for='manufacturer'>Manufacturer: </label>
<input type='manufacturer' id='manufacturer' name='manufacturer' value='$manufacturer' maxlength='70' autocomplete='off'><br>
<label for='model'>Model: </label>
<input type='model' id='model' name='model' value='$model' maxlength='70' autocomplete='off'><br>
<label for='location'>Location: </label>
<input type='location' id='location' name='location' value='$location' maxlength='70' autocomplete='off'><br>
<label for='user'>User: </label>
<input type='user' id='user' name='user' value='$user' maxlength='70' autocomplete='off'><br>
<label for='serial'>Serial: </label>
<input type='serial' id='serial' name='serial' value='$serial' maxlength='70' autocomplete='off'><br>
<label for='warranty_start'>Warranty Start: </label>
<input type='warranty_start' id='warranty_start' name='warranty_start' value='$warranty_start' maxlength='70' autocomplete='off'><br>
<label for='warranty_end'>Warranty End: </label>
<input type='warranty_end' id='warranty_end' name='warranty_end' value='$warranty_end' maxlength='70' autocomplete='off'><br>
<label for='speedtype'>Speedtype: </label>
<input type='speedtype' id='speedtype' name='speedtype' value='$speedtype' maxlength='9' autocomplete='off'><br>
<label for='description'>Description: </label>
<input type='description' id='description' name='description' value='$description' maxlength='255' autocomplete='off'><br>
<label for='notes'>Notes: </label>
<input type='notes' id='notes' name='notes' value='$notes' maxlength='2048' autocomplete='off'><br>
<input type='submit' value='Update'>
</form>";
} else {
echo $cardinfo . "
<form action='create.php' method='post'>
<input type='hidden' id='barcode' name='barcode' value='$cardinfo'  autocomplete='off'><br>
<label for='type'>Type: </label>
<input type='type' id='type' name='type' maxlength='70' autocomplete='off'><br>
<label for='manufacturer'>Manufacturer: </label>
<input type='manufacturer' id='manufacturer' name='manufacturer' maxlength='70' autocomplete='off'><br>
<label for='model'>Model: </label>
<input type='model' id='model' name='model' maxlength='70' autocomplete='off'><br>
<label for='location'>Location: </label>
<input type='location' id='location' name='location' maxlength='70' autocomplete='off'><br>
<label for='user'>User: </label>
<input type='user' id='user' name='user' maxlength='70' autocomplete='off'><br>
<label for='serial'>Serial: </label>
<input type='serial' id='serial' name='serial' maxlength='70' autocomplete='off'><br>
<label for='warranty_start'>Warranty Start: </label>
<input type='warranty_start' id='warranty_start' name='warranty_start' maxlength='70' autocomplete='off'><br>
<label for='warranty_end'>Warranty End: </label>
<input type='warranty_end' id='warranty_end' name='warranty_end' maxlength='70' autocomplete='off'><br>
<label for='speedtype'>Speedtype: </label>
<input type='speedtype' id='speedtype' name='speedtype' maxlength='9' autocomplete='off'><br>
<label for='description'>Description: </label>
<input type='description' id='description' name='description' maxlength='255' autocomplete='off'><br>
<label for='notes'>Notes: </label>
<input type='notes' id='notes' name='notes' maxlength='2048' autocomplete='off'><br>
<input type='submit' value='Update'>
</form>";
}
$link->close();
}


?>


</body>
</html>