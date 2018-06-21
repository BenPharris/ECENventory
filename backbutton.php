<?php

$previous = "javascript:history.go(-1)";
if (isset($_SERVER['HTTP_REFERER'])) {
	$previous = "$_SERVER[HTTP_REFERER]";
}
echo "<div class='backbutton'><a href='$previous'>Back</a></div>";

?>