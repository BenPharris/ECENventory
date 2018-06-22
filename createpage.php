<?php

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

echo "<div class='header'><h1> Creating Record for " . $titletext . " " . $search . "</h1>
<h2> $barcode000 </h2></div>";

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

?>