<?php

$dbname="supermarket";
// Create connection
// $conn = new mysqli("localhost","root","pwdmysqlpass","supermarket");
$conn = new mysqli("localhost","root","","supermarket");

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

	
?>

