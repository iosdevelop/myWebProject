<?php 

//production versus development 

$host = $_SERVER['HTTP_HOST'];

if ($host=="localhost"){
	$servername = "localhost";
	$username = "codio";
	$password = "woodstock";
}
else{
	$servername = "localhost";
	$username = "root";
	$password = "woodstock";
}


// Create connection

$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Houston we have a problem: " . $conn->connect_error);
} 
//echo "Connected successfully";
?>