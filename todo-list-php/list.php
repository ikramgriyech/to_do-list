<?php
include("config/database.php");
session_start();
if(!isset($_SESSION["user_id"])){
    header("Location: auth/login.php");
    exit();
}
$user_id=$_SESSION["user_id"];



$stmt  = $conn->prepare("SELECT * FROM lists where user_id = :user_id ");
$stmt->execute(["user_id" => $user_id]);
$result = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Lists</title>
    <style>
        body {
            background-image: url('img/img1.jpg') ;/* Replace with your image URL */
    background-size: cover; /* Makes the image cover the whole page */
    background-position: center; /* Centers the image */
    background-repeat: no-repeat; /* Prevents repeating */
    height: 320px; 
    font-family: "Bungee", sans-serif;
    font-weight: 400;
    font-style: normal;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            margin: 20px auto;
            
            max-width: 400px;
            background-color:rgb(251, 249, 233) ;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;

        }

        input[type="text"] {
            width: 100%;
            padding: 6px;
            margin-top: 5px;
            margin-right: 20px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        button {
            padding: 8px 16px;
            background: linear-gradient(to right,rgb(198, 247, 174),rgb(246, 186, 169)); 
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 80px;
        }

        table {
            margin: 30px auto;
            width: 80%;
            border-collapse: collapse;
            background-color: #fff;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }

        th {
            background-color:rgb(251, 249, 233) ;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<?php include("includes/header.php"); ?>
    <h2>My Lists</h2>

    <form action="lists/add.php" method="post">
        <label for="name">List Name:</label>
        <input type="text" name="name" required>
        <button type="submit">Add</button>
    </form>

    <table>
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
        <?php foreach ($result as $item): ?>
        <tr>
            <td><?= $item['list_name'] ?></td>
            <td>
                <a href="lists/update.php?id=<?= $item['id'] ?>">✏️ </a>
                <a href="lists/delete.php?id=<?= $item['id'] ?>">🗑️ </a>
                <a href="taskslist.php?list_id=<?= $item['id'] ?>">
    <button>Go to Tasks</button>
</a>

               
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
  

</body>
</html>
