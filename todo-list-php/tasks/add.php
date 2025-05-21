<?php
include("../config/database.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $list_id = $_POST["list_id"];
    $task_name = $_POST["task_name"];
     
    if(!empty($task_name) ){
        $stmt = $conn->prepare("insert into tasks (list_id,task_name) values(?,?)");
        $stmt->execute([$list_id,$task_name]);

        header("Location: ../taskslist.php?list_id=" . $list_id);
        exit();
    } else {
        echo "Task name is required.";
    }
} else {
    echo "Invalid request.";
}



?>


