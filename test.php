<?php
// Database connection
$servername = "lsql302.infinityfree.com";
$username = "if0_37932944";
$password = "nT2p5aQlBc690S";
$dbname = "if0_37932944_student_managment";
$port = 3306; // Default MySQL port is 3306

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    // Display error message
    echo "Connection failed: " . $conn->connect_error;
} else {
    // Display success message
    echo "Database connected successfully on port $port!";
}

// Close connection (optional for simple checks)
$conn->close();
?>

