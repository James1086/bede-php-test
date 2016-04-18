<?php

require_once("constants.php");

// Create connection
$conn = new mysqli(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>