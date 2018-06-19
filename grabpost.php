<?php
//takes post data and assigns it to variables
$barcode = htmlspecialchars($_POST['barcode']);
$type = htmlspecialchars($_POST['type']);
$manufacturer = htmlspecialchars($_POST['manufacturer']);
$model = htmlspecialchars($_POST['model']);
$location = htmlspecialchars($_POST['location']);
$user = htmlspecialchars($_POST['user']);
$serial = htmlspecialchars($_POST['serial']);
$warranty_start = htmlspecialchars($_POST['warranty_start']);
$warranty_end = htmlspecialchars($_POST['warranty_end']);
$speedtype = htmlspecialchars($_POST['speedtype']);
$description = htmlspecialchars($_POST['description']);
$notes = htmlspecialchars($_POST['notes']);
?>