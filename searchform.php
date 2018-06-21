<?php
//generates the search form
function searchform($destination = 'index.php', $auto = '', $title = '<label for=\'search\'>Search</label><br>', $ishidden = 'search') {
	echo "<form action='$destination' method='post'>
		$title
		<input type='$ishidden' id='search' name='search' autofocus='autofocus' value='$auto' autocomplete='off'>
		<input type='submit' value='Edit'>
		</form>";
}

?>