<?php
// Replace these with your actual database credentials
$host = "localhost";
$username = "root";
$password = "";
$database = "organdonation";

// Create a database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
