<?php
session_start();
include ('../config/database.php'); 

if (isset($_GET['id'])) {
    $task_id = $_GET['id'];

    // Changer le statut en "done"
    $sql = "UPDATE tasks SET status = 'completed' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$task_id]);

    // Redirection vers la liste des tâches
    header("Location: ../taskslist.php?list_id=" . $_GET['list_id']);
    exit;
} else {
    echo "ID de tâche manquant.";
}

