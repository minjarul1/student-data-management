<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view tab</title>
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
<div class="home"><h1>which table do you want to view or edit ?</h1>
</div>
    
    
    <div class="button-container">
        <a href="../edit_code/edit_student.php">
            <button class="nav-btn">Student table</button>
        </a>
        <a href="../edit_code/edit_library.php">
            <button class="nav-btn">Library table<table></table></button>
        </a>
        <a href="../edit_code/edit_result.php">
            <button class="nav-btn">Result table</button>

    </div>

</body>
</html>
