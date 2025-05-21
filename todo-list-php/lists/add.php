<?php
include("../config/database.php");
session_start(); // important if using $_SESSION

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ListName = trim($_POST["name"]);
    $userId =  trim($_SESSION["user_id"]);

    echo $userId;
    echo $ListName;

    $conn->query("INSERT INTO `lists`(`user_id`, `list_name`, `created_at`) 
    VALUES ($userId, '$ListName', NOW())");

    header("Location: ../list.php");
    exit();
}
?>
