<?php
// Include the connection file
include 'connection.php'; // Adjust the path if necessary


// Step 1: Handle result update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_result'])) {
    $student_id = $_POST['student_id'];
    $subject = $_POST['subject'];
    $marks = $_POST['marks'];
    $grade = $_POST['grade'];
    $semester = $_POST['semester'];

    $sql = "UPDATE results SET subject='$subject', marks='$marks', grade='$grade', semester='$semester' WHERE student_id='$student_id'";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert success'>Result record updated successfully.</div>";
    } else {
        echo "<div class='alert error'>Error updating result: " . $conn->error . "</div>";
    }
}

// Step 2: Handle delete operation
if (isset($_GET['delete_result'])) {
    $student_id = $_GET['delete_result'];
    $sql = "DELETE FROM results WHERE student_id=$student_id";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert success'>Result record deleted successfully.</div>";
    } else {
        echo "<div class='alert error'>Error deleting result: " . $conn->error . "</div>";
    }
}

// Step 3: Handle edit form
if (isset($_GET['edit_result'])) {
    $student_id = $_GET['edit_result'];
    $sql = "SELECT * FROM results WHERE student_id = $student_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo "<h2>Edit Result</h2>
          <form action='' method='POST' class='form'>
              <input type='hidden' name='student_id' value='" . $row['student_id'] . "'>
              <label>Subject:</label><br>
              <input type='text' name='subject' value='" . $row['subject'] . "' required><br><br>
              <label>Marks:</label><br>
              <input type='text' name='marks' value='" . $row['marks'] . "' required><br><br>
              <label>Grade:</label><br>
              <input type='text' name='grade' value='" . $row['grade'] . "' required><br><br>
              <label>Semester:</label><br>
              <input type='text' name='semester' value='" . $row['semester'] . "' required><br><br>
              <button type='submit' name='update_result' class='btn update-btn'>Update</button>
          </form>";
}

// Step 4: Handle search
$search_query = "";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
    $search_query = $_GET['search_query'];
    $sql = "SELECT * FROM results WHERE subject LIKE '%$search_query%' OR grade LIKE '%$search_query%' OR semester LIKE '%$search_query%'";
} else {
    $sql = "SELECT * FROM results";
}
$result = $conn->query($sql);

// Step 5: Display results table
echo "<h2>Results</h2>";
echo "<form action='' method='GET' class='form'>
        <label>Search:</label>
        <input type='text' name='search_query' value='$search_query' placeholder='Search by subject, grade, or semester'>
        <button type='submit' name='search' class='btn update-btn'>Search</button>
      </form>";
echo "<table class='styled-table'>
        <tr><th>Student ID</th><th>Subject</th><th>Marks</th><th>Grade</th><th>Semester</th><th>Action</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" . $row["student_id"] . "</td>
            <td>" . $row["subject"] . "</td>
            <td>" . $row["marks"] . "</td>
            <td>" . $row["grade"] . "</td>
            <td>" . $row["semester"] . "</td>
            <td>
                <a href='?edit_result=" . $row["student_id"] . "' class='btn edit-btn'>Edit</a>
                <a href='?delete_result=" . $row["student_id"] . "' class='btn delete-btn' onclick=\"return confirm('Are you sure you want to delete this record?')\">Delete</a>
            </td>
        </tr>";
}
echo "</table>";

$conn->close();
?>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f6f9;
        color: #333;
        margin: 0;
        padding: 0;
    }

    h2 {
        text-align: center;
        margin: 20px 0;
        color: #4a90e2;
        font-size: 26px;
        letter-spacing: 1px;
    }

    .form {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .form:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
    }

    .form label {
        font-size: 14px;
        color: #4a90e2;
        margin-bottom: 5px;
        display: block;
    }

    .form input {
        width: 100%;
        padding: 12px;
        margin: 8px 0;
        border-radius: 5px;
        border: 1px solid #ddd;
        font-size: 14px;
        box-sizing: border-box;
        transition: border-color 0.3s ease;
    }

    .form input:focus {
        border-color: #4a90e2;
        outline: none;
        box-shadow: 0 0 5px rgba(74, 144, 226, 0.5);
    }

    .btn {
        padding: 12px 24px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        color: #fff;
        font-weight: bold;
        font-size: 14px;
        transition: background-color 0.3s ease, transform 0.2s ease;
        display: inline-block;
    }

    .btn:hover {
        transform: translateY(-2px);
    }

    .update-btn {
        background-color: #28a745;
    }

    .update-btn:hover {
        background-color: #218838;
    }

    .edit-btn {
        background-color: #007bff;
        text-decoration: none;
        padding: 8px 16px;
        border-radius: 5px;
        color: #fff;
    }

    .edit-btn:hover {
        background-color: #0056b3;
    }

    .delete-btn {
        background-color: #dc3545;
        text-decoration: none;
        padding: 8px 16px;
        border-radius: 5px;
        color: #fff;
    }

    .delete-btn:hover {
        background-color: #c82333;
    }

    .search-btn {
        background-color: #4a90e2;
        padding: 12px 16px;
    }

    .search-btn:hover {
        background-color: #3a7ad6;
    }

    .styled-table {
        width: 90%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .styled-table th,
    .styled-table td {
        padding: 12px;
        text-align: center;
        font-size: 14px;
    }

    .styled-table th {
        background-color: #6c5ce7;
        color: #fff;
        text-transform: uppercase;
    }

    .styled-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .styled-table tr:hover {
        background-color: #eee;
        transition: background-color 0.2s ease;
    }

    .styled-table td {
        border-bottom: 1px solid #ddd;
    }

    .alert {
        padding: 12px;
        margin: 20px auto;
        border-radius: 5px;
        font-weight: bold;
        text-align: center;
        max-width: 600px;
    }

    .alert.success {
        background-color: #28a745;
        color: white;
    }

    .alert.error {
        background-color: #dc3545;
        color: white;
    }

    input[name='search_query'] {
        padding: 12px;
        width: 70%;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    button[name='search_student'] {
        padding: 12px 16px;
        margin-left: 10px;
        border-radius: 5px;
    }

    a {
        text-decoration: none;
    }
</style>


