<?php 

$servername = "localhost";
$username = "codio";
$password = "woodstock";

// Create connection

$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";
?>