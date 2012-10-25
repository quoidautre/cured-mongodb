<?php
require('access.php');

// create mongodb connection
$conn = new Mongo();

$db = $conn->placeholderDB;
$collection = $db->placeholderCollection;

// i.e.
// $db = $conn->customers;
// $collection = $db->contactInfo;

?>