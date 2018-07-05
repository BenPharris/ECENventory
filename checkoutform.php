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
$today = gmdate("Y-m-d");
include 'searchform.php'; //defines searchform() function

include 'connection.php';

if (isset($_POST['checkout'])){
		$itemid = htmlspecialchars("$_POST[checkout]");
echo 

"<div class = 'header'><h1>Checking out</h1></div>
<div class='fullform'>

<form action='checkout.php' method='post'>
<input type='hidden' id='itemid' name='itemid' value = '$itemid' autocomplete = 'off'>

<div class='editinput'>
	<label for='checkoutuser'>Check out to</label>
	<input type='text' id='checkoutuser' name='checkoutuser'  autocomplete='off'>
</div>

<div class='editinput'>
	<label for='email'>Email</label>
	<input type='text' id='email' name='email' autocomplete='off'>
</div>

<div class='editinput'>
	<label for='date_out'>Date Out</label>
	<input type='date' id='date_out' name='date_out' value='$today' autocomplete='off'>
</div>

<div class='editinput'>
	<label for='date_due'>Date Due</label>	
	<input type='date' id='date_due' name='date_due' autocomplete='off'>
</div>

<div class='editinput'>
	<label for='notes'>Notes</label>
	<input type='longtext' id='notes' name='notes' autocomplete='off'>
</div>

<div class='editinput'>
	<label for='emplid'>Swipe BuffOneCard</label>
	<input type='text' id='emplid' name='emplid' autocomplete='off'>
</div>



<div class= 'buttoncontainer'>

<input type='submit' value='Check Out'>
<input type='reset'>";
include 'backbutton.php';

echo "</div>";

echo "</form></div>";

} elseif (isset($_POST['checkin'])){
	$itemid = htmlspecialchars("$_POST[checkin]");

	$sql = "SELECT transaction, user, email, date_out, date_returned, date_due, notes, emplid FROM checkout_log WHERE transaction=(SELECT MAX(transaction) FROM checkout_log) AND item_id=$itemid";
	$inforesult = $link->query($sql);
	while ($row = $inforesult->fetch_assoc()) {
		$transaction = $row["transaction"];
		$user = $row['user'];
		$email = $row['email'];
		$date_out = $row['date_out'];
		$date_returned = $row['date_returned'];
		$date_due = $row['date_due'];
		$notes = $row['notes'];
		$emplid = $row['emplid'];
	}
echo 
"<div class = 'header'><h1>Checking in</h1></div>
<div class='fullform'>

<form action='checkin.php' method='post'>
<input type='hidden' id='itemid' name='itemid' value = '$itemid' autocomplete = 'off'>
<input type='hidden' id='transaction' name='transaction' value = '$transaction' autocomplete = 'off'>

<div class='editinput'>
	<label for='date_returned'>Date Returned</label>	
	<input type='date' id='date_returned' name='date_returned' value = '$today' autocomplete='off'>
</div>

<div class='editinput'>
	<label for='checkoutuser'>Checked out to</label>
	<input type='text' id='checkoutuser' name='checkoutuser' value = '$user'  autocomplete='off'>
</div>

<div class='editinput'>
	<label for='email'>Email</label>
	<input type='text' id='email' name='email' value = '$email' autocomplete='off'>
</div>

<div class='editinput'>
	<label for='date_out'>Date Out (Read Only)</label>
	<input type='date' id='date_out' name='date_out' value='$today' autocomplete='off' readonly='readonly'>
</div>

<div class='editinput'>
	<label for='date_due'>Date Due (Read Only)</label>	
	<input type='date' id='date_due' name='date_due' value = '$date_out' autocomplete='off' readonly='readonly'>
</div>

<div class='editinput'>
	<label for='notes'>Notes</label>
	<input type='longtext' id='notes' name='notes' value = '$notes' autocomplete='off'>
</div>

<div class='editinput'>
	<label for='emplid'>Employee or Student ID</label>
	<input type='text' id='emplid' name='emplid' autocomplete='off'>
</div>

<div class= 'buttoncontainer'>

<input type='submit' value='Check In'>
<input type='reset'>";
include 'backbutton.php';

echo "</div>";

echo "</form></div>";



} else {
	echo "<div class = 'header'><h1>Error:</h1><h2>No item specified</h2></div>";
	searchform('index.php',"","");
}

?>

</div>
</div>
</body>
</html>