<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include("../config/database.php");
session_start();

$tasks = null;

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    $stmt = $conn->prepare("SELECT * FROM tasks WHERE id=?");
    $stmt->execute([$id]);
    $tasks = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$tasks) {
        echo "Task not found.";
        exit();
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];

    // Fetch the list_id before updating
    $stmt = $conn->prepare("SELECT list_id FROM tasks WHERE id=?");
    $stmt->execute([$id]);
    $taskData = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = $conn->prepare("UPDATE tasks SET task_name = ? WHERE id = ?");
    $stmt->execute([$name, $id]);

    header("Location: ../taskslist.php?list_id=" . $taskData["list_id"]);
    exit();
} else {
    echo "Invalid request.";
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update List</title>
    <style>
        body {
            background-image: url('../img/img1.jpg') ;
    background-size: cover; /* Makes the image cover the whole page */
    background-position: center; /* Centers the image */
    background-repeat: no-repeat; /* Prevents repeating */
    height: 320px; 
    font-family: "Bungee", sans-serif;
            font-family: Arial, sans-serif;
            padding: 40px;
          
        }

        form {
            background-color:rgb(251, 249, 233) ;
            padding: 20px;
            width: 300px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            padding: 8px 16px;
            background: linear-gradient(to right,rgb(198, 247, 174),rgb(246, 186, 169));
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: white;
        }

        button:hover {
            background-color: #22a6b3;
        }
    </style>
</head>
<body>

<form method="POST">
    <h3>Update tasks</h3>
    <input type="hidden" name="id" value="<?= htmlspecialchars($tasks['id']) ?>">
   <input type="text" name="name" value="<?= htmlspecialchars($tasks["task_name"])?>" required>
    <button type="submit">Update</button>
</form>

</body>
</html>
