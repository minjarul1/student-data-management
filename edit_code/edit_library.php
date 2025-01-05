<?php
// Include the connection file
include 'connection.php'; // Adjust the path if necessary


// Step 1: Handle library update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_library'])) {
    $library_id = $_POST['library_id'];
    $book_name = $_POST['book_name'];
    $author = $_POST['author'];
    $borrowed_by = $_POST['borrowed_by'];
    $borrow_date = $_POST['borrow_date'];
    $return_date = $_POST['return_date'];
    $status = $_POST['status'];

    $sql = "UPDATE library SET book_name='$book_name', author='$author', borrowed_by='$borrowed_by', borrow_date='$borrow_date', return_date='$return_date', status='$status' WHERE library_id='$library_id'";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert success'>Library record updated successfully.</div>";
    } else {
        echo "<div class='alert error'>Error updating library: " . $conn->error . "</div>";
    }
}

// Step 2: Handle delete action
if (isset($_GET['delete_library'])) {
    $library_id = $_GET['delete_library'];
    $sql = "DELETE FROM library WHERE library_id = $library_id";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert success'>Library record deleted successfully.</div>";
    } else {
        echo "<div class='alert error'>Error deleting library: " . $conn->error . "</div>";
    }
}

// Step 3: Handle edit form
if (isset($_GET['edit_library'])) {
    $library_id = $_GET['edit_library'];
    $sql = "SELECT * FROM library WHERE library_id = $library_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo "<h2>Edit Library Book</h2>
          <form action='' method='POST' class='form'>
              <input type='hidden' name='library_id' value='" . $row['library_id'] . "'>
              <label>Book Name:</label><br>
              <input type='text' name='book_name' value='" . $row['book_name'] . "' required><br><br>
              <label>Author:</label><br>
              <input type='text' name='author' value='" . $row['author'] . "' required><br><br>
              <label>Borrowed By:</label><br>
              <input type='text' name='borrowed_by' value='" . $row['borrowed_by'] . "' required><br><br>
              <label>Borrow Date:</label><br>
              <input type='date' name='borrow_date' value='" . $row['borrow_date'] . "' required><br><br>
              <label>Return Date:</label><br>
              <input type='date' name='return_date' value='" . $row['return_date'] . "' required><br><br>
              <label>Status:</label><br>
              <input type='text' name='status' value='" . $row['status'] . "' required><br><br>
              <button type='submit' name='update_library' class='btn update-btn'>Update</button>
          </form>";
}

// Step 4: Handle search
$search_query = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search_library'])) {
    $search_query = $_POST['search_query'];
}

// Step 5: Display library table with search functionality
$sql = "SELECT * FROM library";
if (!empty($search_query)) {
    $sql .= " WHERE book_name LIKE '%$search_query%' OR author LIKE '%$search_query%' OR borrowed_by LIKE '%$search_query%'";
}
$result = $conn->query($sql);

echo "<h2>Library</h2>";
echo "<form method='POST' class='form'>
        <input type='text' name='search_query' placeholder='Search by book, author, or borrower' value='$search_query'>
        <button type='submit' name='search_library' class='btn search-btn'>Search</button>
      </form>";

echo "<table class='styled-table'>
        <tr><th>Library ID</th><th>Book Name</th><th>Author</th><th>Borrowed By</th><th>Borrow Date</th><th>Return Date</th><th>Status</th><th>Actions</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" . $row["library_id"] . "</td>
            <td>" . $row["book_name"] . "</td>
            <td>" . $row["author"] . "</td>
            <td>" . $row["borrowed_by"] . "</td>
            <td>" . $row["borrow_date"] . "</td>
            <td>" . $row["return_date"] . "</td>
            <td>" . $row["status"] . "</td>
            <td>
                <a href='?edit_library=" . $row["library_id"] . "' class='btn edit-btn'>Edit</a>
                <a href='?delete_library=" . $row["library_id"] . "' class='btn delete-btn' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a>
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


