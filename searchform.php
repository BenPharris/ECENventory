<?php
//generates the search form
function searchform($destination = 'index.php', $auto = '', $title = '<label for=\'search\'>Search</label><br>') {
	echo "<form action='$destination' method='post'>
		$title
		<input type='search' id='search' name='search' autofocus='autofocus' value='$auto' autocomplete='off'>
		<input type='submit' value='Search'>
		</form>";
}

?>