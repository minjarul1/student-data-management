<?php
// Database connection details
$servername = "your_host_name"; // Remote database host
$username = "database_host_name";    // Your database username
$password = "database_passowerd";    // Your database password
$dbname = "database-name";          // Your database name
$port = 3306; // Default MySQL port

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: You can uncomment the line below to confirm the connection
// echo "Database connected successfully!";
?>
