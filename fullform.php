<?php
echo 
"<div class='fullform'>

<form action='$destination' method='post'>
<input type='hidden' id='itemid' name='itemid' value = '$itemid' autocomplete = 'off'>

<div class='barcodecontainer'>

<div class='editinput'>
	<label for='barcode'>Barcode $barcodelabel</label>
	<input type='text' id='barcode' name='barcode' value='$barcode'  autocomplete='off' $barcodereadonly>
</div>

</div>

<div class = 'findcontainer'>

<div class='editinput'>
	<label for='location'>Location</label>
	<input type='text' id='location' name='location' value='$location' maxlength='70' autocomplete='off'>
</div>

<div class='editinput'>
	<label for='user'>User/Lab</label>
	<input type='text' id='user' name='user' value='$user' maxlength='70' autocomplete='off'>
</div>

</div>


<div class='typecontainer'>

<div class='editinput'>
	<label for='type'>Type</label>
	<input type='text' id='type' name='type' value='$type' maxlength='70' autocomplete='off'>
</div>

<div class='editinput'>
	<label for='manufacturer'>Manufacturer</label>	
	<input type='text' id='manufacturer' name='manufacturer' value='$manufacturer' maxlength='70' autocomplete='off'>
</div>

<div class='editinput'>
	<label for='model'>Model</label>
	<input type='text' id='model' name='model' value='$model' maxlength='70' autocomplete='off'>
</div>

</div>



<div class = 'identifiercontainer'>

<div class='editinput'>
	<label for='serial'>Serial</label>
	<input type='text' id='serial' name='serial' value='$serial' maxlength='70' autocomplete='off' $serialreadonly>
</div>

<div class='editinput'>
	<label for='speedtype'>Speedtype</label>
	<input type='number' id='speedtype' name='speedtype' value='$speedtype' maxlength='9' autocomplete='off'>
</div>

</div>

<div class ='warrantycontainer'>

<div class='editinput'>
	<label for='warranty_start'>Warranty Start</label>
	<input type='date' id='warranty_start' name='warranty_start' value='$warranty_start' maxlength='70' autocomplete='off'>
</div>

<div class='editinput'>
	<label for='warranty_end'>Warranty End</label>
	<input type='date' id='warranty_end' name='warranty_end' value='$warranty_end' maxlength='70' autocomplete='off'>
</div>

</div>



<div class='editlongtext'>
	<label for='description'>Description</label>
	<input type='longtext' id='description' name='description' value='$description' maxlength='255' autocomplete='off'>
</div>

<div class='editlongtext'>
	<label for='notes'>Notes</label>
	<input type='longtext' id='notes' name='notes' value='$notes' maxlength='2048' autocomplete='off'>
</div>



<div class= 'buttoncontainer'>

<input type='submit' value='$buttonlabel'>
<input type='reset'>";
include 'backbutton.php';

echo "</div>";

echo "</form></div>";

?>