<?php
$link = new mysqli("localhost", "user_inventory", "E7RFjEwFmLJegGI1", "custom_inventory");

if ($link->connect_error){
	die("Error: Could not connect. " . $link->connect_error);
}
?>