<?php
echo 
"<div class='fullform'>

<form action='$destination' method='post'>

<div class='editinput'>
	<input type='text' id='barcode' name='barcode' value='$barcode'  autocomplete='off' $barcodereadonly>
	<label for='barcode'>Barcode $barcodelabel</label>
</div>

<div class='editinput'>
	<input type='text' id='type' name='type' value='$type' maxlength='70' autocomplete='off'>
	<label for='type'>Type</label>
</div>

<div class='editinput'>
	<input type='text' id='manufacturer' name='manufacturer' value='$manufacturer' maxlength='70' autocomplete='off'>
	<label for='manufacturer'>Manufacturer</label>
</div>

<div class='editinput'>
	<input type='text' id='model' name='model' value='$model' maxlength='70' autocomplete='off'>
	<label for='model'>Model</label>
</div>

<div class='editinput'>
	<input type='text' id='location' name='location' value='$location' maxlength='70' autocomplete='off'>
	<label for='location'>Location</label>
</div>

<div class='editinput'>
	<input type='text' id='user' name='user' value='$user' maxlength='70' autocomplete='off'>
	<label for='user'>User/Lab</label>
</div>

<div class='editinput'>
	<input type='text' id='serial' name='serial' value='$serial' maxlength='70' autocomplete='off' $serialreadonly>
	<label for='serial'>Serial</label>
</div>

<div class='editinput'>
	<input type='date' id='warranty_start' name='warranty_start' value='$warranty_start' maxlength='70' autocomplete='off'>
	<label for='warranty_start'>Warranty Start</label>
</div>

<div class='editinput'>
	<input type='date' id='warranty_end' name='warranty_end' value='$warranty_end' maxlength='70' autocomplete='off'>
	<label for='warranty_end'>Warranty End</label>
</div>

<div class='editinput'>
	<input type='number' id='speedtype' name='speedtype' value='$speedtype' maxlength='9' autocomplete='off'>
	<label for='speedtype'>Speedtype</label>
</div>

<div class='editlongtext'>
	<input type='longtext' id='description' name='description' value='$description' maxlength='255' autocomplete='off'>
	<label for='description'>Description</label>
</div>

<div class='editlongtext'>
	<input type='longtext' id='notes' name='notes' value='$notes' maxlength='2048' autocomplete='off'>
	<label for='notes'>Notes</label>
</div>

<input type='submit' value='$buttonlabel'>
<input type='reset'>";
include 'backbutton.php';

echo "</form></div>";

?>