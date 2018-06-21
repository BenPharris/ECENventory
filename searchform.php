<?php
//generates the search form
function searchform($destination = 'index.php', $auto = '', $title = '<label for=\'search\'>Search</label><br>', $ishidden = 'search', $buttonlabel = 'Search') {
	echo "
		<div class='searchbox'>
		<form action='$destination' method='post'>
		$title
		<input type='$ishidden' id='search' name='search' autofocus='autofocus' value='$auto' autocomplete='off'>
		<input type='submit' value='$buttonlabel'>
		</form>
		</div>";
}

?>