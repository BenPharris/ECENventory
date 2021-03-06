<!DOCTYPE html>
<html>
<head>
	<title>Inventory</title>
	<link href="./style.css" type="text/css" rel="stylesheet">
	<link rel="icon" type="image/png" href="./searchicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class='wholepage'>
<div class = 'content'>
<?php

include 'searchform.php'; //defines searchform() function

include 'connection.php';


// $search = htmlspecialchars("$_POST[search]"); //grabs the input of the form named "search" and saves it to the $search variable
if (!isset($_POST['search']) and !isset($_POST['idsearch'])){

	//call search form sending back to index.php (php_self)
	echo "<div class = 'header'><h1>ECEE Inventory System</h1></div>";
	echo "<div class = 'searchpage'>";
	searchform($_SERVER['PHP_SELF'],"","");
	echo "</div>";

	} else {


		if (isset($_POST['idsearch'])){
			$itemid = htmlspecialchars("$_POST[idsearch]");

			$sql = "SELECT id, barcode, type, manufacturer, model, location, user, serial, warranty_start, warranty_end, speedtype, description, notes, checkedout FROM items WHERE 
			(id LIKE '$itemid')";
			$result = $link->query($sql);
			$num_results = $result->num_rows;

		} else {
		$search = htmlspecialchars("$_POST[search]"); //grabs the input of the form named "search" and saves it to the $search variable
			if (substr($search,0,9) === "%B6014235"){
				$emplid = substr($search,-46,9);
			} else {



			$sql = "SELECT id, barcode, type, manufacturer, model, location, user, serial, warranty_start, warranty_end, speedtype, description, notes, checkedout FROM items WHERE 
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
			}
		}


	if (isset($emplid)) {

	include 'userpage.php';

	} elseif ($num_results === 1){ //if only one result is returned, assign it to the variables below 

	include 'editpage.php';

	} elseif ($num_results < 1) {

	include 'createpage.php';

	} elseif ($num_results < 40)  {

	include 'searchpage.php';

	} else {

		echo "<div class = 'header'><h1>ECEE Inventory System</h1></div>";
		echo "<div class = 'searchpage'>";
		searchform('index.php', $search, '');
		echo "</div>";
		echo "<div>Too many results: (Found " . $num_results . " results)</div>";

	}

$link->close();

}
?>
</div>
</div>
</body>
</html>