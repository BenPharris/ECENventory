<?php
//generates the search form
function searchform($destination = 'index.php') {
	echo "<form action='$destination' method='post'>
		<label for='search'>Search Barcode or Serial</label><br>
		<input type='search' id='search' name='search' autofocus='autofocus' autocomplete='off'>
		</form>";
}

?>