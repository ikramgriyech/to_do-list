<?php
include("config/database.php");
session_start();

if (!isset($_GET['list_id'])) {
    die("List ID not found.");
}

$list_id = $_GET['list_id'];

// Get list name
$listStmt = $conn->prepare("SELECT list_name FROM lists WHERE id = ?");
$listStmt->execute([$list_id]);
$list = $listStmt->fetch(PDO::FETCH_ASSOC);

if (!$list) {
    die("List not found.");
}

// Get tasks
$taskStmt = $conn->prepare("SELECT * FROM tasks WHERE list_id = ?");
$taskStmt->execute([$list_id]);
$tasks = $taskStmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tasks for <?= htmlspecialchars($list['list_name']) ?></title>
    <style>
        body {
            background-image: url('img/img1.jpg');
            /* Replace with your image URL */
            background-size: cover;
            /* Makes the image cover the whole page */
            background-position: center;
            /* Centers the image */
            background-repeat: no-repeat;
            /* Prevents repeating */
            height: 320px;
            font-family: "Bungee", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            background-color: rgb(250, 247, 225);
        }

        th,
        td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }

        th {
            background-color: rgb(250, 247, 225);

        }

        button {
            padding: 8px 16px;
            background: linear-gradient(to right, rgb(198, 247, 174), rgb(246, 186, 169));
            color: black;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 80px;
            margin-right: 10px;
        }

        form {
            text-align: center;
            margin-top: 20px;
        }

        input[type="text"] {
            padding: 8px;
            margin: 12px;
            width: 300px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .completed-task {
            text-decoration: line-through;
            color: gray;
        }
    </style>
</head>

<body>

    <?php include("includes/header.php"); ?>

    <h2>Tasks for: <?= htmlspecialchars($list['list_name']) ?></h2>

    <form action="tasks/add.php" method="post">
        <input type="hidden" name="list_id" value="<?= $list_id ?>">
        <input type="text" name="task_name" placeholder="New task" required>
        <button type="submit">Add</button>
    </form>

    <table>
        <tr>

            <th>Tasks</th>
            <th>Action</th>
        </tr>
        <?php foreach ($tasks as $task): ?>
            <tr>

                <td class="<?= $task['status'] === 'completed' ? 'completed-task' : '' ?>">
                    <?= htmlspecialchars($task['task_name']) ?>
                </td>


                <td>
                    <a href="tasks/update.php?id=<?= $task['id'] ?>">✏️</a>
                    <a href="tasks/delete.php?id=<?= $task['id'] ?>&list_id=<?= $list_id ?>"><button>🗑️</button></a>
                    <a href="tasks/done.php?id=<?= $task['id'] ?>&list_id=<?= $list_id ?>">
                        <button>done</button>

                    </a>
                </td>
            </tr>

        <?php endforeach; ?>
    </table>

</body>

</html>