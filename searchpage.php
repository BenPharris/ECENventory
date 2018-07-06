<?php

echo "<div class='header'><h1>Choose from $num_results items:</h1></div>";
echo "<div class='searchpage'>";
	while ($row = $result->fetch_assoc()) {
		$itemid = $row["id"];
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
		$checkedout = $row['checkedout'];

		echo "<div class='result'>";
		echo "<table class='resulttable'>
		<col width = 25%><col width = 40%><col><col>
		<tr>
		<th>Barcode</th>
		<th>Manufacturer</th>
		<th>Model</th>
		<th>Type</th>
		</tr>
		<tr>
		<td>" . $barcode . 
		"</td>" . 
		"<td class = 'nooverflowtd'>" . $manufacturer . 
		"</td>" . 
		"<td class = 'nooverflowtd'>" . $model . 
		"</td>" . 
		"<td class = 'nooverflowtd'>" . $type . "</tr>
		<tr><td class='hideresult' colspan = '4'>" . 
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
		$notes .
		"</td></tr></table>";
		
		searchform('index.php',$itemid,"","hidden","Edit",'idsearch');
		searchform('delete.php',$itemid,"","hidden","Delete",'idsearch');
		if ($checkedout === '1'){
		searchform('checkoutform.php',$itemid,"","hidden","Check In",'checkin');
		} else {
		searchform('checkoutform.php',$itemid,"","hidden","Check Out",'checkout');
		}
		
		echo "</div>";
	} 
echo "</div>";

include 'backbutton.php';

?>