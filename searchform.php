<?php
//generates the search form
function searchform($destination = 'index.php', $auto = '', $title = '<label for=\'search\'>Search</label><br>', $ishidden = 'search', $buttonlabel = 'Search', $idchange = 'search') {
	echo "<form class='searchbox' action='$destination' method='post'>
		$title
		<input type='$ishidden' id='$idchange' name='$idchange' autofocus='autofocus' value='$auto' autocomplete='off'>
		<input type='submit' value='$buttonlabel'>
		</form>";

}

?>