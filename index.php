<!DOCTYPE html>
<html>
<head>
	<title>Inventory</title>
	<link href="./style.css" type="text/css" rel="stylesheet">
	<link rel="icon" type="image/png" href="./searchicon.png">
</head>
<div class='wholepage'>
	<div class = 'content'>
<?php

include 'searchform.php'; //defines searchform() function


// $search = htmlspecialchars("$_POST[search]"); //grabs the input of the form named "search" and saves it to the $search variable
if (!isset($_POST['search'])){

//call search form sending back to index.php (php_self)
echo "<div class = 'header'><h1>ECEE Inventory System</h1></div>";

searchform($_SERVER['PHP_SELF'],"","");

} else {

$search = htmlspecialchars("$_POST[search]"); //grabs the input of the form named "search" and saves it to the $search variable

include 'connection.php';

$sql = "SELECT barcode, type, manufacturer, model, location, user, serial, warranty_start, warranty_end, speedtype, description, notes FROM items WHERE 
(
	barcode LIKE '%$search%' 
	OR type LIKE '%$search%'
	OR manufacturer LIKE '%$search%'
	OR model LIKE '%$search%'
	OR location LIKE '%$search%'
	OR user LIKE '%$search%'
	OR serial LIKE '%$search%'
	OR warranty_start LIKE '%$search%'
	OR warranty_end LIKE  '%$search%'
	OR speedtype LIKE  '%$search%'
	OR description LIKE  '%$search%'
	OR notes LIKE  '%$search%'
)";

$result = $link->query($sql);
$num_results = $result->num_rows;


if ($num_results === 1){ //if only one result is returned, assign it to the variables below 

include 'editpage.php';

} elseif ($num_results < 1) {

include 'createpage.php';

} elseif ($num_results < 40)  {

include 'searchpage.php';

} else {
	echo "<div class = 'header'><h1>ECEE Inventory System</h1></div>";
	searchform('index.php', $search, '');
	echo "<div>Too many results: (Found " . $num_results . " results)</div>";
}

$link->close();

}
?>
</div>
</div>

</html>