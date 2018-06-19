<?php
$link = new mysqli("servername", "username", "password", "db_name");

if ($link->connect_error){
	die("Error: Could not connect. " . $link->connect_error);
}
?>