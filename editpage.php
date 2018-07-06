<?php
	while ($row = $result->fetch_assoc()) {
		$itemid = $row["id"];
		$barcode = $row["barcode"];
		$type = $row["type"];
		$manufacturer = $row["manufacturer"];
		$model = $row["model"];
		$location = $row["location"];
		$user = $row["user"];
		$serial = $row["serial"];
		$warranty_start = $row["warranty_start"];
		$warranty_end = $row["warranty_end"];
		$speedtype = $row["speedtype"];
		$description = $row["description"];
		$notes = $row["notes"];
		$checkedout = $row["checkedout"];
		}

//generate the form for EDITING then call edit.php
echo "<div class='header'><h1> Editing Record for " . $barcode . " | " . $serial . "</h1></div>";

//sets the variables necessary in fullform.php. Most are specified above by pulling from mysql
$barcodelabel = "(Read Only)"; 
$seriallabel = "";
$barcodereadonly = "readonly='readonly'";
$serialreadonly = "";

$destination = 'edit.php';
$buttonlabel = "Update";


include 'fullform.php';
if ($checkedout === '1'){
	searchform('checkoutform.php',$itemid,"","hidden","Check In",'checkin');
} else {
	searchform('checkoutform.php',$itemid,"","hidden","Check Out",'checkout');
}

$sqlcheckouttable = "SELECT transaction, user, email, date_out, date_returned, date_due, notes FROM checkout_log WHERE item_id=$itemid ORDER BY transaction DESC";
$checkouttable = $link->query($sqlcheckouttable);
		echo "<table class='checkouttable'>
		<caption>Recent Checkouts</caption>
		<col><col><col><col><col>
		<div class='test'>
		<tr class='co'>
		<th>User</th>
		<th>Email</th>
		<th>Date Out</th>
		<th>Date Due</th>
		<th>Date Returned</th>
		</tr>";

	while ($row = $checkouttable->fetch_assoc()) {
		$co_user = $row['user'];
		$co_email = $row['email'];
		$co_date_out = $row['date_out'];
		$co_date_returned = $row['date_returned'];
		$co_date_due = $row['date_due'];
		$co_notes = $row['notes'];

		echo "
		<tr class='co'>
		<td>" . $co_user . 
		"</td>" . 
		"<td>" . $co_email . 
		"</td>" . 
		"<td>" . $co_date_out . 
		"</td>" . 
		"<td>" . $co_date_due . 
		"</td>" . 
		"<td>" . $co_date_returned . 
		"</td>" . 
		"<tr class='co'>
		<th scope='row'>Notes: </th>
		<td colspan = '4'>" . 
		$co_notes .
		"</td></tr>";
	}

	echo "</table></div>";

?>