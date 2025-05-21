<?php

include("../config/database.php"); // connect to database

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute the delete statement
    $stmt = $conn->prepare("DELETE FROM lists WHERE id = ?");
    $stmt->execute([$id]);

    // Redirect back to the main list page
    header("Location: ../list.php");
    exit();
} else {
    echo "Invalid request.";
}


?>