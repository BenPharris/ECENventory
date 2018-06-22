<?php

$previous = "javascript:history.go(-1)";
if (isset($_SERVER['HTTP_REFERER'])) {
	if (strpos($_SERVER['HTTP_REFERER'], 'create.php' === false)){
		$previous = "$_SERVER[HTTP_REFERER]";
	} else {
		$previous = 'index.php';
	}
}
echo "<div class='backbutton'><a href='$previous'>Back</a></div>";

?>