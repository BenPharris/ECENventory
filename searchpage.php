<?php

echo "<div class='header'><h1>Choose from $num_results items:</h1></div>";
echo "<div class='searchpage'>";
	while ($row = $result->fetch_assoc()) {
		$barcode = $row["barcode"];
		$manufacturer = $row['manufacturer'];
		$model = $row['model'];
		$type = $row['type'];
		$location = $row['location'];
		$user = $row['user'];
		$serial = $row['serial'];
		$warranty_start = $row['warranty_start'];
		$warranty_end = $row['warranty_end'];
		$speedtype = $row['speedtype'];
		$description = $row['description'];
		$notes = $row['notes'];






		echo "<div class='result'>" . 
		$barcode . 
		" | " . 
		$manufacturer . 
		" | " . 
		$model . 
		" | " . 
		$type . 
		" | " . 
		$location . 
		" | " . 
		$user . 
		" | " . 
		$serial . 
		" | " . 
		$warranty_start . 
		" | " . 
		$warranty_end . 
		" | " . 
		$speedtype . 
		" | " . 
		$description . 
		" | " . 
		$notes;

		searchform('index.php',$barcode,"","hidden","Edit");
		echo "</div>";
	} 
echo "</div>";

include 'backbutton.php';

?>