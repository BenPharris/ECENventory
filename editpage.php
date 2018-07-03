<?php
	while ($row = $result->fetch_assoc()) {
		$id = $row["id"];
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
echo "<div class='header'><h1> Editing Record for " . $barcode . "</h1></div>";


//sets the variables necessary in fullform.php. Most are specified above by pulling from mysql
$barcodelabel = "(Read Only)"; 
$seriallabel = "";
$barcodereadonly = "readonly='readonly'";
$serialreadonly = "";

$destination = 'edit.php';
$buttonlabel = "Update";

include 'fullform.php';
?>