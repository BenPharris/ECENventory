<?php

include 'connection.php';

$sql = "CREATE TABLE items(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	barcode varchar(8) NOT NULL UNIQUE,
	type varchar(70),
	manufacturer varchar(70),
	model varchar(70),
	location varchar(70),
	user varchar(70),
	serial varchar(70),
	warranty_start varchar(70),
	warranty_end varchar(70),
	speedtype varchar(9),
	description varchar(255),
	notes varchar(2048)
)";

if(mysqli_query($link, $sql)){
	echo "Table created successfully.";
} else{
	echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}

mysqli_close($link);	

?>