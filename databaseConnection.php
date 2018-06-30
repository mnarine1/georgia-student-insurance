<?php
$servername = "localhost";
$username = "gsi";
$password = "gsi23";
$database = "gsi";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>
