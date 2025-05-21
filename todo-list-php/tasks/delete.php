<?php
include("../config/database.php");
session_start();

if (isset($_GET['id']) && isset($_GET['list_id'])) {
    $task_id = $_GET['id'];
    $list_id = $_GET['list_id'];

    $stmt = $conn->prepare("DELETE FROM tasks WHERE id = ?");
    $stmt->execute([$task_id]);

  
    header("Location: ../taskslist.php?list_id=" . $list_id);
    exit();
} else {
    echo "Invalid request.";
}
?>
