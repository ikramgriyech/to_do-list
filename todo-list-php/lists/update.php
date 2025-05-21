<?php
include("../config/database.php");
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // جلب البيانات القديمة
    $stmt = $conn->prepare("SELECT * FROM lists WHERE id = ?");
    $stmt->execute([$id]);
    $list = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$list) {
        echo "List not found.";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}


// إذا وصلنا عن طريق POST (يعني تم إرسال النموذج)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];
    $newName = $_POST['name'];

    $stmt = $conn->prepare("UPDATE lists SET list_name = ? WHERE id = ?");
    $stmt->execute([$newName, $id]);

    header("Location: ../list.php");
    exit();
}

// إذا وصلنا عن طريق GET (يعني نعرض النموذج)
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update List</title>
    <style>
        body {
            background-image: url('../img/img1.jpg') ;/* Replace with your image URL */
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
    <h3>Update List Name</h3>
    <input type="hidden" name="id" value="<?= htmlspecialchars($list['id']) ?>">
    <input type="text" name="name" value="<?= htmlspecialchars($list['list_name']) ?>" required>
    <button type="submit">Update</button>
</form>

</body>
</html>
