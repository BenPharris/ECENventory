<?php

include 'connection.php';


//creates items table
$sqlitems = "CREATE TABLE IF NOT EXISTS items(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	barcode varchar(8),
	type varchar(70),
	manufacturer varchar(70),
	model varchar(70),
	location varchar(70),
	user varchar(70),
	serial varchar(70) UNIQUE,
	warranty_start varchar(70),
	warranty_end varchar(70),
	speedtype varchar(9),
	description varchar(255),
	notes varchar(2048)
)";
if(mysqli_query($link, $sqlitems)){
	echo "Items table created successfully.<br>";
} else{
	echo "ERROR: " . mysqli_error($link);
}


//creates checkout log table
$sqlcheckout = "CREATE TABLE IF NOT EXISTS checkout_log(
	transaction INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	item_id INT NOT NULL,
	user varchar(70),
	email varchar(128),
	date_out varchar(70),
	date_returned varchar(70),
	date_due varchar(70),
	notes varchar(2048)
)";

if(mysqli_query($link, $sqlcheckout)){
	echo "Checkout Log table created successfully.<br>";
} else{
	echo "ERROR: " . mysqli_error($link);
}

//creates deletion log table
$sqldeletion = "CREATE TABLE IF NOT EXISTS deletions(
	transaction INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	itemid INT NOT NULL,
	barcode varchar(8),
	type varchar(70),
	manufacturer varchar(70),
	model varchar(70),
	location varchar(70),
	user varchar(70),
	serial varchar(70) UNIQUE,
	warranty_start varchar(70),
	warranty_end varchar(70),
	speedtype varchar(9),
	description varchar(255),
	notes varchar(2048),
	deletion_date varchar(70)
)";
if(mysqli_query($link, $sqldeletion)){
	echo "Deletion table created successfully.<br>";
} else{
	echo "ERROR: " . mysqli_error($link);
}


mysqli_close($link);	

?>