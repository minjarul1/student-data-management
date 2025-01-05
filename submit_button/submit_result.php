<?php
// Include the connection file
include 'connection.php'; // Adjust the path if necessary


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $student_id = $_POST['student_id'];
    $subject = $_POST['subject'];
    $marks = $_POST['marks'];
    $grade = $_POST['grade'];
    $semester = $_POST['semester'];

    // Insert data into 'results' table
    $sql = "INSERT INTO results (student_id, subject, marks, grade, semester) 
            VALUES ('$student_id', '$subject', '$marks', '$grade', '$semester')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Results added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #ff7e5f, #feb47b); /* Gradient background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        h1 {
            color: white;
            margin-bottom: 40px;
            font-size: 3rem;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }

        .button-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .nav-btn {
            background-color: #ff7e5f;
            color: white;
            padding: 15px 25px;
            font-size: 1.2rem;
            font-weight: bold;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            text-align: center;
            width: 250px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .nav-btn:hover {
            background-color: #feb47b;
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }

        .nav-btn:focus {
            outline: none;
        }

        .nav-btn:active {
            transform: scale(0.98);
        }

    </style>
</head>
<body>

    <h1>Student Management System</h1>
    
    <div class="button-container">
        <a href="http://localhost/new_code/library,students.html">
            <button class="nav-btn">Student Form</button>
        </a>
        <a href="http://localhost/new_code/library,library.html">
            <button class="nav-btn">Library Form</button>
        </a>
        <a href="http://localhost/new_code/librabry,result.html">
            <button class="nav-btn">Result Form</button>
        </a>
        <a href="http://localhost/new_code/home.html">
            <button class="nav-btn">Home</button>
        </a>
    </div>

</body>
</html>
